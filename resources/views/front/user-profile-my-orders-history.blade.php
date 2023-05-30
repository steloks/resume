@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'User - Profile My Orders History')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors\css\vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors\css\tables\datatable\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors\css\tables\datatable\responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="container my-3r">
        <div class="row">
            <div class="col-12 col-lg-3">
                @include('panels.front-user.sidebar-navigation')
            </div>
            <div class="col-12 col-lg-9 mt-3">
              @include('panels.front-user.user-profile-my-orders-history')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin._partials.datatable')

    <script type="text/javascript">
        $(document).ready(function () {
            setTimeout(function () {
                $('#client_orders_wrapper').find('.dataTables_scrollBody').css('max-height', '1000px')
            }, 2500)
        });
    </script>
@endsection
