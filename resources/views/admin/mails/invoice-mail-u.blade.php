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
        <td style="height:30px;">
            <p style="margin-top:5px;margin-bottom:5px;">Hello&nbsp; <b>{{$order->name.' '.$order->last_name}}</b>,</p>
        </td>
    </tr>
    <tr>
        <td>
            <p></p>
        </td>
    </tr>
    <tr>
        <td style="height:30px;">
            <p style="margin-top:5px;margin-bottom:5px;">{{ __("Please find attached your") }} <a href="#" target="_blank"><b>invoice № {{$invoice->id}}</b></a>&nbsp;Date: {{parseDate($invoice->created_at)}}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p><br></p>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width:100%;border-collapse:collapse;">
                <tbody>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("COST") }}<br></b></td>
                    <td style="height:30px;width:50%;">£{{parseNumber($order->total_amount)}}</td>
                </tr>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("ORDER №") }}<br></b></td>
                    <td style="height:30px;width:50%;">{{$order->id}}</td>
                </tr>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("ORDER DATE") }}<br></b></td>
                    <td style="height:30px;width:50%;">{{parseDate($order->created_at)}}</td>
                </tr>
                <tr>
                    <td style="height:30px;width:50%;"><b>{{ __("STATUS") }}<br></b></td>
                    <td style="height:30px;width:50%;">
                        <font color="#88B2B1">{{ __("COMPLETED") }}</font>
                    </td>
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
    </tbody>
</table>
</body>
</html>
