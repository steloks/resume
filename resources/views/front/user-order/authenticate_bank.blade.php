<form action="https://test.ipg-online.com/connect/gateway/processing{{ $jsession }}" method="POST" class="submit-bank">

    <input type="hidden" name="txntype" value="sale">
    <input type="hidden" name="timezone" value="Europe/London"/>
    <input type="hidden" name="txndatetime" value="<?php echo date('Y-m-d H:i:s') ?>"/>
    <input type="hidden" name="hash_algorithm" value="SHA256"/>
    <input type="hidden" name="hash" value="{{ createHash( $requestData->get('total_amount'), 826 ) }}"/>
    <input type="hidden" name="storename" value="2220540850"/>
    <input type="hidden" name="mode" value="payonly"/>
    <input type="hidden" name="checkoutoption" value="classic"/>
    <input type="hidden" name="custumerid" value="001"/>
    <input type="hidden" name="invoicenumber" value="123123123"/>
    <input type="hidden" name="language" value="en_GB"/>
    <input type="hidden"  name="chargetotal" value="{{ $requestData->get('total_amount') }}"/>
    <input type="hidden" name="currency" value="826"/>
    <input type="hidden" name="oid" value="C-2101f68a-45e9-4f3c-a6da-1337d5574717"/>
    <input type="hidden" name="refnumber" value="321321"/>
    <input type="hidden" name="test_order" value="testvam"/>
    <input type="hidden" name="customParam_color" value="green"/>
</form>

<script src="{{asset('assets/js/jquery/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript">
       $(document).ready(function () {
           $('.submit-bank').submit();
       })
    </script>
