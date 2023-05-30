@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Client - personal data')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors\css\vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors\css\tables\datatable\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors\css\tables\datatable\responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{ route('admin.clients.index') }}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all clients</span>
            </a>
            <h4></h4>
        </div>
    </div>

    <ul class="nav nav-tabs" id="clientTab" role="tablist">
        <li class="nav-item">
            <a class="active btn btn-df-tab mr-05 mb-1" id="personal-data-tab" data-toggle="tab"
               href="#personal_data" role="tab" aria-controls="home" aria-selected="true">
                <i class="bx bx-user"></i> Personal data
            </a>
        </li>
        <li class="nav-item">
            <a class="btn btn-df-tab mr-05 mb-1" id="address-tab" data-toggle="tab" href="#addresses" role="tab"
               aria-controls="profile" aria-selected="false">
                <i class="bx bx-map"></i> Addresses
            </a>
        </li>
        <li class="nav-item">
            <a id="order-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="contact" aria-selected="false"
               class="btn btn-df-tab mr-05 mb-1">
                <i class="bx bx-shopping-bag"></i> Orders
            </a>
        </li>
        <li class="nav-item">
            <a id="pet-tab" data-toggle="tab" href="#pets" role="tab" aria-controls="contact" aria-selected="false"
               class="btn btn-df-tab mr-05 mb-1">
                <i class="bx bx-sun"></i> Pets
            </a>
        </li>
        <li class="nav-item">
            <a id="favourite-menu-tab" data-toggle="tab" href="#favourite_menus" role="tab" aria-controls="contact"
               aria-selected="false" class="btn btn-df-tab mr-05 mb-1">
                <i class="bx bx-heart"></i> Favorite menus
            </a>
        </li>
        <li class="nav-item">
            <a id="comment-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="contact"
               aria-selected="false" class="btn btn-df-tab mr-05 mb-1">
                <i class="bx bx-comment"></i> Comments
            </a>
        </li>
    </ul>
    <div class="tab-content" id="clientTabContent">
        <div class="tab-pane fade show active" id="personal_data" role="tabpanel" aria-labelledby="personal-data-tab">
            <div class="col-12 mt-1 mb-1">
                <div class="row">
                    <div class="col-12 col-md-8 mb-3">
                        <form action="{{ route('admin.clients.personalData', ['id' => $client->id]) }}" class="row"
                              method="POST">
                            @csrf
                            <div class="col-12 col-md-6">
                                <fieldset class="form-group">
                                    <label for="1">Firts name</label>
                                    <input type="text" class="form-control" id="1" name="name"
                                           value="{{ old('name', $client->name ?? '') }}">
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-6">
                                <fieldset class="form-group">
                                    <label for="2">Last name</label>
                                    <input type="text" class="form-control" id="2" name="last_name"
                                           value="{{ old('last_name', $client->last_name ?? '') }}">
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-6">
                                <fieldset class="form-group">
                                    <label for="3">E-mail</label>
                                    <input type="text" class="form-control" id="3" name="email"
                                           value="{{ old('email', $client->email ?? '') }}">
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-6">
                                <fieldset class="form-group">
                                    <label for="4">Phone number</label>
                                    <input type="text" class="form-control" id="4" name="phone"
                                           value="{{ old('phone', $client->phone ?? '') }}">
                                </fieldset>
                            </div>
                            <div class="col-12 mt-1 dtl-mtc">
                                <button type="button" class="btn btn-dark text-uppercase edit-df-js">Edit</button>
                                <button type="submit" class="btn btn-dark text-uppercase d-none save-df-js">Save
                                </button>
                                <button type="button" class="btn btn-dark text-uppercase d-none cancel-df-js">Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-4 form-group mb-3 edit-js-details">
                        <div class="row">
                            <div class="col-12 col-md-6 dtr-mtc">
                                <strong>Created:</strong>
                            </div>
                            <div class="col-12 col-md-6 dtl-mtc mb-05">
                                {{ parseDate($client->created_at) }}
                            </div>
                            <div class="col-12 col-md-6 dtr-mtc">
                                <strong>Created by:</strong>
                            </div>
                            <div class="col-12 col-md-6 dtl-mtc mb-05">
                                {{ $client->created_by ?? __('Website') }}
                            </div>
                            <div class="col-12 col-md-6 dtr-mtc">
                                <strong>Edited:</strong>
                            </div>
                            <div class="col-12 col-md-6 dtl-mtc mb-05">
                                {{ parseDate($client->updated_at) }}
                            </div>
                            <div class="col-12 col-md-6 dtr-mtc">
                                <strong>Edited by:</strong>
                            </div>
                            <div class="col-12 col-md-6 dtl-mtc mb-05">
                                {{ $client->updated_by }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="addresses" role="tabpanel" aria-labelledby="address-tab">
            <div class="row">
                <div class="col-12 mt-1 mb-1">
                    <div class="dataTables_scroll">
                        <table class="table w-100 js-datatable-ajax" id="client_addresses"
                               data-datatable_request_url="{{ route('admin.clients.gridDataClientsAddresses', ['id' => $client->id]) }}"
                        >
                            <thead>
                            <tr>
                                <th>{{ __('Number') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Postcode') }}</th>
                                <th>{{ __('Area') }}</th>
                                <th>{{ __('City') }}</th>
                                <th>{{ __('District') }}</th>
                                <th>{{ __('Address') }}</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
                <div class="col-12 col-md-4 form-group mb-3">
                    <div class="row">
                        <div class="col-12 col-md-6 dtr-mtc">
                            <strong>Created:</strong>
                        </div>
                        <div class="col-12 col-md-6 dtl-mtc mb-05">
                            {{ parseDate($client->created_at) }}
                        </div>
                        <div class="col-12 col-md-6 dtr-mtc">
                            <strong>Created by:</strong>
                        </div>
                        <div class="col-12 col-md-6 dtl-mtc mb-05">
                            {{ $client->created_by }}
                        </div>
                        <div class="col-12 col-md-6 dtr-mtc">
                            <strong>Edited:</strong>
                        </div>
                        <div class="col-12 col-md-6 dtl-mtc mb-05">
                            {{ parseDate($client->updated_at) }}
                        </div>
                        <div class="col-12 col-md-6 dtr-mtc">
                            <strong>Edited by:</strong>
                        </div>
                        <div class="col-12 col-md-6 dtl-mtc mb-05">
                            {{ $client->updated_by }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="order-tab">
            <div class="row">
                <div class="col-12 mt-1 mb-1">
                    <div class="dataTables_scroll">
                        <table class="table w-100 js-datatable-ajax" id="client_orders"
                               data-datatable_request_url="{{ route('admin.clients.gridDataClientsOrders', ['id' => $client->id]) }}"
                        >
                            <thead>
                            <tr>
                                <th>{{ __('Number') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Address') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Invoice') }}</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pets" role="tabpanel" aria-labelledby="pet-tab">
            <div class="row">
                <div class="col-12 mt-1 mb-1">
                    <div class="dataTables_scroll">
                        <table class="table w-100 js-datatable-ajax" id="client_pets"
                               data-datatable_request_url="{{ route('admin.clients.gridDataClientsPets', ['id' => $client->id]) }}"
                        >
                            <thead>
                            <tr>
                                <th>{{ __('Id') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Breed') }}</th>
                                <th>{{ __('Age') }}</th>
                                <th>{{ __('Gender') }}</th>
                                <th>{{ __('Owner') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Status') }}</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="favourite_menus" role="tabpanel" aria-labelledby="favourite-menu-tab">
            <div class="row">
                <div class="col-12 mt-1">
                    <div class="dataTables_scroll">
                        <table class="table w-100 js-datatable-ajax" id="client_favourite_menus"
                               data-datatable_request_url="{{ route('admin.clients.gridDataFavouriteMenus', ['id' => $client->id]) }}">
                            <thead>
                            <tr>
                                <th>{{ __('Number') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Content') }}</th>
                                <th>{{ __('Client') }}</th>
                                <th>{{ __('Pet') }}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comment-tab">
            <div class="row">
                <div class="col-12 mt-1 mb-1">
                    <div class="row">
                        <div class="col-12 mt-1 mb-1">
                            <div class="dataTables_scroll">
                                <table class="table w-100 js-datatable-ajax" id="client_comments"
                                       data-datatable_request_url="{{ route('admin.clients.gridDataClientsOrderComments', ['id' => $client->id]) }}"
                                >
                                    <thead>
                                    <tr>
                                        <th>{{ __('Order #') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Comment') }}</th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

