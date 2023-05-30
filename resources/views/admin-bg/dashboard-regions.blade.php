@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Regions')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 col-md-7 mt-1">
    <h4>Areas</h4>
  </div>
  <div class="col-12 col-md-5 mt-1 dtr-mtc">
    <button type="button" id="name" class="btn btn-light text-uppercase">Import</button>
    <button type="button" id="name" class="btn btn-dark text-uppercase">Add</button>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1">
    Datatable JS
  </div>
</div>
@endsection