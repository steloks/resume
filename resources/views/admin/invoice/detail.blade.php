@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Clients - invoice detail')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-6 mt-1 mb-2">
            <a href="{{route('admin.invoices')}}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all invoices </span>
            </a>
            <h4>Invoice №{{\Illuminate\Support\Str::padLeft($invoice->id,10,0)}}</h4>
        </div>
        <div class="col-12 col-md-6 mt-1 mb-2 dtr-mtc">
            <form method="POST" action="{{route('admin.pdf.invoice',['invoiceId'=>$invoice->id])}}">
                @csrf
                <button type="submit" id="2" class="btn btn-dark text-uppercase mb-1">Download</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-12 col-md-3 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>Invoice №</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{$invoice->id}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>Date of issue</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{parseDate($invoice->created_at)}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>Order №</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {!!  parseEditRoute('orders',$invoice->order->id,$invoice->order->id)!!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>Date order</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{parseDate($invoice->order->created_at)}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>Name client</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {!!  parseEditRoute('clients',$invoice->order->client->id,$invoice->order->name .' '.$invoice->order->last_name)!!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>Phone number</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{$invoice->order->phone}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>E-mail</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{$invoice->order->email}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>Address</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{$invoice->order->user_address}}, {{$invoice->order->user_postcode}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-1">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>Status</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                <span class="badge badge-success">{{$invoice->order->status->name}}</span>
                            </div>
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>{{__('Method of payment')}}</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                <span>{{$invoice->order->payment_type}}</span>
                            </div>
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>{{__('Satus Invoice')}}</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                <span>Sent</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-05 dtr-mtc">
                                    <strong>Created:</strong>
                                </div>
                                <div class="col-12 col-md-6 mb-05 dtl-mtc">
                                    {{parseDate($invoice->created_at)}}
                                </div>
                                <div class="col-12 col-md-6 mb-05 dtr-mtc">
                                    <strong>Created by:</strong>
                                </div>
                                <div class="col-12 col-md-6 mb-05 dtl-mtc">
                                    Website
                                </div>
                                {{--                                <div class="col-12 col-md-6 mb-05 dtr-mtc">--}}
                                {{--                                    <strong>Edited: </strong>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="col-12 col-md-6 mb-05 dtl-mtc">--}}
                                {{--                                    22/10/2021--}}
                                {{--                                </div>--}}
                                {{--                                <div class="col-12 col-md-6 mb-05 dtr-mtc">--}}
                                {{--                                    <strong>Edited by:</strong>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="col-12 col-md-6 mb-05 dtl-mtc">--}}
                                {{--                                    Ivan Ivanov--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1">
            <div>
                <table class="table brd-b-tbl-lgrey w-100">
                    <tbody>
                    <th>№</th>
                    <th>{{__('Menu')}}№</th>
                    <th>{{__('Menu Name')}}</th>
                    <th>{{__('Delivery Date')}}</th>
                    <th>{{__('Pet')}}</th>
                    <th class="ta-dright-mc">{{__('Total Amount')}}</th>
                    </thead>
                    <tbody>
                    @foreach($invoice->order->recipes as $key => $recipe)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$invoice->order->id .'-'.$recipe->id}}</td>
                            <td>{{$recipe->recipe->name}}</td>
                            <td>{{parseDate($recipe->date)}}</td>
                            <td>{{$recipe->pet->name}}</td>
                            <td class="ta-dright-mc">{{number_format($recipe->price, 2, '.', ' ')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div  class="text-right mt-1 pr-2rm">
                <div>{{__('Price') . ' ' . ($invoice->order->total_amount - $invoice->order->vat - $invoice->order->delivery_price)}}</div>
                <div>{{__('Delivery Price'). ' ' . number_format($invoice->order->delivery_price, 2, '.', ' ')}}</div>
                <div>{{__('VAT'). ' ' . number_format($invoice->order->vat, 2, '.', ' ')}}</div>
                <div>{{__('Total Amount'). ' ' . number_format($invoice->order->total_amount, 2, '.', ' ')}}</div>
            </div>
        </div>
    </div>
@endsection
