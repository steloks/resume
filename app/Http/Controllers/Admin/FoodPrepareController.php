<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodPrepare;
use App\Models\ObjectModel;
use App\Models\OrderRecipe;
use App\Models\ProductData;
use App\Traits\RecipeCalculator;
use Decimal\Decimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodPrepareController extends Controller
{
    use RecipeCalculator;

    private $recipeController;

    public function __construct(RecipeController $recipeController)
    {
        $this->recipeController = $recipeController;
    }

    public function index()
    {
        $date = getMenusDate();
        if (!FoodPrepare::firstWhere('date', $date)) {
            $this->generateFoodPreparations();
        }

        $objects = ObjectModel::all();

        return view('admin.food_prepare.index', compact('date', 'objects'));
    }

    private function generateFoodPreparations()
    {
        $objectProducts = $this->recipeController->getOrderRecipesProducts();
        $date = getMenusDate();
        foreach ($objectProducts as $objectId => $objectProduct) {
            $productDataByObject = ProductData::where('object_id', $objectId)->where('left_amount', '>', 0)->whereIn('product_id', array_keys($objectProduct))->orderBy('expire_date')->get();
            foreach ($objectProduct as $productId => $productWeight) {
                $totalWeight = $productWeight;
                foreach ($productDataByObject->where('product_id', $productId) as $productData) {
                    $totalWeight = $totalWeight - $productData->left_amount;
                    if ($totalWeight <= 0) {
                        FoodPrepare::create([
                            'product_data_id' => $productData->id,
                            'object_id' => $objectId,
                            'amount' => $totalWeight + $productData->left_amount,
                            'date' => $date,
                        ]);
                        break;
                    }

                    FoodPrepare::create([
                        'product_data_id' => $productData->id,
                        'object_id' => $objectId,
                        'amount' => $productData->left_amount,
                        'date' => $date,
                    ]);
                }

            }
        }
    }

    public function grid(Request $request)
    {
        $object = ObjectModel::firstWhere('id', $request->objectId);
        $iTotalRecords = FoodPrepare::where('object_id', $object->id)->where('date', getMenusDate())->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = FoodPrepare::with(['productData.product'])->where('object_id', $object->id)->where('date', getMenusDate());

        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('id', 'LIKE', '%' . $searchValue . '%');
            });
        }

        $iFilteredRecords = $dataFilterEloquent->count();

        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->get();

        $records = [
            'data' => [],
        ];

        foreach ($data as $key => $row) {
            $disabled = $row->is_prepared == 1 ? 'disabled checked' : '';
            $records["data"][] = [
                '<input type="checkbox" ' . $disabled . ' class="prepare" data-route=' . route('admin.food.prepare', ['id' => $row->id]) . '>',
                $key + 1,
                $row->productData->batch,
                $row->productData->product->name,
                parseNumber($row->productData->left_amount) . ' ' . $row->productData->product->unit_of_measure . '.',
                parseNumber($row->amount) . ' ' . $row->productData->product->unit_of_measure . '.',
                $row->productData->expire_date,
                Auth::guard('admin')->user()->name,
                $object->name,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function prepare($id)
    {
        $foodPrepare = FoodPrepare::with(['productData'])->firstWhere('id', $id);

        $productData = $foodPrepare->productData;
        $productData->used_amount = $productData->used_amount + $foodPrepare->amount;
        $productData->left_amount = $productData->left_amount - $foodPrepare->amount;
        $productData->save();

        $foodPrepare->update([
            'is_prepared' => 1,
        ]);

        return response()->json(['success' => true]);
    }
}
