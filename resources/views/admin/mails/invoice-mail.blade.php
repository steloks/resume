<html>
<head></head>
<body>
  <div style="font-family:sans-serif;max-width:1024px;margin:auto;color:#000000;">
    <p style="margin-top:5px; margin-bottom:5px;"><img src="images/mail/dfm-t-logo.png" style="width: 180px; height: 182px;"></p>
    <p style="margin-top:5px;margin-bottom:30px;">Hello&nbsp; <b>{{$order->name.' '.$order->last_name}}</b>,</p>
    <p></p>
    <p style="margin-top:5px;margin-bottom:5px;">{{ __("Please find attached your") }} <a href="#" target="_blank"><b>invoice №{{$invoice->id}}</b></a>Date: {{parseDate($invoice->created_at)}}</p>
    <p><br></p>
    <p><br></p>
    <table style="width:100%;border-collapse:collapse;line-height:46px;">
      <tbody>
        <tr style="border-bottom:1px solid #c4c4c4;text-transform:uppercase;">
          <td><b>{{ __("Cost") }}<br></b></td>
          <td><b>{{ __("Order №") }}<br></b></td>
          <td><b>{{ __("Order date") }}<br></b></td>
          <td><b>{{ __("status") }}<br></b></td>
        </tr>
        <tr>
          <td>£{{parseNumber($order->total_amount)}}</td>
          <td>{{$order->id}}</td>
          <td>{{parseDate($order->created_at)}}</td>
          <td style="text-transform:uppercase;"><font color="#88B2B1">{{ __("completed") }}</font></td>
        </tr>
      </tbody>
    </table>
    <p><br></p>
    <div style="padding-top:25px;padding-bottom:25px;padding-left:25px;padding-right:25px;text-align: center;background:#333333;margin-top: 46px;font-size: 13px;">
      <img src="images/mail/dfm-b-logo.png" style="width: 200px; height: 154px;">
      <p style="margin-top: 0;">
        <font color="#c2c2c2">Delivery will be made on the specified day and time range for each menu</font>.
      </p>
      <p>
      </p>
      <p><br></p>
      <p>
        <font color="#c2c2c2">Thank you for your choice!</font>.<br>
      </p>
      <p>
        <font color="#ffffff"><span><b>QUESTIONS</b></span></font><br>
      </p>
      <p>
      </p>
      <p><br></p>
      <p><span>
          <font color="#ffffff"><b>FOLLOW US</b></font>
        </span>
      </p>
      <p>
        <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="images/mail/facebook.png" style="width: 32px;"></a></span>
        <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="images/mail/instagram.png" style="width: 32px;"></a></span>
        <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="images/mail/twitter.png" style="width: 32px;"></a></span>
        <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="images/mail/tiktok.png" style="width: 32px;"></a></span>
        <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="images/mail/youtube.png" style="width: 32px;"></a></span>
        <span style="margin-left:5px;margin-right:5px;"><a href="#" target="_blank"><img src="images/mail/vimeo.png" style="width: 32px;"></a></span>
      </p>
    </div>
  </div>
</body>
</html>
