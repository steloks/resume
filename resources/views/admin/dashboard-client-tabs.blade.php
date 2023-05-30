@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Client')
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
  <ul class="nav nav-tabs col-12 mb-1 px-1" role="tablist">
    <li class="nav-item">
      <a href="#tab-1" class="btn btn-df-tab mr-05 mb-1 active" id="tab-1-tab" data-toggle="tab" aria-controls="tab-1" role="tab" aria-selected="true"><i class="bx bx-user"></i> Personal data</a>
    </li>
    <li class="nav-item">
      <a href="#tab-2" class="btn btn-df-tab mr-05 mb-1" id="tab-2-tab" data-toggle="tab" aria-controls="tab-2" role="tab" aria-selected="true"><i class="bx bx-map"></i> Addresses</a>
    </li>
    <li class="nav-item">
      <a href="#tab-3" class="btn btn-df-tab mr-05 mb-1" id="tab-3-tab" data-toggle="tab" aria-controls="tab-3" role="tab" aria-selected="true"><i class="bx bx-shopping-bag"></i> Orders</a>
    </li>
    <li class="nav-item">
      <a href="#tab-4" class="btn btn-df-tab mr-05 mb-1" id="tab-4-tab" data-toggle="tab" aria-controls="tab-41" role="tab" aria-selected="true"><i class="bx bx-sun"></i> Pets</a>
    </li>
    <li class="nav-item">
      <a href="#tab-5" class="btn btn-df-tab mr-05 mb-1" id="tab-5-tab" data-toggle="tab" aria-controls="tab-5" role="tab" aria-selected="true"><i class="bx bx-heart"></i> Favorite menus</a>
    </li>
    <li class="nav-item">
      <a href="#tab-6" class="btn btn-df-tab mr-05 mb-1" id="tab-6-tab" data-toggle="tab" aria-controls="tab-6" role="tab" aria-selected="true"><i class="bx bx-comment"></i> Comments</a>
    </li>
  </ul>
  <div class="col-12 mt-1 mb-1">
    <div class="row tab-content">
      <div class="tab-pane active col-12 mb-3" id="tab-1" aria-labelledby="tab-1-tab" role="tabpanel">
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
              <div class="col-12 mt-1 dtl-mtc edit-block">
                <button type="button" id="id" class="btn btn-dark text-uppercase mr-1">Save</button>
                <button type="button" id="id" class="btn btn-light text-uppercase">Cancel</button>
              </div>
            </form>
            <div class="row detail-block">
              <div class="col-12 mt-1 dtl-mtc">
                <button type="button" id="id" class="btn btn-dark text-uppercase">Edit</button>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 form-group mb-3 detail-block">
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
                Website
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
      <div class="tab-pane col-12 mb-3" id="tab-2" aria-labelledby="tab-2-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 mb-3 edit-block">
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
                <button type="button" id="id" class="btn btn-dark text-uppercase mr-1">Save</button>
              </div>
            </form>
          </div>
          <div class="col-12 mb-3 detail-block">
            <div class="row">
              Datatable JS
            </div>
          </div>
          <div class="col-12 col-md-4 mb-3 detail-block">
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
                Website
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
      <div class="tab-pane col-12 mb-3" id="tab-3" aria-labelledby="tab-3-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 mb-3">
            <div class="row">
              Datatable JS
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-4" aria-labelledby="tab-4-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 mb-3">
            <div class="row">
              Datatable JS
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-5" aria-labelledby="tab-5-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 mb-3">
            <div class="row">
              Datatable JS
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-6" aria-labelledby="tab-6-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 mb-3">
            <div class="row">
              Datatable JS
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection