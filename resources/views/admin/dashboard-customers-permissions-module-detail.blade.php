@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - permissions module detail')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all profiles</span>
    </a>
    <h4>Kitchen manager</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-detail"></i> Details</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-globe"></i> Global Privileges</a>
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-category-alt"></i> Privileges by modules</a>
  </div>
  <div class="col-12 col-lg-6 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mt-1 mb-1">
        <h5>Set global Privileges all modules</h5>
      </div>
      <div class="col-12 mt-1 mb-1">
        Datatable.js
      </div>
      <div class="col-12 mt-1 mb-1 clr-red1 fw-600">
        + all other modules + notifications
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-6 mt-1 mb-1">
    <div class="row">
    </div>
  </div>
</div>
@endsection