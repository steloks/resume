@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Store - category detail')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all categories</span>
    </a>
    <h4>Categories P01</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-8  mb-3">
        <form class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="1">Prefix</label>
              <input type="text" class="form-control" id="1" name="1" value="P">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="2">Name category</label>
              <input type="text" class="form-control" id="2" name="2" value="Протеин">
            </fieldset>
          </div>
          <div class="col-12 col-md-12 mb-05">
            <fieldset class="form-group">
              <label for="3">Description</label>
              <textarea id="3" name="3" class="form-control" rows="20" cols="7">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
            </fieldset>
          </div>
          <div class="col-12 mt-1 dtl-mtc">
            <button type="button" id="3" class="btn btn-dark text-uppercase">Edit</button>
          </div>
        </form>
      </div>
      <div class="col-12 col-md-4">
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
  </div>
</div>
@endsection