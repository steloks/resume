<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Mail\OrderAdminMail;
use App\Mail\OrderClientMail;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    protected $pdfController;

    public function __construct(PDFController $pdfController)
    {
        $this->pdfController = $pdfController;
    }

    public function createInvoice($orderId = 38)
    {
        $invoice = Invoice::create([
            'order_id' => $orderId,
            'path' => 'sda',
            'status_id' => 99,
        ]);

        Mail::to($invoice->order->email)->send(new InvoiceMail($invoice->id, $this->pdfController, $orderId));
    }

    public function invoiceList()
    {
        return view('admin.invoice.list');
    }

    public function invoiceListGrid(Request $request)
    {
        $iTotalRecords = Invoice::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Invoice::query()->with(['order'])
            ->when(!empty($request->invoiceId), function ($query) use ($request) {
                $query->where('id', $request->invoiceId);
            })
            ->when(!empty($request->orderId), function ($query) use ($request) {
                $query->whereHas('order', function ($order) use ($request) {
                    $order->where('id', $request->orderId);
                });
            })
            ->when(!empty($request->client), function ($query) use ($request) {
                $query->whereHas('order', function ($order) use ($request) {
                    $order->where('name', 'like', '%' . $request->client . '%');
                });
            })
            ->when(!empty($request->dateofissue), function ($query) use ($request) {
                $query->whereDate('created_at', Carbon::create($request->dateofissue));
            });

        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('created_at', $orderDirection);
                    break;
//                case 2:
//                    $dataFilterEloquent->whereHas('recipeType', function ($q) use ($orderDirection) {
//                        $q->orderBy('name', $orderDirection);
//                    });
//                    break;
//                case 3:
//                    $dataFilterEloquent->orderBy('recipes.created_at', $orderDirection);
//                    break;
//                case 4:
//                    $dataFilterEloquent->orderBy('date', $orderDirection);
//                    break;
                default:
                    $dataFilterEloquent->orderBy('id', ($orderDirection == 'ASC' ? 'DESC' : 'ASC'));
                    break;
            }
        }

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('id', 'LIKE', '%' . $searchValue . '%');
            });
        }

        $iFilteredRecords = $dataFilterEloquent->count();

        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->orderBy('id')->get();

        $records = [
            'data' => [],
        ];

        foreach ($data as $row) {
            $records["data"][] = [
                parseEditRoute('invoices', $row->id, Str::padLeft($row->id, 10, 0), null, 'Invoice'),
                parseDate($row->created_at),
                parseEditRoute('orders', $row->order->id, $row->order->id, null, 'Orders'),
                parseDate($row->order->created_at),
                number_format($row->order->total_amount, 2, '.', ' '),
                $row->order->name . ' ' . $row->order->last_name,
                __('Sent'),
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function invoiceView($id)
    {
        $invoice = Invoice::with(['order' => function ($order) {
            $order->with(['recipes' => function ($recipe) {
                $recipe->whereNull('canceled_menu');
                $recipe->with(['pet', 'recipe']);
            }, 'client', 'status']);

        }])->firstWhere('id', $id);

        return view('admin.invoice.detail', compact('invoice'));
    }
}
