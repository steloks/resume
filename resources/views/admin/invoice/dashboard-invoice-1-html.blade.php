<html>
<head></head>
<body>
<div style="width:100%;max-width:1140px;font-size:15px;font-family:sans-serif;margin:15px;">
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;">
        <div style="flex:0 0 100%;max-width:100%;">
            <img style="max-width:100%;height:auto;" src="{{ asset('images/admin/invoice/logo.jpg') }}" alt="Logo">
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;">
        <div style="flex:0 0 100%;max-width:100%;margin-bottom:15px;font-size:37px;font-weight:600;text-align:center;">
            {{ __("Invoice") }}
        </div>
        <div style="flex:0 0 100%;max-width:100%;margin-bottom:15px;font-size:23px;font-weight:600;text-align:center;">
            {{ __("№") . \Illuminate\Support\Str::padLeft($invoice->id,10,0)}}………
        </div>
        <div style="flex:0 0 100%;max-width:100%;margin-bottom:15px;font-size:23px;font-weight:600;text-align:center;">
            {{ __("Date") }}:{{parseDate($invoice->created_at)}}
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;margin-top:30px;">
        <div style="flex:0 0 100%;max-width:100%;">
            <table style="width:100%;font-size:18px;margin:auto;border-collapse:collapse;">
                <tr>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:50%;">
                        <p style="margin-bottom:3px;">{{ __("CUSTOMER ID") }}: {{$invoice->order->client->id}}</p>
                        <p style="margin-bottom:3px;">{{ __("Way of payment") }}: {{$invoice->order->payment_type}}</p>
                    </td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:50%;">
                        <p style="margin-bottom:3px;">{{ __("ORDER No")}}. {{$invoice->order->id}}</p>
                        <p style="margin-bottom:3px;">{{ __("Date order") }}
                            : {{parseDate($invoice->order->created_at)}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:50%;">
                        <p style="font-weight:600;margin-bottom:3px;">{{ __("BILLED TO") }}</p>
                        <p style="margin-bottom:3px;">{{ __("Customer name") }}
                            : {{$invoice->order->name. ' '. $invoice->order->last_name}}</p>
                        <p style="margin-bottom:3px;">{{ __("Customer address") }}
                            : {{$invoice->order->user_address.', '.$invoice->order->user_postcode}}</p>
                        <p style="margin-bottom:3px;">{{ __("Customer email") }}: {{$invoice->order->email}}</p>
                    </td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:50%;">
                        <p style="margin-bottom:3px;"><span
                                style="font-weight:600;">{{ __("BILLED FROM") }} - </span> {{$cInfo->name??''}}</p>
                        <p style="margin-bottom:3px;">{{ __("Company name") }}: {{$cInfo->name??''}}</p>
                        <p style="margin-bottom:3px;">{{ __("Company address") }}: {{$cInfo->address??''}}</p>
                        <p style="margin-bottom:3px;">{{ __("Company email") }}: {{$cInfo->email ??''}}</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;margin-top:20px;">
        <div style="flex:0 0 100%;max-width:100%;font-size:23px;font-weight:600;">
            {{ __("ORDER") }}
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;margin-top:15px;">
        <div style="flex:0 0 100%;max-width:100%;">
            <table style="width:100%;font-size:18px;margin:auto;border-collapse: collapse;">
                <tr style="font-weight:600;">
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">
                        {{ __("Menu No.") }}
                    </td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">
                        {{ __("Menu name") }}
                    </td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">
                        {{ __("Price £") }}
                    </td>
                </tr>
                @foreach($invoice->order->recipes as $recipe)
                    <tr>
                        <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">{{$invoice->order->id .'-'.$recipe->id}}</td>
                        <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">{{$recipe->recipe->name}}</td>
                        <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">{{parseNumber($recipe->price)}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2"
                        style="background-color:#ffffff;text-align:right;padding:8px 15px;border:2px solid #000;width:33%;">{{ __("Cost £") }}</td>
                    <td style="background-color:#ffffff;font-weight:600;padding:8px 15px;border:2px solid #000;width:33%;">
                        {{($invoice->order->total_amount - $invoice->order->vat - $invoice->order->delivery_price)}}£
                    </td>
                </tr>
                <tr>
                    <td colspan="2"
                        style="background-color:#ffffff;text-align:right;padding:8px 15px;border:2px solid #000;width:33%;">{{ __("Delivery £") }}</td>
                    <td style="background-color:#ffffff;font-weight:600;padding:8px 15px;border:2px solid #000;width:33%;">
                        {{ parseNumber($invoice->order->delivery_price)}}£
                    </td>
                </tr>
                <tr>
                    <td colspan="2"
                        style="background-color:#ffffff;text-align:right;padding:8px 15px;border:2px solid #000;width:33%;">{{ __("VAT") }}</td>
                    <td style="background-color:#ffffff;font-weight:600;padding:8px 15px;border:2px solid #000;width:33%;">
                        {{parseNumber($invoice->order->vat)}}£
                    </td>
                </tr>
                <tr>
                    <td colspan="2"
                        style="background-color:#ffffff;text-align:right;padding:8px 15px;border:2px solid #000;width:33%;">{{ __("Total cost £") }}</td>
                    <td style="background-color:#ffffff;font-weight:600;padding:8px 15px;border:2px solid #000;width:33%;">
                        {{parseNumber($invoice->order->total_amount)}}£
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;margin-top:30px;">
        <div
            style="flex:0 0 100%;max-width:100%;font-size:23px;font-weight:600;text-align:center;border-bottom:1px solid #000;">
            {{ __("THANK YOU!"); }}
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;margin-top:30px;margin-bottom:15px;">
        <div style="flex:0 0 50%;max-width:50%;">
            <p style="font-weight:600;margin-bottom:3px;">{{ __("TERMS & CONDITIONS"); }}</p>
            <p>We accept Visa, MasterCard<br>and PayPal payments. All invoices<br>to be paid within 7 days of
                receipt,<br>a 5% monthly late fee will be added<br>to all overdue balances until paid.</p>
        </div>
        <div style="flex:0 0 50%;max-width:50%;">
            <p style="font-weight:600;margin-bottom:3px;">{{ __("QUESTIONS"); }}</p>
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;margin-top:30px;margin-bottom:15px;">
        <div style="flex:0 0 100%;max-width:100%;text-align:right;">
            Page. 1 / 1
        </div>
    </div>
</div>
</body>
</html>
