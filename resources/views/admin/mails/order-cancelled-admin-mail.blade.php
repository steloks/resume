@@ -0,0 +1,168 @@
<html>
<head></head>
<body>
<div style="font-family:sans-serif;max-width:1024px;margin:auto;color:#000000;">
    <p style="margin-top:5px; margin-bottom:5px;"><img src="images/mail/dfm-t-logo.png" style="width: 180px; height: 182px;"></p>
    <table style="width:100%;border-collapse:collapse;line-height:46px;">
        <tbody>
        <tr>
            <td>
                <p style="margin-top:5px;margin-bottom:5px;">Hello admin,<br>A new cancelled order has been placed. </p>
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
                                <font color="#C59F7B">{{ __("partially cancelled") }}</font>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="margin-top:5px;margin-bottom:5px;margin-right:10px;">{{ __("Order №") }}:</p>
                        </td>
                        <td>
                            <p style="margin-top:5px;margin-bottom:5px;"><b>92813524</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="margin-top:5px;margin-bottom:5px;margin-right:10px;">{{ __("Order date") }}:</p>
                        </td>
                        <td>
                            <p style="margin-top:5px;margin-bottom:5px;"><b>22/10/2021</b></p>
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
            <td>James Jameson</td>
            <td>74 Manchester Road, NEWCASTLE UPON TYNE NE95 7GJ</td>
            <td>08939491340</td>
        </tr>
        </tbody>
    </table>
    <p style="margin-top:5px;margin-bottom:5px;"><br></p>
    <p style="margin-top:5px;margin-bottom:5px;"><br></p>
    <p style="margin-top:5px;margin-bottom:5px;"><b>{{ __("Ordered menus") }}</b></p>
    <table style="width:100%;border-collapse:collapse;line-height:46px;margin-bottom:35px;">
        <tbody>
        <tr style="border-bottom:1px solid #c4c4c4;text-transform:uppercase;">
            <td style="padding-right:10px;"><b>{{ __("№") }}</b></td>
            <td><b>{{ __("Menu") }}</b></td>
            <td><b>{{ __("Pet name") }}</b></td>
            <td><b>{{ __("Delivery date") }}</b></td>
            <td><b>{{ __("Time slot") }}</b></td>
            <td><b>{{ __("Status") }}</b></td>
            <td style="width:180px;line-height:20px;text-align:center;"><b>{{ __("Date of payment status") }}</b></td>
            <td><b>{{ __("Price /£") }}</b></td>
        </tr>
        <tr style="border-bottom:1px solid #c4c4c4;">
            <td>1</td>
            <td>
                <p style="margin-top:5px;margin-bottom:0px;padding:0;line-height:20px;"><b>Beef & chicken with oats</b></p>
                <p style="margin-top:0px;margin-bottom:0px;line-height:20px;">C01-012384-01</p>
            </td>
            <td>Charlie</td>
            <td>24/10/21</td>
            <td>09:00-10:00</td>
            <td style="text-transform:uppercase;">
                <font color="#803134">CANCELLED</font>
            </td>
            <td style="text-align:center;">23/10/21</td>
            <td>£13,76</td>
        </tr>
        <tr style="border-bottom:1px solid #c4c4c4;">
            <td>1</td>
            <td>
                <p style="margin-top:5px;margin-bottom:0px;padding:0;line-height:20px;"><b>Beef & chicken with oats</b></p>
                <p style="margin-top:0px;margin-bottom:0px;line-height:20px;">C01-012384-01</p>
            </td>
            <td>Charlie</td>
            <td>24/10/21</td>
            <td>09:00-10:00</td>
            <td style="text-transform:uppercase;">
                <font color="#88B2B1">Ordered</font>
            </td>
            <td style="text-align:center;">-</td>
            <td>£13,76</td>
        </tr>
        <tr style="border-bottom:1px solid #c4c4c4;">
            <td>1</td>
            <td>
                <p style="margin-top:5px;margin-bottom:0px;padding:0;line-height:20px;"><b>Beef & chicken with oats</b></p>
                <p style="margin-top:0px;margin-bottom:0px;line-height:20px;">C01-012384-01</p>
            </td>
            <td>Charlie</td>
            <td>24/10/21</td>
            <td>09:00-10:00</td>
            <td style="text-transform:uppercase;">
                <font color="#803134">CANCELLED</font>
            </td>
            <td style="text-align:center;">23/10/21</td>
            <td>£13,76</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #c4c4c4;"><b>{{ __("Cost") }}:</b></td>
            <td style="border-bottom:1px solid #c4c4c4;">£40,76</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #c4c4c4;"><b>{{ __("Delivery") }}:</b></td>
            <td style="border-bottom:1px solid #c4c4c4;">£6,00</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #c4c4c4;"><b>{{ __("VAT 20 %") }}:</b></td>
            <td style="border-bottom:1px solid #c4c4c4;">£9,35</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border-bottom:1px solid #c4c4c4;"><b>{{ __("Total cost") }}:</b></td>
            <td style="border-bottom:1px solid #c4c4c4;">£56,10</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
