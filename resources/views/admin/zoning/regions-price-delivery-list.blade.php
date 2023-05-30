@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Regions - price delivery list')
{{-- vendor style --}}
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 col-md-7 mt-1">
    <h4>Delivery price</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1">
    Datatable JS
  </div>
</div>
@endsection
