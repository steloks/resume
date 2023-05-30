@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Store nomenclature')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 col-md-6 mt-1">
    <h4>Nomenclatures</h4>
  </div>
  <div class="col-12 col-md-6 mt-1 dtr-mtc">
    <button type="button" id="1" class="btn btn-light text-uppercase mb-1">Add products to objects</button>
    <button type="button" id="2" class="btn btn-dark text-uppercase mb-1">Add</button>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1">
    Datatable JS
  </div>
</div>
@endsection