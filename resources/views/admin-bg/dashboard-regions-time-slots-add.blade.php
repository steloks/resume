@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Regions - time slots add')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all time slots</span>
    </a>
    <h4>New time slot</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-8  mb-3">
        <form class="row">
        <div class="col-12 col-md-4 col-lg-3 mb-05">
            <fieldset class="form-group">
              <label for="name">Start time</label>
              <input type="text" class="form-control" id="name" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <fieldset class="form-group">
              <label for="name">End time</label>
              <input type="text" class="form-control" id="name" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <label for="name">Sity</label>
            <fieldset class="form-group">
              <select class="form-control" name="name" id="name">
                <option value="">Select city</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <label for="name">Area</label>
            <fieldset class="form-group">
              <select class="form-control" name="name" id="name">
                <option value="">Select area</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mb-05">
            <fieldset class="form-group">
              <label for="name">Description</label>
              <input type="text" class="form-control" id="name" name="name">
            </fieldset>
          </div>
          <div class="col-12 mt-1 dtl-mtc">
            <button type="button" id="button" class="btn btn-dark text-uppercase mb-1">Save</button>
          </div>
        </form>
      </div>
      <div class="col-12 col-md-4">
        <div class="row">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@include('admin.modals.dashboard-modal-store-nomenclature-add')