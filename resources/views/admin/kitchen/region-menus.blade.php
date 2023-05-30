@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Cookhouse - Prepare Orders 2')
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
        <div class="col-12 mt-1">
            <h4>Preparation of orders <span
                    class="text-center bg-secondary white d-inline-block rounded-circle lab-w2d2r">{{$count}}</span></h4>
            <p>Your orders for: {{parseDate(getMenusDate())}}</p>
        </div>
    </div>
    <div class="row">
        <div class="dropdown">
            <a href="{{route('admin.kitchen.cooking',['regionId'=>$regionId,'courierId'=>$courierId])}}">
                <button class="btn btn-secondary" type="button" id="dropdownMenuButton1">
                    {{__('Start Cooking')}}
                </button>
            </a>
        </div>
        <div class="col-12 mt-1">
            <table class="table w-100 js-datatable-ajax" id="region-menus"
                   data-datatable_request_url="{{ route('admin.kitchen.region.menus.grid',['regionId'=>$regionId,'courierId'=>$courierId]) }}"
            >
                <thead>
                <tr>
                    <th>{{ __('Order №') }}</th>
                    <th>{{ __('Menus') }}</th>
                    <th>{{ __('Employee') }}</th>
                    <th>{{ __('Object') }}</th>
                    <th>{{ __('City') .'/'. __('Area') .'/'. __('Sub Area') }}</th>
                    <th>{{ __('Timeslot') }}</th>
                    <th>{{ __('Status menu') }}</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>
@endsection

@section('page-scripts')
    @include('admin._partials.datatable')
@endsection
