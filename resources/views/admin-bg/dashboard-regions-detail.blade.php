@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Regions - detail')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all areas</span>
    </a>
    <h4>СМ13</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-8  mb-3">
        <form class="row">
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <label for="name">City</label>
            <fieldset class="form-group">
              <select class="form-control" name="name" id="name">
                <option value="">Brentwood</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <fieldset class="form-group">
              <label for="name">Area</label>
              <input type="text" class="form-control" id="name" name="name" value="СМ13">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <label for="name">Object</label>
            <fieldset class="form-group">
              <select class="form-control" name="name" id="name">
                <option value="">Kitchen 1</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <label for="name">Status</label>
            <fieldset class="form-group">
              <select class="form-control" name="name" id="name">
                <option class="bg-clr-lgreen" value="" selected>Active</option>
                <option class="bg-clr-lred" value="">Inactive</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mb-05">
            <fieldset class="form-group">
              <label for="name">Description</label>
              <input type="text" class="form-control" id="name" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-12 mb-05">
            <h5>District</h5>
          </div>
          <div class="col-12 col-md-12 mb-05">
            Datatable JS
          </div>
          <div class="col-12 mt-1 dtl-mtc">
            <button type="button" id="button" class="btn btn-dark text-uppercase mb-1">Save</button>
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
@include('admin.modals.dashboard-modal-store-nomenclature-add')