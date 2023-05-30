@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Client - personal data edit')
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
      <div class="col-12 col-md-8 mb-3">
        <form class="row">
          <div class="col-12 col-md-6">
            <fieldset class="form-group">
              <label for="1">Firts name</label>
              <input type="text" class="form-control" id="1" name="1" value="Марина">
            </fieldset>
          </div>
          <div class="col-12 col-md-6">
            <fieldset class="form-group">
              <label for="2">Last name</label>
              <input type="text" class="form-control" id="2" name="2" value="Михайлова">
            </fieldset>
          </div>
          <div class="col-12 col-md-6">
            <fieldset class="form-group">
              <label for="3">E-mail</label>
              <input type="text" class="form-control" id="3" name="3" value="mihaylova@sfcbg.com">
            </fieldset>
          </div>
          <div class="col-12 col-md-6">
            <fieldset class="form-group">
              <label for="4">Phone number</label>
              <input type="text" class="form-control" id="4" name="4" value="0812 345 678">
            </fieldset>
          </div>
          <div class="col-12 mt-1 dtl-mtc">
            <button type="button" id="5" class="btn btn-dark text-uppercase">Save</button>
            <button type="button" id="6" class="btn btn-light text-uppercase">Cancel</button>
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