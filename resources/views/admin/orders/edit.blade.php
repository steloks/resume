@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Clients - order edit')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors\css\vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors\css\tables\datatable\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors\css\tables\datatable\responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{ route('admin.orders.index') }}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all orders</span>
            </a>
            <h4>Order №{{ $order->id }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-12 mb-3">
                    <form class="row mb-2" action="{{ route('admin.orders.update', ['id'=> $order->id]) }}"
                          method="POST">
                        @csrf
                        <div class="col-12 col-md-3 col-lg-2 mb-05">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>Number</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                {{ $order->id }}
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 mb-05">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>Date order</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                {{ parseDate($order->created_at) }}
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 mb-05">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>Client</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                {!! parseEditRoute('clients', $order->client->id, $order->client->name . ' ' . $order->client->last_name) !!}
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 mb-05">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>Invoice</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                <a href="#">1234567</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 mb-05">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>Object</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                @if(!empty($order->postcodeRelation))
                                    {{ optional($order->postcodeRelation->area->objects->first())->name }}
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 mb-05">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>Status order</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                {{ $order->status->name }}
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 mb-05">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>Area</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                @if(!empty($order->postcodeRelation))
                                    {{ $order->postcodeRelation->area->name }}
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 mb-05">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>District</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                @if(!empty($order->postcodeRelation))
                                    {{ optional($order->postcodeRelation->subArea)->name }}
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 mb-05">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>PC Address</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                <fieldset class="form-group">
                                    <select class="form-control" id="select" name="user_postcode">
                                        @foreach($order->client->addresses as $address)
                                            <option
                                                {{ ($address->postcode == $order->user_postcode) ? 'selected' : '' }} value="{{ $address->postcode }}">{{ $address->postcode }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 mb-05">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>Address</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                <fieldset class="form-group">
                                    <select class="form-control" id="select" name="user_address">
                                        @foreach($order->client->addresses as $address)
                                            <option
                                                {{ ($address->address == $order->user_address) ? 'selected' : '' }} value="{{ $address->address }}">{{ $address->address }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-lg-2 mb-05">
                            <div class="mb-0d5 dtl-mtc text-uppercase">
                                <strong>Phone number</strong>
                            </div>
                            <div class="mb-1 dtl-mtc">
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           value="{{ old('phone', $order->phone ?? '') }}">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-12 mt-1 mb-1">
                            <h5>Order Summary</h5>
                        </div>
                        <div class="col-12 mt-1 mb-1">
                            <div class="row">
                                <div class="col-12 mt-1">
                                    <div class="dataTables_scroll">
                                        <table class="table w-100 js-datatable-ajax" id="order_products"
                                               data-datatable_request_url="{{ route('admin.orders.gridDataAdminOrderProducts', ['id'=>$order->id]) }}"
                                        >
                                            <thead>
                                            <tr>
                                                <th>{{ __('Order №') }}</th>
                                                <th>{{ __('Menu name') }}</th>
                                                <th>{{ __('Grams') }}</th>
                                                <th>{{ __('Pet') }}</th>
                                                <th>{{ __('Delivery date') }}</th>
                                                <th>{{ __('Timeslot') }}</th>
                                                <th>{{ __('Menu status') }}</th>
                                                <th>{{ __('Kitchen staff') }}</th>
                                                <th>{{ __('Courier') }}</th>
                                                <th>{{ __('Total') }}</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-6 col-md-6 dtr-mtc">
                                    <strong>Price:</strong>
                                </div>
                                <div class="col-6 col-md-6 dtl-mtc mb-05">
                                    {!! parsePrice($order->recipes()->sum('price')) !!}
                                </div>
                                <div class="col-6 col-md-6 dtr-mtc">
                                    <strong>Delivery price:</strong>
                                </div>
                                <div class="col-6 col-md-6 dtl-mtc mb-05">
                                    {!! parsePrice($order->delivery_price) !!}
                                </div>
                                <div class="col-6 col-md-6 dtr-mtc">
                                    <strong>VAT:</strong>
                                </div>
                                <div class="col-6 col-md-6 dtl-mtc mb-05">
                                    {!! parsePrice($order->vat) !!}
                                </div>
                                <div class="col-6 col-md-6 dtr-mtc">
                                    <strong>Total price:</strong>
                                </div>
                                <div class="col-6 col-md-6 dtl-mtc mb-05">
                                    {!! parsePrice($order->total_amount) !!}
                                </div>
                            </div>
                        </div>
                        @if(checkAccess('Orders','create_edit'))
                            <div class="col-12 mt-1 dtl-mtc">
                                <button type="button" class="btn btn-dark text-uppercase edit-df-js">Edit</button>
                                <button type="submit" class="btn btn-dark text-uppercase d-none save-df-js">Save
                                </button>
                                <button type="button" class="btn btn-dark text-uppercase d-none cancel-df-js">Cancel
                                </button>
                            </div>
                        @endif
                    </form>
                    @foreach($order->recipes as $orderRecipe)
                    <div class="row mt-1">
                            <div class="col-12 mt-1 mb-0d5">
                                <h5 class="d-inline-block pr-1">Track your order for menu</h5>
                                <span>{{ parseDate($orderRecipe->date)  }}</span>
                            </div>
                            <div class="col-12 mb-1">
                                {{ $order->id . '-0' . $orderRecipe->id }}
                            </div>
                            <div class="col-12 mt-1">
                                <div class="row">
                                    @foreach($statuses as $status)
                                        <div class="col-12 col-md-2 mb-1 text-center">
                                            <div
                                                class="badge {{ !empty($orderRecipesHistory->where('type', '<>', 'payment')->where('order_recipe_id', $orderRecipe->id)->firstWhere('status_id', $status->id)) ? 'badge-dark' : 'badge-lgrey' }} crl-40x mb-1">{!! $loop->iteration !!}</div>
                                            <div>
                                                <strong>{{ $status->name }}</strong></div>
                                            @if(!empty($orderRecipesHistory->where('order_recipe_id', $orderRecipe->id)->firstWhere('status_id', $status->id)))
                                                {{ $orderRecipesHistory->where('order_recipe_id', $orderRecipe->id)->firstWhere('status_id', $status->id)->created_at }}
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-12 col-md-8 mb-1 mt-3">
                            <h5 class="mb-0d5">{{ __('Comment ') }}</h5>
                            <div class="dtl-mtc">
                                {{ $order->comment ?? '' }}
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-1 mt-3">
                            <div class="row">
                                <div class="col-12 col-md-6 dtr-mtc">
                                    <strong>Created:</strong>
                                </div>
                                <div class="col-12 col-md-6 dtl-mtc mb-05">
                                    {{ parseDate($order->created_at) }}
                                </div>
                                <div class="col-12 col-md-6 dtr-mtc">
                                    <strong>Created by:</strong>
                                </div>
                                <div class="col-12 col-md-6 dtl-mtc mb-05">
                                    {{ $order->created_by ?? 'Website' }}
                                </div>
                                <div class="col-12 col-md-6 dtr-mtc">
                                    <strong>Edited:</strong>
                                </div>
                                <div class="col-12 col-md-6 dtl-mtc mb-05">
                                    {{ parseDate($order->updated_at) }}
                                </div>
                                <div class="col-12 col-md-6 dtr-mtc">
                                    <strong>Edited by:</strong>
                                </div>
                                <div class="col-12 col-md-6 dtl-mtc mb-05">
                                    {{ $order->updated_by }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    @include('admin._partials.datatable')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.edit-df-js', function () {
                $(this).addClass('d-none')
                $(this).parent().find('.save-df-js').removeClass('d-none')
                $(this).parent().find('.cancel-df-js').removeClass('d-none')
                $(this).parents('.row').find('.edit-js-details').addClass('d-none')
            })

            $(document).on('click', '.cancel-df-js', function () {
                $(this).parent().find('.save-df-js').addClass('d-none')
                $(this).parent().find('.cancel-df-js').addClass('d-none')
                $(this).parent().find('.edit-df-js').removeClass('d-none')
                $(this).parents('.row').find('.edit-js-details').removeClass('d-none')
            })

            setTimeout(function () {
                let element = $('.js-order-product-delivery-date');
                flatpickr(element, {
                    altInput: false,
                    static: true,
                    clickOpens: true,
                    theme: 'airbnb',
                    locale: {
                        "firstDayOfWeek": 1 // start week on Monday
                    },
                    dateFormat: "d-m-Y",
                });
            }, 3000);

            $(document).on('click', '.js-order-product-delivery-date', function () {
                $(this).parents('.dataTables_scrollBody').css('overflow', '')
            })

        })
    </script>
@endsection
