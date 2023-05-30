<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\RecipeType;
use App\Models\RecipeTypePercentage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoriesView()
    {
        return view('admin.categories.categories');
    }

    public function categoriesAddView()
    {
        return view('admin.categories.category-add');
    }

    public function categoriesAddEdit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin.categories.category-add', compact('category'));
    }

    public function categoriesAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'prefix' => 'required',
        ]);

        $category = Category::updateOrCreate(
            [
                'id' => $request->category_id,
            ],
            [
                'prefix' => $request->prefix,
                'name' => $request->name,
                'description' => $request->description,
                'percentage_type' => $request->percentage_type ?? 0,
                'created_by' => loggedUser(),
            ]);

        if (RecipeTypePercentage::first() && !isset($request->category_id)) {
            foreach (RecipeType::all() as $recipetype) {
                if (RecipeTypePercentage::where('recipe_type_id', $recipetype->id)->where('category_id', $request->category_id)->get()) {
                    continue;
                }
                RecipeTypePercentage::create([
                    'recipe_type_id' => $recipetype->id,
                    'category_id' => $category->id,
                    'percentage' => 0,
                ]);
            }
        } else {
            foreach (RecipeType::all() as $recipetype) {
                foreach (Category::all() as $category) {
                    if (RecipeTypePercentage::where('recipe_type_id', $recipetype->id)->where('category_id', $request->category_id)->get()) {
                        continue;
                    }
                    RecipeTypePercentage::create([
                        'recipe_type_id' => $recipetype->id,
                        'category_id' => $category->id,
                        'percentage' => 0,
                    ]);
                }
            }
        }

        return redirect()->route('admin.categories');
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataCategories(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = Category::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Category::query([
            'categories.id',
            'categories.prefix',
            'categories.name',
            'categories.description',
            'categories.created_at',
            'categories.created_by',
        ]);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->orWhere('categories.prefix', 'LIKE', '%' . $searchValue . '%');
                $query->orWhere('categories.name', 'LIKE', '%' . $searchValue . '%');
                $query->orWhere('categories.id', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('categories.name', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->orderBy('categories.prefix', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('categories.created_by', $orderDirection);
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

            $records["data"][] = [
                parseEditRoute('categories', $row->id, $row->id, 'asIcon', 'Categories'),
//                parseDeleteButton('categories', $row->id),
                $row->id,
                parseEditRoute('categories', $row->id, $row->name, null, 'Categories'),
                $row->prefix,
                $row->created_by,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function categoryDelete($id)
    {
        Category::firstWhere('id', $id)->delete();

        return response()->json(['success' => true]);
    }
}
