<html>
<head></head>
<body>
<div style="font-family:sans-serif;max-width:1024px;margin:auto;color:#000000;">
    <p style="margin-top:5px; margin-bottom:5px;"><img src="{{asset('images/mail/dfm-t-logo.png')}}"
                                                       style="width: 180px; height: 182px;"></p>
    <p style="margin-top:5px;margin-bottom:5px;">Hello&nbsp; <b>{{$order->name.' '.$order->last_name}}</b>,</p>
    <p style="margin-top:5px;margin-bottom:5px;text-align:right;">{{ __("Status") }}: <font
            color="#88B2B1">{{ __("ORDERED") }}</font><br></p>
    <p style="margin-top:5px;margin-bottom:5px;">{{ __("You have placed a successful") }} <a href="#"
                                                                                             target="_blank"><b>Order
                № {{$order->id}}</b></a></p>
    <p style="margin-top:5px;margin-bottom:5px;">{{ __("Order date") }} <b>{{parseDate($order->created_at)}}</b></p>
    <p style="margin-top:5px; margin-bottom:5px;">{{ __("From the site") }}: <a href="https://dogfood.com"
                                                                                target="_blank"><b>www.dogfood.com</b></a>
    </p>
    <p style="margin-top:5px;margin-bottom:5px;"><br></p>
    <p style="margin-top:5px;margin-bottom:5px;"><br></p>
    <p style="margin-top:5px;margin-bottom:5px;"><b>{{ __("Ordered menus") }}</b></p>
    <table style="width:100%;border-collapse:collapse;line-height:46px;">
        <tbody>
        <tr style="border-bottom:1px solid #c4c4c4;">
            <td><b>{{ __("№") }}<br></b></td>
            <td><b>{{ __("Menu №") }}<br></b></td>
            <td><b>{{ __("Name menu") }}<br></b></td>
            <td><b>{{ __("Pet name") }}<br></b></td>
            <td><b>{{ __("Delivery date") }}<br></b></td>
            <td><b>{{ __("Time slot") }}<br></b></td>
            <td><b>{{ __("Price /£") }}&nbsp;</b><br></td>
        </tr>
        @foreach($order->recipes as $key=> $recipe)
            <tr style="border-bottom:1px solid #c4c4c4;">
                <td>{{$key}}</td>
                <td>{{$order->id .'-'.$recipe->id}}</td>
                <td>{{$recipe->recipe->name}}</td>
                <td>{{$recipe->pet->name}}</td>
                <td>{{parseDate($recipe->date)}}</td>
                <td>{{parseTimeslot($recipe->timeslot->start_at).'-'. parseTimeslot($recipe->timeslot->end_at)}}</td>
                <td>{{parseNumber($recipe->price)}}</td>
            </tr>
        @endforeach
        {{--        <tr style="border-bottom:1px solid #c4c4c4;">--}}
        {{--          <td>1</td>--}}
        {{--          <td>C01-012384-01</td>--}}
        {{--          <td>Beef & chicken with oats</td>--}}
        {{--          <td>Charlie</td>--}}
        {{--          <td>24/10/21</td>--}}
        {{--          <td>09:00-10:00</td>--}}
        {{--          <td>£13,76</td>--}}
        {{--        </tr>--}}
        {{--        <tr style="border-bottom:1px solid #c4c4c4;">--}}
        {{--          <td>2</td>--}}
        {{--          <td>C01-012384-01</td>--}}
        {{--          <td>Beef & chicken with oats</td>--}}
        {{--          <td>Charlie</td>--}}
        {{--          <td>24/10/21</td>--}}
        {{--          <td>09:00-10:00</td>--}}
        {{--          <td>£13,76</td>--}}
        {{--        </tr>--}}
        {{--        <tr style="border-bottom:1px solid #c4c4c4;">--}}
        {{--          <td>3</td>--}}
        {{--          <td>C01-012384-01</td>--}}
        {{--          <td>Beef & chicken with oats</td>--}}
        {{--          <td>Charlie</td>--}}
        {{--          <td>24/10/21</td>--}}
        {{--          <td>09:00-10:00</td>--}}
        {{--          <td>£13,76</td>--}}
        {{--        </tr>--}}
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #c4c4c4;"><b>{{ __("Cost") }}:</b></td>
            <td style="border-bottom:1px solid #c4c4c4;">
                £{{($order->total_amount - $order->vat - $order->delivery_price)}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #c4c4c4;"><b>{{ __("Delivery") }}:</b></td>
            <td style="border-bottom:1px solid #c4c4c4;">£{{ parseNumber($order->delivery_price)}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #c4c4c4;"><b>{{ __("VAT 20 %") }}:</b></td>
            <td style="border-bottom:1px solid #c4c4c4;">£{{parseNumber($order->vat)}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #c4c4c4;"><b>{{ __("Total cost") }}:</b></td>
            <td style="border-bottom:1px solid #c4c4c4;">£{{parseNumber($order->total_amount)}}</td>
        </tr>
        </tbody>
    </table>
    <div
        style="padding-top:25px;padding-bottom:25px;padding-left:25px;padding-right:25px;text-align: center;background:#333333;margin-top: 46px;font-size: 13px;">
        <img src="{{asset('images/mail/dfm-b-logo.png')}}" style="width: 200px; height: 154px;">
        <p style="margin-top: 0;">
            <font color="#c2c2c2">Delivery will be made on the specified day and time range for each menu</font>.
        </p>
        <p>
            <font color="#c2c2c2">For more information on ordering and invoicing, visit your account at <b><font
        </p>
        <p><br></p>
        <p>
            <font color="#c2c2c2">Thank you for your choice!</font>.<br>
        </p>
        <p>
            <font color="#ffffff"><span><b>QUESTIONS</b></span></font><br>
        </p>
        <p>
            <font color="#c2c2c2">If you have any questions you can contact us via email: <a
        </p>
        <p><br></p>
        <p><span>
          <font color="#ffffff"><b>FOLLOW US</b></font>
        </span>
        </p>
        <p>
            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img
                        src="{{asset("images/mail/facebook.png")}}" style="width: 32px;"></a></span>
            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img
                        src="{{asset("images/mail/instagram.png")}}" style="width: 32px;"></a></span>
            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img
                        src="{{asset("images/mail/twitter.png")}}" style="width: 32px;"></a></span>
            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img
                        src="{{asset("images/mail/tiktok.png")}}" style="width: 32px;"></a></span>
            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img
                        src="{{asset("images/mail/youtube.png")}}" style="width: 32px;"></a></span>
            <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img
                        src="{{asset("images/mail/vimeo.png")}}"
                        style="width: 32px;"></a></span>
        </p>
    </div>
</div>
</body>
</html>
