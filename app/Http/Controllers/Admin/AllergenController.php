<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAllergen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AllergenController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('admin.allergens.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataAdminAllergens(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = ProductAllergen::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = ProductAllergen::query([
            'product_allergen.*',
        ])->with(['product']);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('id', $searchValue)->orWhereHas('product', function ($q) use ($searchValue) {
                    $q->where('name', 'LIKE', '%' . $searchValue . '%');
                });
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 2:
                    $dataFilterEloquent->join('products', 'product_allergen.product_id', '=', 'products.id')->orderBy('name', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('product_allergen.description', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('product_allergen.created_at', $orderDirection);
                    break;
                default:
                    $dataFilterEloquent->orderBy('product_allergen.id', $orderDirection);
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
                parseEditRoute('allergens', $row->id, $row->id, 'asIcon', 'Allergens') .
                parseDeleteRoute('allergens', $row->id, $row->id, 'asIcon', 'Allergens'),
                $row->id,
                parseDetailRoute('allergens', $row->id, $row->product->name, 'Allergens'),
                $row->description,
                parseDate($row->created_at),
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    /**
     * @param null $id
     *
     * @return \Illuminate\View\View
     */
    public function create($id = null): View
    {
        $products = Product::whereDoesntHave('allergen')->get();

        $allergen = null;

        if (isset($id)) {
            $allergen = ProductAllergen::with('product')->where('id', $id)->first();
        }

        return view('admin.allergens.create')->with(['products' => $products, 'allergen' => $allergen]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'product_id' => 'required',
        ]);

        ProductAllergen::updateOrCreate([
            'id' => $request->allergen_id,
        ], [
            'product_id' => $request->product_id,
            'description' => $request->description,
            'created_by' => loggedUser(),
        ]);

        return redirect()->route('admin.allergens.index');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $allergen = ProductAllergen::query()->firstWhere('id', $id);

        return view('admin.allergens.detail')->with(['allergen' => $allergen]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $allergen = ProductAllergen::query()->firstWhere('id', $id);
        $products = Product::all();

        return view('admin.allergens.edit')->with(['allergen' => $allergen, 'products' => $products]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $allergen = ProductAllergen::query()->firstWhere('id', $id);
        $allergen->update([
            'product_id' => $request->get('product_id'),
            'description' => $request->get('description'),
        ]);

        if (!empty($request->get('name'))) {
            $allergen->update(['name' => $request->get('name')]);
        }

        return redirect()->route('admin.allergens.index');

    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $allergen = ProductAllergen::query()->firstWhere('id', $id);

        $allergen->delete();

        return redirect()->route('admin.allergens.index');
    }
}
