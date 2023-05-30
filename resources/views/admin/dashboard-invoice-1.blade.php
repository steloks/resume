@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Invoice - 1')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row mt-1">
            <div class="col-12">
                <img class="img-fluid" src="{{ asset('images/admin/invoice/logo.jpg') }}" alt="Logo">
            </div>
        </div>
        <div class="row">
            <div class="col-12 fz-2d5 fw-600 mb-1 text-center">
                {{ __("Invoice"); }}
            </div>
            <div class="col-12 fz-1d5 fw-600 mb-1 text-center">
                {{ __("№"); }}………
            </div>
            <div class="col-12 fz-1d5 fw-600 mb-1 text-center">
                {{ __("Date"); }}:…………
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <table class="invoice-table-a w-100 fz-1d2 m-auto">
                    <tr>
                        <td>
                            <p>{{ __("CUSTOMER ID"); }}: ID на клиента, това ще бъде негови клиентски номер</p>
                            <p>{{ __("Way of payment"); }}: – да се сетва Card или PayPal в зависимост как клиента е платил</p>
                        </td>
                        <td>
                            <p>{{ __("ORDER No"); }}. номер поръчка</p>
                            <p>{{ __("Date order"); }}: дата поръчка</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="fw-600">{{ __("BILLED TO"); }}</p>
                            <p>{{ __("Customer name"); }}: име на клиента</p>
                            <p>{{ __("Customer address"); }}: адрес на клиента</p>
                            <p>{{ __("Customer email"); }}: имейл на клиента</p>
                        </td>
                        <td>
                            <p><span class="fw-600">{{ __("BILLED FROM"); }} - </span> информацията ще се взима от модул "Данни на фирмата"</p>
                            <p>{{ __("Company name"); }}: име на фирмата</p>
                            <p>{{ __("Company address"); }}: адрес на фирмата</p>
                            <p>{{ __("Company email"); }}: имейл на фирмата</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 fz-1d5 fw-600">
                {{ __("ORDER"); }}
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <table class="invoice-table-b w-100 fz-1d2 m-auto">
                    <tr class="fw-600">
                        <td>
                            {{ __("Menu No."); }}
                        </td>
                        <td>
                            {{ __("Menu name"); }}
                        </td>
                        <td>
                            {{ __("Price £"); }}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Item 1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Item 2</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Item 3</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bg-white text-right">{{ __("Cost £"); }}</td>
                        <td class="bg-white fw-600">40,76£</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bg-white text-right">{{ __("Delivery £"); }}</td>
                        <td class="bg-white fw-600">6,00£</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bg-white text-right">{{ __("VAT"); }}</td>
                        <td class="bg-white fw-600">9,35£</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bg-white text-right">{{ __("Total cost £"); }}</td>
                        <td class="bg-white fw-600 fw-600">56,11£</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 brd-b-1c0 fz-1d5 fw-600 text-center">
                {{ __("THANK YOU!"); }}
            </div>
        </div>
        <div class="row mt-3 mb-2">
            <div class="col-6">
                <p class="fw-600 mb-0d2">{{ __("TERMS & CONDITIONS"); }}</p>
                <p>We accept Visa, MasterCard<br>and PayPal payments. All invoices<br>to be paid within 7 days of receipt,<br>a 5% monthly late fee will be added<br>to all overdue balances until paid.</p>
            </div>
            <div class="col-6">
                <p class="fw-600 mb-0d2">{{ __("QUESTIONS"); }}</p>
            </div>
        </div>
        <div class="row mt-3 mb-2">
            <div class="col-12 text-right">
                Page. 1 / 1
            </div>
        </div>
    </div>
@endsection
