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
            {{ __("Invoice"); }}
        </div>
        <div style="flex:0 0 100%;max-width:100%;margin-bottom:15px;font-size:23px;font-weight:600;text-align:center;">
            {{ __("№"); }}………
        </div>
        <div style="flex:0 0 100%;max-width:100%;margin-bottom:15px;font-size:23px;font-weight:600;text-align:center;">
            {{ __("Date"); }}:…………
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;margin-top:30px;">
        <div style="flex:0 0 100%;max-width:100%;">
            <table style="width:100%;font-size:18px;margin:auto;border-collapse:collapse;">
                <tr>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:50%;">
                        <p style="margin-bottom:3px;">{{ __("CUSTOMER ID"); }}: ID на клиента, това ще бъде негови клиентски номер</p>
                        <p style="margin-bottom:3px;">{{ __("Way of payment"); }}: – да се сетва Card или PayPal в зависимост как клиента е платил</p>
                    </td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:50%;">
                        <p style="margin-bottom:3px;">{{ __("ORDER No"); }}. номер поръчка</p>
                        <p style="margin-bottom:3px;">{{ __("Date order"); }}: дата поръчка</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:50%;">
                        <p style="font-weight:600;margin-bottom:3px;">{{ __("BILLED TO"); }}</p>
                        <p style="margin-bottom:3px;">{{ __("Customer name"); }}: име на клиента</p>
                        <p style="margin-bottom:3px;">{{ __("Customer address"); }}: адрес на клиента</p>
                        <p style="margin-bottom:3px;">{{ __("Customer email"); }}: имейл на клиента</p>
                    </td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:50%;">
                        <p style="margin-bottom:3px;"><span style="font-weight:600;">{{ __("BILLED FROM"); }} - </span> информацията ще се взима от модул "Данни на фирмата"</p>
                        <p style="margin-bottom:3px;">{{ __("Company name"); }}: име на фирмата</p>
                        <p style="margin-bottom:3px;">{{ __("Company address"); }}: адрес на фирмата</p>
                        <p style="margin-bottom:3px;">{{ __("Company email"); }}: имейл на фирмата</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;margin-top:20px;">
        <div style="flex:0 0 100%;max-width:100%;font-size:23px;font-weight:600;">
            {{ __("ORDER"); }}
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;margin-top:15px;">
        <div style="flex:0 0 100%;max-width:100%;">
            <table style="width:100%;font-size:18px;margin:auto;border-collapse: collapse;">
                <tr style="font-weight:600;">
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">
                        {{ __("Menu No."); }}
                    </td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">
                        {{ __("Menu name"); }}
                    </td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">
                        {{ __("Price £"); }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;"></td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">Item 1</td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;"></td>
                </tr>
                <tr>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;"></td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">Item 2</td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;"></td>
                </tr>
                <tr>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;"></td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;">Item 3</td>
                    <td style="padding:8px 15px;border:2px solid #000;background:#f2f2f2;width:33%;"></td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color:#ffffff;text-align:right;padding:8px 15px;border:2px solid #000;width:33%;">{{ __("Cost £"); }}</td>
                    <td style="background-color:#ffffff;font-weight:600;padding:8px 15px;border:2px solid #000;width:33%;">40,76£</td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color:#ffffff;text-align:right;padding:8px 15px;border:2px solid #000;width:33%;">{{ __("Delivery £"); }}</td>
                    <td style="background-color:#ffffff;font-weight:600;padding:8px 15px;border:2px solid #000;width:33%;">6,00£</td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color:#ffffff;text-align:right;padding:8px 15px;border:2px solid #000;width:33%;">{{ __("VAT"); }}</td>
                    <td style="background-color:#ffffff;font-weight:600;padding:8px 15px;border:2px solid #000;width:33%;">9,35£</td>
                </tr>
                <tr>
                    <td colspan="2" style="background-color:#ffffff;text-align:right;padding:8px 15px;border:2px solid #000;width:33%;">{{ __("Total cost £"); }}</td>
                    <td style="background-color:#ffffff;font-weight:600;padding:8px 15px;border:2px solid #000;width:33%;">56,11£</td>
                </tr>
            </table>
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;margin-top:30px;">
        <div style="flex:0 0 100%;max-width:100%;font-size:23px;font-weight:600;text-align:center;border-bottom:1px solid #000;">
            {{ __("THANK YOU!"); }}
        </div>
    </div>
    <div style="display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;margin-top:30px;margin-bottom:15px;">
        <div style="flex:0 0 50%;max-width:50%;">
            <p style="font-weight:600;margin-bottom:3px;">{{ __("TERMS & CONDITIONS"); }}</p>
            <p>We accept Visa, MasterCard<br>and PayPal payments. All invoices<br>to be paid within 7 days of receipt,<br>a 5% monthly late fee will be added<br>to all overdue balances until paid.</p>
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
