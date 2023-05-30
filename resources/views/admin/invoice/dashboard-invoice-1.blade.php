<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
</head>
<body>
<div class="container">
    <div class="row mt-1">
        <div class="col-12">
            <img class="img-fluid" src="{{ asset('images/admin/invoice/logo.jpg') }}" alt="Logo">
        </div>
    </div>
    <div class="row">
        <div class="col-12 fz-2d5 fw-600 mb-1 text-center">
            {{ __("Invoice")}}
        </div>
        <div class="col-12 fz-1d5 fw-600 mb-1 text-center">
            {{ __("№"). \Illuminate\Support\Str::padLeft($invoice->id,10,0) }}
        </div>
        <div class="col-12 fz-1d5 fw-600 mb-1 text-center">
            {{ __("Date") }}: {{parseDate($invoice->created_at)}}
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <table class="invoice-table-a w-100 fz-1d2 m-auto">
                <tr>
                    <td>
                        <p>{{ __("CUSTOMER ID") }}: {{$invoice->order->client->id}}</p>
                        <p>{{ __("Way of payment") }}: {{$invoice->order->payment_type}}</p>
                    </td>
                    <td>
                        <p>{{ __("ORDER No") }}. {{$invoice->order->id}}</p>
                        <p>{{ __("Date order") }}: {{parseDate($invoice->order->created_at)}}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="fw-600">{{ __("BILLED TO") }}</p>
                        <p>{{ __("Customer name") }}: {{$invoice->order->name. ' '. $invoice->order->last_name}}</p>
                        <p>{{ __("Customer address")}}
                            : {{$invoice->order->user_address.', '.$invoice->order->user_postcode}}</p>
                        <p>{{ __("Customer email") }}: {{$invoice->order->email}}</p>
                    </td>
                    <td>
                        <p><span class="fw-600">{{ __("BILLED FROM") }} - </span> {{$cInfo->name??''}}</p>
                        <p>{{ __("Company name") }}:{{$cInfo->name??''}}</p>
                        <p>{{ __("Company address") }}: {{$cInfo->address??''}}</p>
                        <p>{{ __("Company email") }}: {{$cInfo->email ??''}}</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 fz-1d5 fw-600">
            {{ __("ORDER") }}
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-12">
            <table class="invoice-table-b w-100 fz-1d2 m-auto">
                <tr class="fw-600">
                    <td>
                        {{ __("Menu No.") }}
                    </td>
                    <td>
                        {{ __("Menu name") }}
                    </td>
                    <td>
                        {{ __("Price £") }}
                    </td>
                </tr>
                @foreach($invoice->order->recipes as $recipe)
                    <tr>
                        <td>{{$invoice->order->id .'-'.$recipe->id}}</td>
                        <td>{{$recipe->recipe->name}}</td>
                        <td>{{parseNumber($recipe->price)}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="bg-white text-right">{{ __("Cost £") }}</td>
                    <td class="bg-white fw-600">{{($invoice->order->total_amount - $invoice->order->vat - $invoice->order->delivery_price)}}</td>
                </tr>
                <tr>
                    <td colspan="2" class="bg-white text-right">{{ __("Delivery £") }}</td>
                    <td class="bg-white fw-600">{{ parseNumber($invoice->order->delivery_price)}}£</td>
                </tr>
                <tr>
                    <td colspan="2" class="bg-white text-right">{{ __("VAT") }}</td>
                    <td class="bg-white fw-600">{{parseNumber($invoice->order->vat)}}£</td>
                </tr>
                <tr>
                    <td colspan="2" class="bg-white text-right">{{ __("Total cost £") }}</td>
                    <td class="bg-white fw-600 fw-600">{{parseNumber($invoice->order->total_amount)}}£</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 brd-b-1c0 fz-1d5 fw-600 text-center">
            {{ __("THANK YOU!") }}
        </div>
    </div>
    <div class="row mt-3 mb-2">
        <div class="col-6">
            <p class="fw-600 mb-0d2">{{ __("TERMS & CONDITIONS")}}</p>
            <p>We accept Visa, MasterCard<br>and PayPal payments. All invoices<br>to be paid within 7 days of
                receipt,<br>a 5% monthly late fee will be added<br>to all overdue balances until paid.</p>
        </div>
        <div class="col-6">
            <p class="fw-600 mb-0d2">{{ __("QUESTIONS")}}</p>
        </div>
    </div>
</div>
</body>
</html>
