@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customer - change password')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all users</span>
    </a>
    <h4>User: mmihaylova</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-user"></i>Personal data</a>
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-sun"></i>Change password</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-map"></i> Objects</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-sun"></i> Roles</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-key"></i> Profile Privileges</a>
  </div>
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-5 mb-3">
        <form class="row">
          <div class="col-12 mb-05">
            <fieldset class="form-group">
              <label for="id">Current password</label>
              <input type="password" class="form-control" id="id" name="name" value="123456789">
            </fieldset>
          </div>
          <div class="col-12 mb-05">
            <fieldset class="form-group">
              <label for="id">New password</label>
              <input type="password" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 mb-05">
            <fieldset class="form-group">
              <label for="id">Repeat the new password</label>
              <input type="password" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">Save</button>
            <button type="button" id="2" class="btn btn-light text-uppercase">Cancel</button>
          </div>
        </form>
      </div>
      <div class="col-12 col-md-7">
      </div>
    </div>
  </div>
</div>
@endsection