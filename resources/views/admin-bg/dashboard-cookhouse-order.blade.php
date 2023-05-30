@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Cookhouse - Order')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row max-680x-c">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To the Kitchen</span>
    </a>
    <h4>Order №121434</h4>
  </div>
</div>
<form class="row max-680x-c">
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12">
        <p>Menu №121434-01</p>
      </div>
      <div class="col-12 col-md-8 mb-1">
        <strong>Chicken & liver with brown rice</strong>
      </div>
      <div class="col-12 col-md-4 form-group mb-1">
        <fieldset>
          <div class="checkbox">
            <input type="checkbox" class="checkbox-input" id="c1">
            <label for="c1" class="text-uppercase">Приготвено</label>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
  <div class="col-12 mb-3">
    Datatable JS
  </div>
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12">
        <p>Menu №121434-02</p>
      </div>
      <div class="col-12 col-md-8 mb-1">
        <strong>Beef & lamb with pasta</strong>
      </div>
      <div class="col-12 col-md-4 form-group mb-1">
        <fieldset>
          <div class="checkbox">
            <input type="checkbox" class="checkbox-input" id="c2">
            <label for="c2" class="text-uppercase">Prepared</label>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
  <div class="col-12 mb-3">
    Datatable JS
  </div>
  <div class="col-12 text-center mt-1 mb-1">
    <button type="button" class="btn btn-dark text-uppercase shadow">Mark as completed</button>
  </div>
</form>
@endsection