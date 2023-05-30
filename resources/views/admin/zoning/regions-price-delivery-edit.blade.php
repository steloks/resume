@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Regions - price delivery add')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="#" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all delivery price</span>
            </a>
            <h4>CM13</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-12 col-md-8  mb-3">
                    <form class="row" method="POST" action="{{route('admin.zoning.regions.delivery.price.edit')}}">
                        @csrf
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">City</label>
                            <fieldset class="form-group">
                                <input type="text" disabled name="city_name" value="{{$area->city->name}}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">Area</label>
                            <fieldset class="form-group">
                                <input type="text" disabled name="area_name" value="{{$area->name}}">
                            </fieldset>
                        </div>
                        <input type="hidden" name="area_id" value='{{$area->id}}'>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <fieldset class="form-group">
                                <label for="name">Delivery price</label>
                                <input type="text" class="form-control" id="name" name="delivery_price"
                                       value="{{$area->delivery_price}}" placeholder="£">
                            </fieldset>
                        </div>
                        {{--                        <div class="col-12 col-md-4 col-lg-3 mb-05">--}}
                        {{--                            <label for="name">Status</label>--}}
                        {{--                            <fieldset class="form-group">--}}
                        {{--                                <select class="form-control" name="name" id="name">--}}
                        {{--                                    <option class="bg-clr-lgreen" value="" selected>Active</option>--}}
                        {{--                                    <option class="bg-clr-lred" value="">Inactive</option>--}}
                        {{--                                </select>--}}
                        {{--                            </fieldset>--}}
                        {{--                        </div>--}}
                        <div class="col-12 mt-1 dtl-mtc">
                            <button type="submit" id="button" class="btn btn-dark text-uppercase mb-1">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-4">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('admin.modals.dashboard-modal-store-nomenclature-add')
