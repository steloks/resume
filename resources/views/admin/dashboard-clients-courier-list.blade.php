@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Clients - courier list')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 col-md-6 mt-1">
    <h4>Couriers</h4>
    <div class="mb-1">Delivery orders of 04.11.2021</div>
  </div>
  <div class="col-12 col-md-6 mt-1 dtr-mtc">
    <button type="button" id="2" class="btn btn-success text-uppercase mb-1" data-toggle="modal" data-target="#dashboard-modal-clients-orders-courier">Добави куриер</button>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1">
    Datatable JS
  </div>
</div>
@include('admin.modals.dashboard-modal-clients-orders-courier')
@endsection