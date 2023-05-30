<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Models\Invoice;
use App\Models\ShoppingList;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function shoppingList(Request $request)
    {
        $data = ShoppingList::with(['product'])->whereHas('product')->where('object_id', $request->pdfObjectId)->where('date', isset($request->pdfDate) ? \Illuminate\Support\Carbon::create($request->pdfDate) : getMenusDate())->get();

        $pdf = PDF::loadHTML(view('admin.pdf.shopping-list', compact('data'))->render());

        return $pdf->download('shopping-list.' . now()->format('Y-m-d') . '.pdf');
    }

    public function invoiceStore($invoiceId)
    {
        $invoice = Invoice::with(['order' => function ($order) {
            $order->with(['recipes' => function ($recipe) {
                $recipe->whereNull('canceled_menu');
                $recipe->with(['pet', 'recipe']);
            }, 'client', 'status']);

        }])->firstWhere('id', $invoiceId);

        $cInfo = CompanyInfo::first();

        $pdf = PDF::loadHTML(view('admin.invoice.dashboard-invoice-1-html', compact('invoice', 'cInfo'))->render());

        return $pdf->download('invoice-' . now()->format('Y-m-d') . '-' . $invoice->order->id . '.pdf');
    }
}
