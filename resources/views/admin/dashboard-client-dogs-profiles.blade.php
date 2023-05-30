@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Client - dogs profiles')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <h4>Pets profile</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    Datatable JS
  </div>
</div>
@endsection