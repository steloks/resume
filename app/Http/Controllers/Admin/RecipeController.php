<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ObjectModel;
use App\Models\OrderRecipe;
use App\Models\Pet;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\RecipeType;
use App\Models\RecipeTypePercentage;
use App\Models\User;
use App\Traits\RecipeCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    protected $recipeModuleName = 'Recipes';

    use RecipeCalculator;

    public function recipesView()
    {
        $recipeTypes = RecipeType::all();
        return view('admin.recipe.recipes', compact('recipeTypes'));
    }

    public function recipeAddView()
    {
        $recipeTypes = RecipeType::all();
        $products = Product::with('category')->get();
        return view('admin.recipe.recipe-add', compact('recipeTypes', 'products'));
    }

    public function recipeAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'product_ids' => 'required'
        ]);

        $recipe = Recipe::updateOrCreate(
            [
                'id' => $request->recipeId
            ],
            [
                'name' => $request->name,
                'recipe_type_id' => $request->recipe_type_id,
                'description' => $request->description,
            ]);

        if ($request->image) {
            $fileName = $request->file('image')->getClientOriginalName();
            Storage::disk('recipe')->put($recipe->id . '/' . $fileName, File::get($request->file('image')));
            $recipe->update([
                'image' => $fileName,
            ]);
        }

        if (empty($request->product_ids)) {
            return redirect()->route('admin.recipes');

        }
        $recipe->products()->detach();

        $productIds = $request->product_ids;
        if (($key = array_search(0, $productIds)) !== false) {
            unset($productIds[$key]);
        }

        $parsedArray = array_combine(array_values($productIds), array_values($request->product_percentage));
        $products = Product::with(['category'])->whereIn('id', $request->product_ids)->get();
        $arr = [];
        foreach ($products as $product) {
            $arr[$product->category->id][$product->id] = $parsedArray[$product->id];
        }

        foreach ($arr as $categoryId => $products) {
            $percentage = RecipeTypePercentage::where('category_id', $categoryId)->where('recipe_type_id', $recipe->recipe_type_id)->first()->percentage;
            $total = 0;
            $zeros = [];
            foreach ($products as $productId => $productPercentage) {
                if ($productPercentage == 0) {
                    $zeros[] = $productId;
                }
                $total += $productPercentage;
            }

            if (!empty($zeros)) {
                if ($dif = $percentage - $total) {
                    $each = $dif / count($zeros);
                }

                foreach ($zeros as $zero) {
                    $parsedArray[$zero] = number_format($each, 2, '.', '');
                }
            }
        }

        foreach ($parsedArray as $productId => $percentage) {
            $recipe->products()->attach($productId, ['percentage' => $percentage]);
        }

        return redirect()->route('admin.recipes');
    }

    public function gridDataRecipes(Request $request)
    {
        $iTotalRecords = Recipe::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Recipe::query([
            'recipes.id',
            'recipes.name',
            'recipes.description',
            'recipes.created_by',
            'recipes.created_at',
            'recipes.recipe_type_id',
        ])->when(!empty($request->recipeType), function ($query) use ($request) {
            $query->where('recipe_type_id', $request->recipeType);
        })->with(['recipeType']);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->OrWhere('recipes.name', 'LIKE', '%' . $searchValue . '%');
                $query->OrWhere('recipes.id', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('recipes.name', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->whereHas('recipeType', function ($q) use ($orderDirection) {
                        $q->orderBy('name', $orderDirection);
                    });
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('recipes.created_at', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('recipes.created_by', $orderDirection);
                    break;
                default:
                    $dataFilterEloquent->orderBy('id', $orderDirection);
                    break;
            }
        }

        $iFilteredRecords = $dataFilterEloquent->count();
        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->get();

        $records = [
            'data' => [],
        ];


        foreach ($data as $row) {
//            $areas = $row->areas->where('status', 1)->pluck('name')->toArray();

            $records["data"][] = [
                parseEditRoute('recipe', $row->id, $row->id, 'asIcon', $this->recipeModuleName),
                parseDeleteRoute('recipe', $row->id, $row->id, 'asIcon', $this->recipeModuleName),
                $row->id,
                parseEditRoute('recipe', $row->id, $row->name, null, $this->recipeModuleName),
                $row->recipeType->name,
                parseDate($row->created_at),
                $row->created_by,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);

    }

    public function recipeEdit($id)
    {
        $recipe = Recipe::with(['products'])->where('id', $id)->first();
        $recipeTypes = RecipeType::all();
        $products = Product::with('category')->get();

        return view('admin.recipe.recipe-add', compact('recipeTypes', 'products', 'recipe'));
    }

    public function recipeDelete($id)
    {
        Recipe::firstWhere('id', $id)->delete();

        return redirect()->route('admin.recipes');
    }

    public function getOrderRecipesProducts($date)
    {
        $objectRecipes = [];
        OrderRecipe::with(['order.postcodeRelation.area.objects'])->where('date', $date)->where('status_id', '!=', 10)->get()->transform(function ($or) use (&$objectRecipes) {
            $objectId = optional($or->order->postcodeRelation->area->objects->first())->id;
            if ($objectId) {
                $objectRecipes[$objectId][] = $this->recipeCalc($or->recipe_id, $or->pet_id)['products'];
            }
        });

        $objectProducts = [];
        foreach ($objectRecipes as $objectId => $objectRecipe) {
            foreach ($objectRecipe as $products) {
                foreach ($products as $productId => $product) {
                    $weight = $objectProducts[$objectId][$productId] ?? 0;
                    $objectProducts[$objectId][$productId] = $weight + ($product['weight'] * 1000);
                }
            }
        }

        return $objectProducts;
    }

    public function caclulatedRecipeList()
    {
        $pets = Pet::all();
        $clients = User::whereHas('roles', function ($role) {
            $role->where('name', 'Client');
        })->get();
        $objects = ObjectModel::all();

        return view('admin.recipe.calculated-list', compact('pets', 'clients', 'objects'));
    }

    public function caclulatedRecipeListGrid(Request $request)
    {
        $iTotalRecords = OrderRecipe::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $objectId = $request->menu;
        $menuId = $request->menu;
        if (!empty($request->menu) && Str::contains($request->menu, '-')) {
            $explodedMenu = explode('-', $request->menu);
            $objectId = $explodedMenu[0];
            $menuId = $explodedMenu[1];
        }

        $dataFilterEloquent = OrderRecipe::query([
            'recipes.id',
            'recipes.name',
            'recipes.description',
            'recipes.created_by',
            'recipes.created_at',
            'recipes.recipe_type_id',
        ])->with(['recipe', 'pet', 'order.postcodeRelation.area.objects', 'order.client'])
            ->when(!empty($request->petId), function ($query) use ($request) {
                $query->where('pet_id', $request->petId);
            })
            ->when(!empty($request->clientId), function ($query) use ($request) {
                $query->whereHas('order', function ($client) use ($request) {
                    $client->where('user_id', $request->clientId);
                });
            })
            ->when(!empty($request->objectId), function ($query) use ($request) {
                $query->whereHas('order.postcodeRelation.area.objects', function ($object) use ($request) {
                    $object->where('objects.id', $request->objectId);
                });
            })
            ->when(!empty($request->orderId), function ($query) use ($request) {
                $query->whereHas('order', function ($object) use ($request) {
                    $object->where('id', $request->orderId);
                });
            })
            ->when(!empty($request->orderCreatedAt), function ($query) use ($request) {
                $query->whereHas('order', function ($order) use ($request) {
                    $order->whereDate('created_at', Carbon::create($request->orderCreatedAt));
                });
            })
            ->when(!empty($request->deliveryDateRecipe), function ($query) use ($request) {
                $query->where('date', Carbon::create($request->deliveryDateRecipe));
            })
            ->when(!empty($request->menu), function ($query) use ($request, $menuId, $objectId) {
                $query->when(Str::contains($request->menu, '-'), function ($query) use ($request, $menuId, $objectId) {
                    $query->where('id', $menuId);
                    $query->whereHas('order', function ($object) use ($request, $objectId) {
                        $object->where('id', $objectId);
                    });
                });
                $query->when(!Str::contains($request->menu, '-'), function ($query) use ($request, $menuId, $objectId) {
                    $query->where('id', $menuId);
                    $query->orWhereHas('order', function ($object) use ($request, $objectId) {
                        $object->where('id', $objectId);
                    });
                });
            })
            ->when(!empty($request->menuName), function ($query) use ($request) {
                $query->WhereHas('recipe', function ($object) use ($request) {
                    $object->where('name', 'like', '%' . $request->menuName . '%');
                });
            });

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
//        if (!empty($searchValue)) {
//            $dataFilterEloquent->where(function ($query) use ($searchValue) {
//                $query->OrWhere('recipes.name', 'LIKE', '%' . $searchValue . '%');
//                $query->OrWhere('recipes.id', 'LIKE', '%' . $searchValue . '%');
//            });
//        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
//                case 1:
//                    $dataFilterEloquent->orderBy('recipes.name', $orderDirection);
//                    break;
//                case 2:
//                    $dataFilterEloquent->whereHas('recipeType', function ($q) use ($orderDirection) {
//                        $q->orderBy('name', $orderDirection);
//                    });
//                    break;
//                case 3:
//                    $dataFilterEloquent->orderBy('recipes.created_at', $orderDirection);
//                    break;
                case 4:
                    $dataFilterEloquent->orderBy('date', $orderDirection);
                    break;
                default:
                    $dataFilterEloquent->orderBy('id', ($orderDirection == 'ASC' ? 'DESC' : 'ASC'));
                    break;
            }
        }

        $iFilteredRecords = $dataFilterEloquent->count();
        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->get();

        $records = [
            'data' => [],
        ];

        foreach ($data as $row) {
            $records["data"][] = [
                parseDeleteRoute('recipes.calculated', $row->id, $row->id, 'asIcon', 'Calculated recipes'),
                parseEditRoute('orders', $row->order->id, $row->order->id),
                parseDate($row->order->created_at),
                $row->order->id . '-' . $row->id,
                parseDate($row->date),
                parseEditRoute('recipes.calculated', $row->id, optional($row->recipe)->name, null, 'Calculated recipes'),
                $row->pet->name,
                $row->order->client->name,
                $row->order->postcodeRelation->area->objects->first()->name,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function caclulatedRecipeListDelete($id)
    {
        OrderRecipe::firstWhere('id', $id)->delete();

        return $this->caclulatedRecipeList();
    }

    public function caclulatedRecipeEditView($id)
    {
        $orderRecipe = OrderRecipe::with(['recipe', 'pet' => function ($pet) {
            $pet->with(['acivityPercentage', 'weightPercentage', 'neuteredPercentage']);
        }, 'order' => function ($order) {
            $order->with(['client', 'postcodeRelation.area.objects']);
        }])->firstWhere('id', $id);

        $calcRecipe = $this->recipeCalc($orderRecipe->recipe_id, $orderRecipe->pet_id, $orderRecipe->order->postcodeRelation->area->objects->first()->id);
//dd($calcRecipe);
        return view('admin.recipe.calculated-recipe', compact('orderRecipe', 'calcRecipe'));
    }
}
