@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Order')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
@endsection
@section('content')
    <div class="w-100 bg-white">
        <div class="container-fluid bg-c4-0d1 mb-3r">
            <div class="row">
                <div class="col-12 text-center my-3r">
                    <div id="" class="container mb-1r order-steps-banner dd-b-md-n">
                        <img
                            src="{{ asset('images/order/step' . ((!empty(session('orderStep'))) ?
                                ((empty(session('orders')) &&  in_array(session('orderStep'), ['3', '4'])) ? 1 : (session('orderStep') == 2 ? 2 : (empty(session('orders')) ? 2 : session('orderStep'))))
                                : 1) . '.svg') }}"
                             class="img-fluid d-block m-auto w-82p img-dynamic-order-step"
                             alt="Order steps" data-img-order-step="{{ session('orderStep') }}"
                             data-dog-id-step="{{ !empty(session('orderStepDogId')) ? session('orderStepDogId') : '' }}"
                             data-address-id-step="{{ !empty(session('orderStepAddressId')) ? session('orderStepAddressId') : '' }}"
                             data-cart-empty="{{ ((empty(session('orders')) &&  in_array(session('orderStep'), ['3', '4'])) ? '' : 1) }}"
                        >
                    </div>
                    <ul class="nav nav-pills nav-fill nav-justified container p-0 mb-3" role="tablist">
                        <li class="nav-item">
                            <button class="order-tab-label active" id="pills-order-tab-1" data-bs-toggle="pill"
                                    data-bs-target="#pills-order-step-1" type="button" role="tab"
                                    aria-controls="pills-order-step-1" aria-selected="true">Order details
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="order-tab-label" id="pills-order-tab-2" data-bs-toggle="pill"
                                    data-bs-target="#pills-order-step-2" type="button" role="tab"
                                    aria-controls="pills-order-step-2" aria-selected="false" aria-disabled="true"
                            {{ !empty(session('orderStep')) ? '' :  'disabled'  }}>Menu selection
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="order-tab-label" id="pills-order-tab-3" data-bs-toggle="pill"
                                    data-bs-target="#pills-order-step-3" type="button" role="tab"
                                    aria-controls="pills-order-step-3" aria-selected="false">Order summary
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="order-tab-label" id="pills-order-tab-4" data-bs-toggle="pill"
                                    data-bs-target="#pills-order-step-4" type="button" role="tab" {{ !empty(session('orders')) ? '' : 'disabled' }}
                                    aria-controls="pills-order-step-4" aria-selected="false">Payment
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('order.store') }}" class="row" method="POST">
                @csrf
                <div class="col-12 tab-content">
                    <div class="tab-pane fade show active" id="pills-order-step-1" role="tabpanel"
                         aria-labelledby="pills-order-step-1-tab">
                        @include('front.user-order.order-step-1')
                    </div>
                    <div class="tab-pane fade" id="pills-order-step-2" role="tabpane2"
                         aria-labelledby="pills-order-step-2-tab">
                        @include('front.user-order.order-step-2-menu')
                    </div>
                    <div class="tab-pane fade" id="pills-order-step-3" role="tabpane3"
                         aria-labelledby="pills-order-step-3-tab">
{{--                        @include('front.user-order.order-step-2-cart')--}}
                    </div>
                    <div class="tab-pane fade" id="pills-order-step-4" role="tabpane4"
                         aria-labelledby="pills-order-step-4-tab">
                        @include('front.user-order.order-step-3')
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('panels.modals.go-to-cart-modal')
    @include('panels.modals.submit-payment-button')
    @include('panels.modals.choose-dog-or-address-modal')
    @include('panels.modals.successfully-removed-item-from-cart-modal')
    @include('panels.modals.added-menu-to-favourite-modal')
    @include('panels.modals.removed-from-menu-favourite-modal')
@stop

@section('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID', '') }}&currency=GBP&disable-funding=card"></script>
    <script type="text/javascript">
        $( '.flatpickr' ).flatpickr({
            noCalendar: true,
            enableTime: true,
            dateFormat: 'h:i K'
        });
    </script>
@endsection
