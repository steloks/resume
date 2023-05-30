<html>
<head></head>
<body>
  <div style="font-family:sans-serif;max-width:1024px;margin:auto;color:#000000;">
    <p style="margin-top:5px; margin-bottom:5px;"><img src="images/mail/dfm-t-logo.png" style="width: 180px; height: 182px;"></p>
    <table style="width:100%;border-collapse:collapse;line-height:46px;">
      <tbody>
        <tr>
          <td>
            <p style="margin-top:5px;margin-bottom:5px;">Hello admin,<br>A new order has been placed.</p>
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
                      <font color="#88B2B1">{{ __("ORDERED") }}</font>
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
    <p style="margin-top:5px;margin-bottom:5px;"><br></p>
    <p style="margin-top:5px;margin-bottom:5px;"><br></p>
    <p style="margin-top:5px;margin-bottom:5px;"><b>{{ __("Details") }}</b></p>
    <table style="width:100%;border-collapse:collapse;line-height:46px;">
      <tbody>
        <tr style="border-bottom:1px solid #c4c4c4;text-transform:uppercase;">
          <td><b>{{ __("Client") }}<br></b></td>
          <td><b>{{ __("Delivery address") }}<br></b></td>
          <td><b>{{ __("Phone") }}<br></b></td>
        </tr>
        <tr>
          <td>{{$order->name.' '.$order->last_name}}</td>
          <td>{{$order->user_address.', '.$order->user_postcode}}</td>
          <td>{{$order->phone}}</td>
        </tr>
      </tbody>
    </table>
    <p style="margin-top:5px;margin-bottom:5px;"><br></p>
    <p style="margin-top:5px;margin-bottom:5px;"><br></p>
    <p style="margin-top:5px;margin-bottom:5px;"><b>{{ __("Ordered menus") }}</b></p>
    <table style="width:100%;border-collapse:collapse;line-height:46px;margin-bottom:35px;">
      <tbody>
        <tr style="border-bottom:1px solid #c4c4c4;text-transform:uppercase;">
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
                <td>{{parseTimeslot($recipe->timeslot->start_at).'-'. parseTimeslot($recipe->timeslot->end_at)}}</td>
                <td>{{parseNumber($recipe->price)}}</td>
            </tr>
        @endforeach
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td style="border-bottom:1px solid #c4c4c4;"><b>{{ __("Cost") }}:</b></td>
          <td style="border-bottom:1px solid #c4c4c4;">£{{($order->total_amount - $order->vat - $order->delivery_price)}}</td>
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
  </div>
</body>
</html>
