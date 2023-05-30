@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Cookhouse - Prepare Orders 1')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1">
    <h4>Preparation of orders</h4>
    <p>Your orders for: 04.11.2021</p>
  </div>
</div>
<div class="row">
  <div class="col-12 text-center mt-1 mb-1">
    <h4>Select an area and courier to view orders</h4>
    <p>Select an area and courier from the drop-down menus to view the relevant orders and start preparing them</p>
  </div>
</div>
<form class="row max-680x-c">
  <div class="col-12 col-md-6 mb-1">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Area:</span>
      </div>
      <select class="form-control" id="s1">
        <option>CM13</option>
        <option>CM13</option>
        <option>CM13</option>
      </select>
    </div>
  </div>
  <div class="col-12 col-md-6 mb-1">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Courier:</span>
      </div>
      <select class="form-control" id="s2">
        <option>Ivan Ivanov</option>
        <option>Ivan Ivanov</option>
        <option>Ivan Ivanov</option>
      </select>
    </div>
  </div>
  <div class="col-12 text-center mt-1 mb-1">
    <button type="button" class="btn btn-dark text-uppercase shadow">Next</button>
  </div>
</form>
@endsection