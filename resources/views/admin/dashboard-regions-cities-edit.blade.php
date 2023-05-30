@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Regions - cities edit')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all cities</span>
    </a>
    <h4>Brentwood</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-8  mb-3">
        <form class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="Brentwood">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="name">Description</label>
              <input type="text" class="form-control" id="name" name="name" value="Lorem ipsum dolor sit amet, consectetu">
            </fieldset>
          </div>
          <div class="col-12 mb-1">
            <div class="row">
              <div class="col-12 col-md-7 mb-1">
                <h5>Areas and districts</h5>
              </div>
              <div class="col-12 col-md-5 mt-1 dtr-mtc">
                <button type="button" id="name" class="btn btn-dark text-uppercase">+ Add areas</button>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 mb-05">
            Datatable JS
          </div>
          <div class="col-12 mt-1 dtl-mtc">
            <button type="button" id="name" class="btn btn-dark text-uppercase">Edit</button>
            <button type="button" id="name" class="btn btn-light text-uppercase">Cancel</button>
          </div>
        </form>
      </div>
      <div class="col-12 col-md-4">
      </div>
    </div>
  </div>
</div>
@endsection