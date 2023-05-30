@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Store - products in objects edit')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 col-md-7 mt-1 mb-3">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all products object</span>
    </a>
    <h4>Chicken</h4>
    <div>
      Code: C01-P01
    </div>
  </div>
  <div class="col-12 col-md-5 mt-1 mb-3">
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
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <form class="row">
      <div class="col-12 mb-1">
        <div class="row">
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Name product</label>
              <select class="form-control" id="id">
                <option selected>Chicken</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Unit</label>
              <select class="form-control" id="id">
                <option selected>gram</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Category</label>
              <select class="form-control" id="id">
                <option selected>Proteins</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Kcal/100gr.</label>
              <input type="text" class="form-control" id="id" name="name" value="200">
            </fieldset>
          </div>
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Object:</label>
              <select class="form-control" id="id">
                <option selected>Kitchen 1</option>
              </select>
            </fieldset>
          </div>
        </div>
      </div>
      <div class="col-12 mb-1">
        <div class="row">
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Delivery price (1000 gr. / 1 num.)</label>
              <input type="text" class="form-control" id="id" name="name" value="£5,00">
            </fieldset>
          </div>
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Sale price (1000 gr. / 1 num.)</label>
              <input type="text" class="form-control" id="id" name="name" value="£6,00">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Description</label>
              <input type="text" class="form-control" id="id" name="name" value="Chicken meat from free - range chickens">
            </fieldset>
          </div>
        </div>
      </div>
      <div class="col-12 mt-2">
        <div class="row">
          <div class="col-12 col-md-6 mb-1 dtl-mtc">
            <h5>Product batches</h5>
          </div>
          <div class="col-12 col-md-6 mb-1 dtr-mtc">
            <button type="button" id="id" class="btn btn-dark text-uppercase">+ Add batch</button>
          </div>
          <div class="col-12 col-md-6 mb-1">
            Datatable JS
          </div>
        </div>
      </div>
      <div class="col-12 mt-2 mb-2 dtl-mtc">
        <button type="button" id="id" class="btn btn-dark text-uppercase">Save</button>
        <button type="button" id="id" class="btn btn-light text-uppercase">Cancel</button>
      </div>
    </form>
  </div>
</div>
@endsection