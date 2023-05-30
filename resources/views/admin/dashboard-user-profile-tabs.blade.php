@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','User - profile')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <h4>Marina Mihaylova</h4>
  </div>
</div>
<div class="row">
  <ul class="nav nav-tabs col-12 mb-1 px-1" role="tablist">
    <li class="nav-item">
      <a href="#tab-1" class="btn btn-df-tab mr-05 mb-1 active" id="tab-1-tab" data-toggle="tab" aria-controls="tab-1" role="tab" aria-selected="true"><i class="bx bx-user"></i> Personal data</a>
    </li>
    <li class="nav-item">
      <a href="#tab-2" class="btn btn-df-tab mr-05 mb-1" id="tab-2-tab" data-toggle="tab" aria-controls="tab-2" role="tab" aria-selected="true"><i class="bx bx-sun"></i> Change password</a>
    </li>
  </ul>
  <div class="col-12 mt-1 mb-1">
    <div class="row tab-content">
      <div class="tab-pane active col-12 mb-3" id="tab-1" aria-labelledby="tab-1-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 col-md-8 mb-3">
            <form class="row">
              <div class="col-12 col-md-6 mb-05">
                <fieldset class="form-group">
                  <label for="id">User name</label>
                  <input type="text" class="form-control" id="id" name="name" value="mmihaylova">
                </fieldset>
              </div>
              <div class="col-12 col-md-6 mb-05">
                <fieldset class="form-group">
                  <label for="id">First name</label>
                  <input type="text" class="form-control" id="id" name="name" value="Марина">
                </fieldset>
              </div>
              <div class="col-12 col-md-6 mb-05">
                <fieldset class="form-group">
                  <label for="id">Last name</label>
                  <input type="text" class="form-control" id="id" name="name" value="Михайлова">
                </fieldset>
              </div>
              <div class="col-12 col-md-6 mb-05">
                <fieldset class="form-group">
                  <label for="id">E-mail</label>
                  <input type="text" class="form-control" id="id" name="name" value="mihaylova@sfcbg.com">
                </fieldset>
              </div>
              <div class="col-12 col-md-6 mb-05">
                <fieldset class="form-group">
                  <label for="id">Phone number</label>
                  <input type="text" class="form-control" id="id" name="name" value="0123456789">
                </fieldset>
              </div>
              <div class="col-12 col-md-6 mb-05">
                <fieldset class="form-group">
                  <label for="id">Company name</label>
                  <input type="text" class="form-control" id="id" name="name" value="Ес Еф Си Груп">
                </fieldset>
              </div>
              <div class="col-12 mb-05">
                <fieldset class="form-group w-max-250x">
                  <label for="id">Status</label>
                  <select class="form-control" id="id">
                    <option selected>Active</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-12 mt-1 dtl-mtc">
                <button type="button" id="id" class="btn btn-dark text-uppercase mr-1">Save</button>
                <button type="button" id="id" class="btn btn-light text-uppercase">Cancel</button>
              </div>
            </form>
          </div>
          <div class="col-12 col-md-4 form-group mb-3">
            <div class="row">
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-2" aria-labelledby="tab-2-tab" role="tabpanel">
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
  </div>
</div>
@endsection