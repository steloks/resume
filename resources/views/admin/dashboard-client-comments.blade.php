@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Client - comments')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i><span class="ml-05">To all clients</span>
    </a>
    <h4>Marina Mihaylova</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-user"></i> Personal data</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-map"></i> Addresses</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-shopping-bag"></i> Orders</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-sun"></i> Pets</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-heart"></i> Favorite menus</a>
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-comment"></i> Comments</a>
  </div>
  <div class="col-12 mt-1 mb-1">
    Datatable JS
  </div>
</div>
@endsection