@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - object')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all objects</span>
    </a>
    <h4>Object 1</h4>
  </div>
</div>
<div class="row">
  <ul class="nav nav-tabs col-12 mb-1 px-1" role="tablist">
    <li class="nav-item">
      <a href="#tab-1" class="btn btn-df-tab mr-05 mb-1 active" id="tab-1-tab" data-toggle="tab" aria-controls="tab-1" role="tab" aria-selected="true"><i class="bx bx-detail"></i> Details</a>
    </li>
    <li class="nav-item">
      <a href="#tab-2" class="btn btn-df-tab mr-05 mb-1" id="tab-2-tab" data-toggle="tab" aria-controls="tab-2" role="tab" aria-selected="true"><i class="bx bx-map"></i> Areas</a>
    </li>
    <li class="nav-item">
      <a href="#tab-3" class="btn btn-df-tab mr-05 mb-1" id="tab-3-tab" data-toggle="tab" aria-controls="tab-3" role="tab" aria-selected="true"><i class="bx bx-shopping-bag"></i> Products</a>
    </li>
  </ul>
  <div class="col-12 mt-1 mb-1">
    <div class="row tab-content">
      <div class="tab-pane active col-12 mb-3" id="tab-1" aria-labelledby="tab-1-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 col-md-8 mt-1 mb-1">
            <div class="row">
              <div class="col-12">
                <form class="row">
                  <div class="col-12 col-md-6 mb-05">
                    <fieldset class="form-group">
                      <label for="id">Name *</label>
                      <input type="text" class="form-control" id="id" name="name" value="Кухня 1">
                    </fieldset>
                  </div>
                  <div class="col-12 col-md-6 mb-05">
                    <fieldset class="form-group">
                      <label for="id">Number of menus for day *</label>
                      <input type="text" class="form-control" id="id" name="name" value="111">
                    </fieldset>
                  </div>
                  <div class="col-12 col-md-6 mb-05">
                    <fieldset class="form-group">
                      <label for="id">Prefix *</label>
                      <select class="form-control" id="id">
                        <option selected>01</option>
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-12 col-md-6 mb-05">
                    <fieldset class="form-group">
                      <label for="id">City *</label>
                      <select class="form-control" id="id">
                        <option selected>Brentwood</option>
                      </select>
                    </fieldset>
                  </div>
                  <div class="col-12 mb-05">
                    <fieldset class="form-group">
                      <label for="id">Description</label>
                      <textarea class="form-control" id="id" rows="6"></textarea>
                    </fieldset>
                  </div>
                  <div class="col-12 mt-2 dtl-mtc edit-block">
                    <button type="button" id="2" class="btn btn-dark text-uppercase mr-1">Save</button>
                    <button type="button" id="2" class="btn btn-light text-uppercase">Cancel</button>
                  </div>
                </form>
              </div>
              <div class="col-12 mt-2 dtl-mtc detail-block">
                <button type="button" id="2" class="btn btn-dark text-uppercase">Edit</button>
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
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-2" aria-labelledby="tab-2-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 col-md-8 mt-1 mb-1">
            <div class="row">
              <div class="col-12">
                <form class="row">
                  <div class="col-12 mt-2">
                    <div class="row">
                      <div class="col-12 col-md-6 mb-1 dtl-mtc">
                        <h5>Areas</h5>
                      </div>
                      <div class="col-12 col-md-6 mb-1 dtl-mtc">
                        <button type="button" id="id" class="btn btn-dark text-uppercase">+ Add area</button>
                      </div>
                      <div class="col-12 col-md-6 mb-1">
                        Datatable JS
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-2 dtl-mtc edit-block">
                    <button type="button" id="2" class="btn btn-dark text-uppercase">Save</button>
                    <button type="button" id="2" class="btn btn-light text-uppercase">Cancel</button>
                  </div>
                </form>
              </div>
              <div class="col-12 mt-1 dtl-mtc detail-block">
                <button type="button" id="2" class="btn btn-dark text-uppercase">Edit</button>
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
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-3" aria-labelledby="tab-3-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 mb-1">
            Datatable JS
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection