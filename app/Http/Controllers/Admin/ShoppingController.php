<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ObjectModel;
use App\Models\ProductData;
use App\Models\ShoppingList;
use App\PrintNode\PrintJobSender;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\DeclareDeclare;
use function PHPUnit\Framework\stringContains;

class ShoppingController extends Controller
{
    private $recipeController;

    public function __construct(RecipeController $recipeController)
    {
        $this->recipeController = $recipeController;
    }

    public function list()
    {
        $date = getMenusDate();
        if (!ShoppingList::firstWhere('date', $date)) {
            $this->generateShoppingList($date);
        }

        $objects = ObjectModel::all();

        $dateNow = Carbon::now()->format('d-m-Y');

        return view('admin.shopping.list', compact('dateNow', 'objects'));
    }

    public function listGrid(Request $request)
    {
        if (!ShoppingList::firstWhere('date', Carbon::create($request->date))) {
            $this->generateShoppingList(Carbon::create($request->date));
        }
        $iTotalRecords = ShoppingList::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));
        $dataFilterEloquent = ShoppingList::where('object_id', $request->objectId)
            ->where('date', isset($request->date) ? Carbon::create($request->date) : getMenusDate())
            ->with(['product']);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
//            $dataFilterEloquent->where(function ($query) use ($searchValue) {
//                $query->where('recipes.name', 'LIKE', '%' . $searchValue . '%');
//            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
//            switch ($order[0]['column']) {
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
//                case 4:
//                    $dataFilterEloquent->orderBy('recipes.created_by', $orderDirection);
//                    break;
//                default:
//                    $dataFilterEloquent->orderBy('id', $orderDirection);
//                    break;
//            }
        }

        $iFilteredRecords = $dataFilterEloquent->count();
        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->get();

        $records = [
            'data' => [],
        ];

        foreach ($data as $row) {
            $checked = $row->is_purchased == 1 ? 'checked disabled' : '';
            switch ($row->product->unit_of_measure) {
                case 'g':
                    $measure = 'g.';
                    break;
                case 'ml':
                    $measure = 'Ml\'s';
                    break;
                default:
                    $measure = 'Count';
                    break;
            }
            $records["data"][] = [
                '<input type="checkbox" class="shoppingListCheckBox" ' . $checked . ' value=' . $row->id . ' data-route=' . route('admin.shopping.purchase', ['shoppingListId' => $row->id]) . '>',
                $row->product->name,
                $row->product->name == 'Egg' ? 1 : number_format($row->amount, 2, '.', '') . ' ' . $measure,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function generateShoppingList($date)
    {
        $objectProducts = $this->recipeController->getOrderRecipesProducts($date);
//        dd($objectProducts);
        foreach ($objectProducts as $objectId => $objectProduct) {
            foreach ($objectProduct as $productId => $productWeight) {
                $leftAmount = ProductData::where('object_id', $objectId)->where('product_id', $productId)->sum('left_amount');
                if (($productWeight - $leftAmount) > 0) {
                    ShoppingList::create([
                        'object_id' => $objectId,
                        'product_id' => $productId,
                        'amount' => $productWeight - $leftAmount,
                        'date' => $date,
                    ]);
                }
            }
        }
    }

    public function purchase($shoppingListId, Request $request)
    {
        ShoppingList::firstWhere('id', $shoppingListId)->update([
            'is_purchased' => $request->checked,
        ]);

        return response()->json(['success' => true]);
    }

    public function purchasedList()
    {
        $objects = ObjectModel::all();

        return view('admin.shopping.purchased-list', compact('objects'));
    }

    public function purchasedListGrid(Request $request)
    {
        $iTotalRecords = ShoppingList::where('is_purchased', 1)->get()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = ShoppingList::where('object_id', $request->objectId)->where('date', getMenusDate())->where('is_purchased', 1)->with(['object', 'product', 'productData']);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
//            $dataFilterEloquent->where(function ($query) use ($searchValue) {
//                $query->where('recipes.name', 'LIKE', '%' . $searchValue . '%');
//            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
//            switch ($order[0]['column']) {
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
//                case 4:
//                    $dataFilterEloquent->orderBy('recipes.created_by', $orderDirection);
//                    break;
//                default:
//                    $dataFilterEloquent->orderBy('id', $orderDirection);
//                    break;
//            }
        }

        $iFilteredRecords = $dataFilterEloquent->count();
        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->get();

        $records = [
            'data' => [],
        ];
//        dd($data->toArray());
        foreach ($data as $key => $row) {
            $checked = $row->is_purchased == 1 ? 'checked disabled' : '';
            $productData = $row->productData;
            $stored = isset($productData) ? 'Stored' : 'Store';
            $isStored = isset($productData) ? '' : 'notStored';
            $object = $row->object;
            $product = $row->product;
            $records["data"][] = [
                $object->prefix . $object->id . '-' . $product->prefix,
                $product->name,
                $object->name,
                '<span id="batch-' . $row->id . '">' . optional($productData)->batch . '</span>',
                'Grams',
                parseNumber($row->amount),
                '<input class="purchasedAmount" type="number" value=' . (optional($productData)->amount ?? 0) . '>',
                '<button type="button" data-route="' . route('admin.shopping.store.purchased') . '" data-id="' . $row->id . '" class="btn btn-dark text-uppercase ' . $isStored . '" >' . $stored . '</button>',
                '<button type="button" class="btn btn-dark text-uppercase print" data-id="' . $row->id . '" data-route="' . route('admin.shopping.print.purchased') . '">Print</button>',
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function storePurchased(Request $request)
    {
        $shoppingList = ShoppingList::with('product')->firstWhere('id', $request->shoppingListId);

        $latest = ProductData::latest()->first();

        $productData = ProductData::create([
            'object_id' => $shoppingList->object_id,
            'product_id' => $shoppingList->product_id,
            'batch' => isset($latest) ? ($latest->batch + 1) : 10000000,
            'amount' => $request->purchasedAmount,
            'used_amount' => 0,
            'left_amount' => $request->purchasedAmount,
            'price' => $shoppingList->product->buy_price,
            'expire_date' => Carbon::now()->addDays($shoppingList->product->days_until_exp),
        ]);

        $shoppingList->update([
            'product_data_id' => $productData->id,
        ]);

        return response()->json(['success' => true]);
    }

    public function printPurchased(Request $request)
    {
        // $shoppingList = ShoppingList::with('product')->firstWhere('id', $request->shoppingListId);
        $productData = ProductData::where('batch', $request->batch)->with(['product', 'object'])->first();
        $object = $productData->object;
        $product = $productData->product;

        $zpl = '^XA ^CI28 ^CWT,E:ARI000.TTF ^FX 80x100 label 1 ^FO50,50^GB550,700,3^FS ^FX headings ^CF0,25 ^FO80,110 ^FB250,2, 5 ^FDBATCH NUMBER^FS ^FO80,200 ^FB250,2, 5 ^FDPRODUCT NAME^FS ^FO80,290 ^FB250,2, 5 ^FDPURCHASED QUANTITY^FS ^FO80,410 ^FB250,2, 5 ^FDDATE OF PURCHASE^FS ^FO80,530 ^FB250,2, 5 ^FDEXPIRITY DATE^FS ^FO80,640^FDOBJECT^FS ^CFT,20 ^FO350,115 ^FB300,2, 5 ^FDBATCH_NUMBER^FS ^FO350,205 ^FB300,2, 5 ^FDPRODUCT_NAME^FS ^FO350,295 ^FB300,2, 5 ^FDPURCHASED_QUANTITY^FS ^FO350,415 ^FB300,2, 5 ^FDDATE_OF_PURCHASE ^FS ^FO350,535 ^FB300,2, 5 ^FDEXPIRITY_DATE^FS ^FO350,645 ^FB300,2, 5 ^FDOBJECT_NAME^FS ^XZ';

        switch ($product->unit_of_measure) {
            case "g":
                $unit = 'grams';
                break;
            case "u":
                $unit = 'units';
                break;
            case "ml":
                $unit = 'ml';
                break;
        }

        $zpl = str_replace([
            'BATCH_NUMBER',
            'PURCHASED_QUANTITY',
            'DATE_OF_PURCHASE',
            'EXPIRITY_DATE',
            'PRODUCT_NAME',
            'OBJECT_NAME'
        ],
            [
                $object->prefix . $object->id . '-' . $product->prefix . '-' . $productData->batch,
                $productData->amount . ' ' . $unit,
                trim(getMenusDate()->format('Y-m-d')),
                trim($productData->expire_date),
                $product->name,
                $object->name
            ], $zpl);

        $jobName = Carbon::now()->format('Ymd_His') . '-' . $request->batch . '-shopping-label.zpl';
        $printSender = new PrintJobSender();
        $printStatus = $printSender->addPrintJob($zpl, $jobName);

        return response()->json([
            'success' => $printStatus
        ]);
    }
}
