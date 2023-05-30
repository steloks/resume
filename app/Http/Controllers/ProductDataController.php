<?php

namespace App\Http\Controllers;

use App\Exports\ProductDataExport;
use App\Models\ObjectModel;
use App\Models\Product;
use App\Models\ProductData;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Files\Filesystem;
use Maatwebsite\Excel\Files\TemporaryFileFactory;
use Maatwebsite\Excel\QueuedWriter;
use Maatwebsite\Excel\Reader;
use Maatwebsite\Excel\Transactions\DbTransactionHandler;
use Maatwebsite\Excel\Transactions\TransactionHandler;
use Maatwebsite\Excel\Writer;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProductDataController extends Controller
{
    public function addProductData(Request $request)
    {
        $product = Product::firstWhere('id', $request->productId);

        $preparedData = [];

        $latest = ProductData::latest()->first();

        if (isset($request->productDataId)) {
            $preparedData = [
                'amount' => $request->amount,
                'price' => $request->price,
            ];
        } else {
            $preparedData = [
                'object_id' => $request->objectId,
                'product_id' => $request->productId,
                'batch' => isset($latest) ? ($latest->batch + 1) : 10000000,
                'amount' => $request->amount,
                'used_amount' => 0,
                'left_amount' => $request->amount,
                'price' => $request->price,
                'expire_date' => Carbon::now()->addDays($product->days_until_exp),
            ];
        }

        if (isset($request->is_wasted)) {
            $preparedData['is_wasted'] = 1;
            $preparedData['waste_date'] = Carbon::now();
        } else {
            $preparedData['is_wasted'] = 0;
            $preparedData['waste_date'] = null;
        }

        ProductData::updateOrCreate([
            'id' => $request->productDataId,
        ], $preparedData);

        return redirect()->route('admin.objects.product.edit.view', ['objectId' => $request->objectId, 'id' => $product->id]);
    }

    public function objectProductGrid(Request $request, $objectId, $productId)
    {
        $queryProduct = Product::firstWhere('id', $productId);
        $iTotalRecords = ProductData::where('object_id', $objectId)->where('product_id', $productId)->get()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = ProductData::query([
        ])->with(['product.category', 'object'])->where('object_id', $objectId)->where('product_id', $productId);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('batch', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('amount', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->orderBy('used_amount', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('left_amount', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('price', $orderDirection);
                    break;
                case 5:
                    $dataFilterEloquent->orderBy('created_at', $orderDirection);
                    break;
                case 6:
                    $dataFilterEloquent->orderBy('expire_date', $orderDirection);
                    break;
                case 7:
                    $dataFilterEloquent->orderBy('is_wasted', $orderDirection);
                    break;
                case 8:
                    $dataFilterEloquent->orderBy('wated_date', $orderDirection);
                    break;
                default:
                    $dataFilterEloquent->orderBy('id', "DESC");
                    break;
            }
        }

        $iFilteredRecords = $dataFilterEloquent->count();
        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->get();

        $records = [
            'data' => [],
        ];

        foreach ($data as $row) {
            $category = optional($row->product->category);
            $object = optional($row->object);

            $records["data"][] = [
                '<a href="javascript:void(0)" data-bs-toggle="modal" class="editBatch"
                       data-bs-target="#dfObjectProduct" data-product_data_id="' . $row->id . '" data-route="' . route('admin.objects.batch') . '">
                       ' . $object->prefix . parseId($object->id) . '-'
                . $row->product->prefix . '-' . $row->batch . '</a>',
                parseNumber($row->amount) . ($row->product->unit_of_measure == 'u' ? 'ct.' : $row->product->unit_of_measure),
                parseNumber($row->used_amount) . ($row->product->unit_of_measure == 'u' ? 'ct.' : $row->product->unit_of_measure),
                parseNumber($row->left_amount) . ($row->product->unit_of_measure == 'u' ? 'ct.' : $row->product->unit_of_measure),
                number_format($row->price, 2, '.', ' '),
                Carbon::parse($row->created_at)->format('d/m/Y'),
                Carbon::parse($row->expire_date)->format('d/m/Y'),
                $row->is_wasted,
                isset($row->waste_date) ? Carbon::parse($row->waste_date)->format('d/m/Y') : '',
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;
        $records["totalBought"] = $data->sum('amount') . ($queryProduct->unit_of_measure == 'u' ? 'ct.' : $queryProduct->unit_of_measure);
        $records["totalUsed"] = $data->sum('used_amount') . ($queryProduct->unit_of_measure == 'u' ? 'ct.' : $queryProduct->unit_of_measure);
        $records["totalLeft"] = $data->sum('left_amount') . ($queryProduct->unit_of_measure == 'u' ? 'ct.' : $queryProduct->unit_of_measure);

        return response()->json($records);
    }

    public function productBatch(Request $request)
    {
        $productData = ProductData::firstWhere('id', $request->productDataId);

        return response()->json(['success' => true, 'view' => view('admin.objects.product-modal-body', compact('productData'))->render()]);
    }

    public function productData()
    {
        $objects = ObjectModel::all();
        return view('admin.products.product-data', compact('objects'));
    }

    public function productDataGrid(Request $request)
    {
        $iTotalRecords = ProductData::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));
        $dataFilterEloquent = ProductData::query([
            'products.id',
            'products.name',
            'products.kcal',
            'products.category_id',
            'products.created_at',
        ])->with(['product', 'object.products'])
            ->when(!empty($request->objectId), function ($query) use ($request) {
                $query->whereHas('object', function ($object) use ($request) {
                    $object->where('id', $request->objectId);
                });
            })
            ->when(!empty($request->product), function ($query) use ($request) {
                $query->whereHas('product', function ($object) use ($request) {
                    $object->where('name', 'like', '%' . $request->product . '%');
                });
            })
            ->when(!empty($request->wasted), function ($query) use ($request) {
                $query->where('is_wasted', 1);
            })
            ->when(!empty($request->batchUseDate), function ($query) use ($request) {
                $query->whereDate('updated_at', Carbon::create($request->batchUseDate));
                $query->whereColumn('updated_at', '!=', 'created_at');
            })
            ->when(!empty($request->batchPurchaseDate), function ($query) use ($request) {
                $query->whereDate('created_at', Carbon::create($request->batchPurchaseDate));
            });

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
//        if (!empty($searchValue)) {
//            $dataFilterEloquent->where(function ($query) use ($searchValue) {
//                $query->orWhere('name', 'LIKE', '%' . $searchValue . '%');
//            });
//        }

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
        $totalSellPrice = 0;
        foreach ($data as $row) {
            $sellPrice = $row->object->products->firstWhere('id', $row->product_id)->pivot->sell_price ?? $row->product->sell_price;
            $totalSellPrice += $sellPrice;
            $records["data"][] = [
                '<a href="' . route('admin.objects.product.edit.view', ['objectId' => $row->object->id, 'id' => $row->product_id]) . '">
                      ' . $row->batch . '
                     </a>',
                $row->product->name,
                $row->amount . ' ' . ($row->product->unit_of_measure == 'u' ? 'ct.' : $row->product->unit_of_measure) . '.',
                Carbon::parse($row->created_at)->format('d/m'),
                $row->used_amount . ' ' . ($row->product->unit_of_measure == 'u' ? 'ct.' : $row->product->unit_of_measure) . '.',
                Carbon::create($row->created_at)->eq(Carbon::create($row->updated_at)) ? '' : Carbon::parse($row->updated_at)->format('d/m'),
                $row->left_amount . ' ' . ($row->product->unit_of_measure == 'u' ? 'ct.' : $row->product->unit_of_measure) . '.',
                $row->price,
                $sellPrice,
                Carbon::parse($row->expire_date)->format('d/m'),
                !empty($row->is_wasted) ? 'Yes' : 'No',
                !empty($row->is_wasted) ? Carbon::parse($row->waste_date)->format('d/m') : '',
                $row->object->name,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;
        $records["totalBought"] = $data->sum('amount');
        $records["totalPrice"] = parseNumber($data->sum('price'));
        $records["totalSellPrice"] = parseNumber($totalSellPrice);
        $records["totalPurchaseQty"] = parseNumber($data->sum('amount'));
        $records["totalPrepQty"] = parseNumber($data->sum('used_amount'));
        $records["totalResQty"] = parseNumber($data->sum('left_amount'));

        return response()->json($records);
    }

    public function productDataExcel(Request $request)
    {
        $data = ProductData::query([
            'products.id',
            'products.name',
            'products.kcal',
            'products.category_id',
            'products.created_at',
        ])->with(['product', 'object.products'])
            ->when(!empty($request->objectId), function ($query) use ($request) {
                $query->whereHas('object', function ($object) use ($request) {
                    $object->where('id', $request->objectId);
                });
            })
            ->when(!empty($request->product), function ($query) use ($request) {
                $query->whereHas('product', function ($object) use ($request) {
                    $object->where('name', 'like', '%' . $request->product . '%');
                });
            })
            ->when(!empty($request->wasted), function ($query) use ($request) {
                $query->where('is_wasted', 1);
            })
            ->when(!empty($request->batchUseDate), function ($query) use ($request) {
                $query->whereDate('updated_at', Carbon::create($request->batchUseDate));
                $query->whereColumn('updated_at', '!=', 'created_at');
            })
            ->when(!empty($request->batchPurchaseDate), function ($query) use ($request) {
                $query->whereDate('created_at', Carbon::create($request->batchPurchaseDate));
            })->get();

        $records[] = [
            'Batch',
            'Product',
            'Purchased Amount',
            'Date',
            'Used Amount',
            'Date',
            'Left Amount',
            'Delivery Price',
            'Sell Price',
            'Expire Date',
            'Wasted',
            'Wasted Date',
            'Object',
        ];

        foreach ($data as $row) {
            $records[] = [
                $row->batch,
                $row->product->name,
                $row->amount . 'gr.',
                Carbon::parse($row->created_at)->format('d/m'),
                $row->used_amount . 'gr.',
                Carbon::create($row->created_at)->eq(Carbon::create($row->updated_at)) ? '' : Carbon::parse($row->updated_at)->format('d/m'),
                $row->left_amount . 'gr.',
                $row->price,
                $row->object->products->firstWhere('id', $row->product_id)->pivot->sell_price ?? $row->product->sell_price,
                Carbon::parse($row->expire_date)->format('d/m'),
                !empty($row->is_wasted) ? 'Yes' : 'No',
                !empty($row->is_wasted) ? Carbon::parse($row->waste_date)->format('d/m') : '',
                $row->object->name,
            ];
        }
        $filename = 'batches-' . Carbon::now()->format('Y-m-d') . '.xlsx';
        $sheet = new Spreadsheet();
        $activeSheet = $sheet->getActiveSheet();
        $activeSheet->fromArray($records);
        $writer = new Xlsx($sheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($filename) . '"');
        $writer->save('php://output');
    }
}

