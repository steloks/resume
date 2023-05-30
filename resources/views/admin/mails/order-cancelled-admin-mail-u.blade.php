<html>
<head></head>
<body>
<table style="font-family:Arial, sans-serif;max-width:1024px;margin:auto;color:#000000;width:100%;border-collapse:collapse;">
    <tbody>
    <tr>
        <td style="height:30px;">
            <p style="margin-top:5px; margin-bottom:5px;"><img src="{{ asset('images/mail/dfm-t-logo.png') }}" style="width: 180px; height: 182px;"></p>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width:100%;border-collapse:collapse;">
                <tbody>
                <tr>
                    <td>
                        <p style="margin-top:5px;margin-bottom:5px;">Hello admin,<br>A new cancelled order has been placed.</p>
                    </td>
                    <td style="text-align:right;clear:both;">
                        <table style="text-align:right;float:right;">
                            <tbody>
                            <tr>
                                <td>
                                    <p style="margin-top:5px;margin-bottom:5px;margin-right:10px;">{{ __("Status") }}:</p>
                                </td>
                                <td style="text-transform:uppercase;">
                                    <p style="margin-top:5px;margin-bottom:5px;">
                                        <font color="#C59F7B">{{ __("CANCELLED") }}</font>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="margin-top:5px;margin-bottom:5px;margin-right:10px;">{{ __("Order №") }}:</p>
                                </td>
                                <td>
                                    <p style="margin-top:5px;margin-bottom:5px;"><b>{{$order->id}}</b></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p style="margin-top:5px;margin-bottom:5px;margin-right:10px;">{{ __("Order date") }}:</p>
                                </td>
                                <td>
                                    <p style="margin-top:5px;margin-bottom:5px;"><b>{{parseDate($order->created_at)}}</b></p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <p style="margin-top:5px;margin-bottom:5px;"><br></p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="margin-top:5px;margin-bottom:5px;"><br></p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="margin-top:5px;margin-bottom:25px;"><b>{{ __("Details") }}</b></p>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width:100%;border-collapse:collapse;">
                <tbody>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("CLIENT") }}</b></td>
                    <td style="height:30px;width:50%;">{{$order->name.' '.$order->last_name}}</td>
                </tr>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("DELIVERY ADDRESS") }}</b></td>
                    <td style="height:30px;width:50%;">{{$order->user_address.', '.$order->user_postcode}}</td>
                </tr>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("PHONE") }}</b></td>
                    <td style="height:30px;width:50%;">{{ $order->phone }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:30px;">
                        <hr>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <p style="margin-top:1px;margin-bottom:1px;"><br></p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="margin-top:5px;margin-bottom:25px;"><b>{{ __("Ordered menus") }}</b></p>
        </td>
    </tr>
    <tr>
        <td>
            @foreach($order->recipes as $key=> $recipe)
            <table style="width:100%;border-collapse:collapse;margin-bottom:35px;">
                <tbody>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("Cost") }}:</b></td>
                    <td style="height:30px;width:50%;">{!! parsePrice($order->total_amount - $order->vat - $order->delivery_price) !!}</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:30px;">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("Delivery") }}:</b></td>
                    <td style="height:30px;width:50%;">{!! parsePrice($order->delivery_price) !!}</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:30px;">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("VAT 20 %") }}:</b></td>
                    <td style="height:30px;width:50%;">{!! parsePrice($order->vat) !!}</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:30px;">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("Total cost") }}:</b></td>
                    <td style="height:30px;width:50%;">{!! parsePrice($order->total_amount) !!}</td>
                </tr>
                </tbody>
            </table>
            @endforeach
        </td>
    </tr>
    <tbody>
</table>
</body>
</html>
