@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - object region')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all objects</span>
    </a>
    <h4>Object 1</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-detail"></i> Details</a>
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-map"></i> Areas</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-shopping-bag"></i> Products</a>
  </div>
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <div class="row">
          <div class="col-12 mt-2">
            <div class="row">
              <div class="col-12 col-md-6 mb-1 dtl-mtc">
                <h5>Areas</h5>
              </div>
              <div class="col-12 col-md-6 mb-1 dtr-mtc">
                <button type="button" id="id" class="btn btn-dark text-uppercase">+ Add area</button>
              </div>
              <div class="col-12 col-md-6 mb-1">
                Datatable JS
              </div>
            </div>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">Edit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Created:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        14/10/2021
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Created by:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        Administrator
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Edited:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        22/10/2021
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Edited by:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        Ivan Ivanov
      </div>
    </div>
  </div>
</div>
@endsection