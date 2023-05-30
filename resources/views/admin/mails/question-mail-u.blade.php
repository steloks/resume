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
            <p style="margin-top:5px;">Hello admin,</p>
        </td>
    </tr>
    <tr>
        <td style="height:30px;">
            <p style="margin-top:5px;margin-bottom:5px;">A new message has been received.</p>
        </td>
    </tr>
    <tr>
        <td style="height:30px;">
            <p><br></p>
        </td>
    </tr>
    <tr>
        <td>
            <table style="width:100%;">
                <tbody>
                <tr style="padding-top:20px;padding-bottom:20px;">
                    <td style="height:30px;"><b>{{ __("NAME") }}<br></b></td>
                    <td style="height:30px;">{{$params->name}}</td>
                </tr>
                <tr style="padding-top:20px;padding-bottom:20px;">
                    <td style="height:30px;"><b>{{ __("EMAIL") }}<br></b></td>
                    <td style="height:30px;">{{$params->email}}</td>
                </tr>
                <tr style="padding-top:20px;padding-bottom:20px;">
                    <td style="padding-right:20px;line-height:20px;vertical-align:top;">
                        <p style="margin-top:20px;"><b>{{ __("MESSAGE") }}<br></b></p>
                    </td>
                    <td>
                        <p style="line-height:20px;margin-top:20px;">
                            {{$params->message}}
                        </p>
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
    </tbody>
</table>
</body>
</html>
