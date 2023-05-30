@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Cookhouse - Prepare Orders 2')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1">
    <h4>Preparation of orders <span class="text-center bg-secondary white d-inline-block rounded-circle lab-w2d2r">123</span></h4>
    <p>Your orders for: 04.11.2021</p>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1">
    Datatable JS
  </div>
</div>
@endsection