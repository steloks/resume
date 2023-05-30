<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ObjectModel;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productsView()
    {
        $objects = ObjectModel::all();
        $categories = Category::all();

        return view('admin.products.products', compact('objects', 'categories'));
    }

    public function productsAddView()
    {
        $categories = Category::all();
        $objects = ObjectModel::all();

        return view('admin.products.products-add', compact('categories', 'objects'));
    }

    public function productsAdd(Request $request)
    {
        $product = Product::updateOrcreate(
            [
                'id' => $request->product_id
            ],
            [
                'name' => $request->name,
                'kcal' => $request->kcal,
                'category_id' => $request->category_id,
                'unit_of_measure' => $request->unit_of_measure,
                'days_until_exp' => $request->days_until_exp,
                'buy_price' => $request->buy_price,
                'sell_price' => $request->sell_price,
                'description' => $request->description,
            ]);

        $product->update([
            'prefix' => $product->category->prefix . ($product->id <= 9 ? 0 . $product->id : $product->id),
        ]);

        if (isset($request->objects)) {
            $product->objects()->sync($request->objects);
        }
        return redirect()->route('admin.products');
    }

    public function productsEditView($id)
    {
        $categories = Category::all();
        $objects = ObjectModel::all();

        $product = Product::with(['objects'])->find($id);
        $product->objects = $product->objects->pluck('id')->toArray();

        return view('admin.products.products-add', compact('categories', 'objects', 'product'));
    }

    public function gridDataProducts(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = Product::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));


        $dataFilterEloquent = Product::query([
            'products.id',
            'products.name',
            'products.kcal',
            'products.category_id',
            'products.created_at',
        ])->when(!empty($request->categoryId), function ($query) use ($request) {
            $query->where('category_id', $request->categoryId);
        })->with(['category']);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->orWhere('products.name', 'LIKE', '%' . $searchValue . '%');
                $query->orWhere('products.prefix', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('products.name', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->orderBy('products.kcal', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->whereHas('category')->orderBy('name', $orderDirection);
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
                parseEditRoute('products', $row->id, $row->id, 'asIcon', 'Nomenclatures'),
                parseDeleteRoute('products', $row->id, $row->id, 'asIcon', 'Nomenclatures'),
                $row->prefix,
                parseEditRoute('products', $row->id, $row->name, null, 'Nomenclatures'),
                $row->kcal,
                $row->category->name,
                parseDate($row->created_at),
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);

    }

    public function addProductsFromObjects(Request $request)
    {
        foreach (Product::all() as $product) {
            $product->objects()->detach($request->objects);
            $product->objects()->attach($request->objects);
        }

        return $this->productsView();
    }

    public function deleteProduct($id)
    {
        Product::firstWhere('id', $id)->delete();

        return $this->productsView();
    }
}
