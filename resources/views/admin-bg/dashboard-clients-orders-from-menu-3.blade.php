@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Clients - orders from menu')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 col-md-6 mt-1">
    <h4>Menus orders</h4>
  </div>
  <div class="col-12 col-md-6 mt-1 dtr-mtc">
    <button type="button" id="2" class="btn btn-dark text-uppercase mb-1">Export (.xls)</button>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1">
    Datatable JS
    <div class="row">
      <div class="col-12 mt-1">
        -- Datatable JS
      </div>
    </div>
    <div class="row">
      <div class="col-12 mt-1">
        -- Datatable JS
      </div>
    </div>
    <div class="row">
      <div class="col-12 mt-1">
        -- Datatable JS
      </div>
    </div>
  </div>
</div>
@endsection