@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - permission edit')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all profiles</span>
    </a>
    <h4>Kitchen manager</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-detail"></i> Details</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-globe"></i> Global Privileges</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-category-alt"></i> Privileges by modules</a>
  </div>
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <form class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Profile name</label>
              <input type="text" class="form-control" id="id" name="name" value="Управител кухня">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Description</label>
              <input type="text" class="form-control" id="id" name="name" value="">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
          <fieldset class="form-group">
              <label for="id">Role</label>
              <select class="form-control" id="id">
                <option selected>Administrator</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
          <fieldset class="form-group">
              <label for="id">Object</label>
              <select class="form-control" id="id">
                <option selected>Kitchen 1</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">Save</button>
            <button type="button" id="2" class="btn btn-light text-uppercase">Cancel</button>
          </div>
        </form>
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