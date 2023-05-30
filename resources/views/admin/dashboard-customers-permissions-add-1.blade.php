@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - permissions add 1')
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
    <h4>New profile</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <form class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Profile name</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Description</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
          <fieldset class="form-group">
              <label for="id">Role *</label>
              <select class="form-control" id="id">
                <option selected>Select role</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
          <fieldset class="form-group">
              <label for="id">Object *</label>
              <select class="form-control" id="id">
                <option selected>Select object</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">Next</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 mt-1 mb-1">
    <div class="row">
    </div>
  </div>
</div>
@endsection