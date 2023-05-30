@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','User - create')
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
  <ul class="nav nav-tabs col-12 mb-1 px-1" role="tablist">
    <li class="nav-item">
      <a href="#tab-1" class="btn btn-df-tab mr-05 mb-1 active" id="tab-1-tab" data-toggle="tab" aria-controls="tab-1" role="tab" aria-selected="true"><i class="bx bx-user"></i> Personal data</a>
    </li>
    <li class="nav-item">
      <a href="#tab-2" class="btn btn-df-tab mr-05 mb-1" id="tab-2-tab" data-toggle="tab" aria-controls="tab-2" role="tab" aria-selected="true"><i class="bx bx-map"></i> Objects</a>
    </li>
    <li class="nav-item">
      <a href="#tab-3" class="btn btn-df-tab mr-05 mb-1" id="tab-3-tab" data-toggle="tab" aria-controls="tab-3" role="tab" aria-selected="true"><i class="bx bx-sun"></i> Roles</a>
    </li>
  </ul>
  <div class="col-12 mt-1 mb-1">
    <div class="row tab-content">
      <div class="tab-pane active col-12 mb-3" id="tab-1" aria-labelledby="tab-1-tab" role="tabpanel">
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
                  <label for="id">Password <a href="#" class="ml-1">Generate</a></label>
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
              <div class="col-12 mt-1 dtl-mtc">
                <button type="button" id="2" class="btn btn-dark text-uppercase">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-2" aria-labelledby="tab-2-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 mb-1">
            <div class="row">
              <div class="col-12 col-md-5">
                <button type="button" id="2" class="btn btn-dark text-uppercase">+ Add objects</button>
              </div>
            </div>
          </div>
          <div class="col-12 mt-1 mb-1">
            <div class="row">
              <div class="col-12 col-md-5 mb-3">
                <form class="row">
                  <div class="col-12 mb-05">
                    Datatable JS
                  </div>
                  <div class="col-12 mt-2 dtl-mtc">
                    <button type="button" id="2" class="btn btn-dark text-uppercase">Save</button>
                  </div>
                </form>
              </div>
              <div class="col-12 col-md-7">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-3" aria-labelledby="tab-3-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 mb-1">
            <div class="row">
              <div class="col-12 col-md-5">
                <button type="button" id="2" class="btn btn-dark text-uppercase">+ Add roles</button>
              </div>
            </div>
          </div>
          <div class="col-12 mt-1 mb-1">
            <div class="row">
              <div class="col-12 col-md-5 mb-3">
                <form class="row">
                  <div class="col-12 mb-05">
                    Datatable JS
                  </div>
                  <div class="col-12 mt-2 dtl-mtc">
                    <button type="button" id="2" class="btn btn-dark text-uppercase">Save</button>
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
  </div>
</div>
@endsection