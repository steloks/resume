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
                    <td style="width:50%;">
                        <p style="margin-top:5px;margin-bottom:5px;">Hello&nbsp; <b>{{$order->name.' '.$order->last_name}}</b>,</p>
                        <p style="margin-top:5px;margin-bottom:5px;">{{ __("You have placed a successful") }} <a href="#" target="_blank"><b>Order №{{$order->id}}</b></a></p>
                        <p style="margin-top:5px;margin-bottom:5px;">{{ __("Order date") }} <b>{{parseDate($order->created_at)}}</b></p>
                        <p style="margin-top:5px; margin-bottom:5px;">{{ __("From the site") }}: <a href="https://dogfood.com" target="_blank"><b>www.dogfood.com</b></a></p>
                    </td>
                    <td style="width:50%;">
                        <p style="margin-top:5px;margin-bottom:5px;text-align:right;">{{ __("Status") }}: <font color="#88B2B1">{{ __("ORDERED") }}</font><br></p>
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
                        <td style="height:30px;width:50%;"><b>{{ __("№") }}<br></b></td>
                        <td style="height:30px;width:50%;">{{$key}}</td>
                    </tr>
                    <tr>
                        <td style="height:30px;width:50%;"><b>{{ __("MENU №") }}<br></b></td>
                        <td style="height:30px;width:50%;">{{$order->id .'-'.$recipe->id}}</td>
                    </tr>
                    <tr>
                        <td style="height:30px;width:50%;"><b>{{ __("NAME MENU") }}<br></b></td>
                        <td style="height:30px;width:50%;">{{$recipe->recipe->name}}</td>
                    </tr>
                    <tr>
                        <td style="height:30px;width:50%;"><b>{{ __("PET NAME") }}<br></b></td>
                        <td style="height:30px;width:50%;">{{$recipe->pet->name}}</td>
                    </tr>
                    <tr>
                        <td style="height:30px;width:50%;"><b>{{ __("DELIVERY DATE") }}<br></b></td>
                        <td style="height:30px;width:50%;">{{parseDate($recipe->date) ?? ''}}</td>
                    </tr>
                    <tr>
                        <td style="height:30px;width:50%;"><b>{{ __("TIME SLOT") }}<br></b></td>
                        <td style="height:30px;width:50%;">{{parseTimeslot($recipe->timeslot->start_at).'-'. parseTimeslot($recipe->timeslot->end_at)}}</td>
                    </tr>
                    <tr>
                        <td style="height:30px;width:50%;"><b>{{ __("PRICE /£") }}<br></b></td>
                        <td style="height:30px;width:50%;">£{{parseNumber($recipe->price)}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height:30px;">
                            <hr>
                        </td>
                    </tr>
                    </tbody>
                </table>
            @endforeach
            <table style="width:100%;border-collapse:collapse;margin-bottom:35px;">
                <tbody>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("Cost") }}:</b></td>
                    <td style="height:30px;width:50%;">£{{($order->total_amount - $order->vat - $order->delivery_price)}}</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:30px;">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("Delivery") }}:</b></td>
                    <td style="height:30px;width:50%;">£{{ parseNumber($order->delivery_price)}}</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:30px;">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("VAT 20 %") }}:</b></td>
                    <td style="height:30px;width:50%;">£{{parseNumber($order->vat)}}</td>
                </tr>
                <tr>
                    <td colspan="2" style="height:30px;">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("Total cost") }}:</b></td>
                    <td style="height:30px;width:50%;">£{{parseNumber($order->total_amount)}}</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <p><br></p>
        </td>
    </tr>
    <tr>
        <td>
            <table style="padding-top:25px;padding-bottom:25px;padding-left:25px;padding-right:25px;text-align: center;background-color:#333333;margin-top: 30px;font-size: 13px;width:100%;border-collapse:collapse;">
                <tbody>
                <tr>
                    <td>
                        <img src="{{ asset('images/mail/dfm-b-logo.png') }}" style="width: 200px; height: 154px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="margin-top: 0;">
                            <font color="#c2c2c2">Delivery will be made on the specified day and time range for each menu</font>.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            <font color="#c2c2c2">For more information on ordering and invoicing, visit your account at <b>
                                </b>.</font>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><br></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            <font color="#c2c2c2">Thank you for your choice!</font>.<br>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><br></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            <font color="#ffffff"><span><b>QUESTIONS</b></span></font><br>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                                </a></font>.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><br></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><span>
                      <font color="#ffffff"><b>FOLLOW US</b></font>
                    </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="{{ asset('images/mail/facebook.png') }}" style="width: 32px;"></a></span>
                            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="{{ asset('images/mail/instagram.png') }}" style="width: 32px;"></a></span>
                            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="{{ asset('images/mail/twitter.png') }}" style="width: 32px;"></a></span>
                            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="{{ asset('images/mail/tiktok.png') }}" style="width: 32px;"></a></span>
                            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="{{ asset('images/mail/youtube.png') }}" style="width: 32px;"></a></span>
                            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="{{ asset('images/mail/vimeo.png') }}" style="width: 32px;"></a></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><br></p>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tbody>
</table>
</body>
</html>
