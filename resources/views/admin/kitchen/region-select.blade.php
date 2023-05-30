@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Cookhouse - Prepare Orders 1')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1">
            <h4>Preparation of orders</h4>
            <p>Your orders for: {{parseDate(getMenusDate())}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center mt-1 mb-1">
            <h4>Select an area and courier to view orders</h4>
            <p>Select an area and courier from the drop-down menus to view the relevant orders and start preparing
                them</p>
        </div>
    </div>
    <form class="row max-680x-c" method="POST" action="{{route('admin.kitchen.region')}}">
        @csrf
        <div class="col-12 col-md-6 mb-1">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Area:</span>
                </div>
                <select class="form-control" id="areaId" name="areaId">
                    @foreach($areas as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                    @endforeach
                </select>
                @error('regionId')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="col-12 col-md-6 mb-1">
            <div class="input-group courier-holder">
                @if(isset($couriers))
                    @include('admin.kitchen.courier-select')
                @endif
            </div>
            @error('courierId')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 text-center mt-1 mb-1">
            <button type="submit" class="btn btn-dark text-uppercase shadow">Next</button>
        </div>
    </form>
@endsection

@section('page-scripts')
    <script>
        function couriers() {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: "{{route("admin.kitchen.couriers.by.area")}}",
                data: {
                    'areaId': $('#areaId').val(),
                    "_token": "{{ csrf_token() }}"
                },
                beforeSend: function () {
                },
                success: function (response) {
                    $('.courier-holder').html(response.view);
                },
                error: function (data) {
                },
                complete: function () {
                }
            });
        }

        $(document).ready(function () {
            couriers();
            $(document).on('change', '#areaId', function (e) {
                couriers();
            })
        })
    </script>
@endsection
