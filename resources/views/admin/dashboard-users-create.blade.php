@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customer - create')
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
    <h4>New user</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-user"></i> Personal data</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-map"></i> Objects</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-sun"></i> Roles</a>
  </div>
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <form class="row">
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">User name</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">First name</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">Last name</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">Password <a href="#" class="text-lowercase">Generate</a></label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">E-mail</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">Phone number</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">Company name</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group w-max-250x">
              <label for="id">Status</label>
              <select class="form-control" id="id">
                <option selected>Active</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection