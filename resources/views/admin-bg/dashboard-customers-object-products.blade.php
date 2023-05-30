@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - object products')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>Към всички обекти</span>
    </a>
    <h4>Обект 1</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-detail"></i> Детайли</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-map"></i> Райони</a>
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-shopping-bag"></i> Продукти</a>
  </div>
  <div class="col-12 mt-1 mb-1">
    Datatable JS
  </div>
</div>
@endsection