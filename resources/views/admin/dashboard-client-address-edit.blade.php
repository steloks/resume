@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Client - address edit')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all clients</span>
    </a>
    <h4>Marina Mihaylova</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-user"></i> Personal data</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-map"></i> Addresses</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-shopping-bag"></i> Orders</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-sun"></i> Pets</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-heart"></i> Favorite menus</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-comment"></i> Comments</a>
  </div>
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <form class="row">
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="1">Post code</label>
              <input type="text" class="form-control" id="1" name="1" value="CM13 1AS">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="s1">Address</label>
              <select class="form-control" id="s1">
                <option>4 The Spinney, Hutton</option>
                <option>4 The Spinney, Hutton</option>
                <option>4 The Spinney, Hutton</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="s2">City</label>
              <select class="form-control" id="s2">
                <option>Brentwood</option>
                <option>Brentwood</option>
                <option>Brentwood</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="s3">Area</label>
              <select class="form-control" id="s3">
                <option>CM13</option>
                <option>CM13</option>
                <option>CM13</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="s4">District</label>
              <select class="form-control" id="s4">
                <option>Hutton Central</option>
                <option>Hutton Central</option>
                <option>Hutton Central</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mt-1 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">Save</button>
          </div>
        </form>
      </div>
      <div class="col-12 col-md-4 form-group">
        <div class="row">
          <div class="col-12"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection