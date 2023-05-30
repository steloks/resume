@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Store - nomenclature edit')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all Nomenclatures</span>
    </a>
    <h4>Chicken</h4>
    <div>Code: P01</div>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-8  mb-3">
        <form class="row">
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <fieldset class="form-group">
              <label for="1">Name</label>
              <input type="text" class="form-control" id="1" name="1" value="Пилешко месо">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <fieldset class="form-group">
              <label for="2">Kcal/100gr.</label>
              <input type="text" class="form-control" id="2" name="2" value="200">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <label for="3">Category</label>
            <fieldset class="form-group">
              <select class="form-control" name="3" id="3">
                <option value="">Protein</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <label for="4">Unit</label>
            <fieldset class="form-group">
              <select class="form-control" name="4" id="4">
                <option value="">Gram</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <label for="5">Expiration date</label>
            <fieldset class="form-group">
              <select class="form-control" name="5" id="5">
                <option value="">3 days</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <fieldset class="form-group">
              <label for="6">Delivery price (1000 gr. / 1 num.)</label>
              <input type="text" class="form-control" id="6" name="6" value="£5,00">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 col-lg-3 mb-05">
            <fieldset class="form-group">
              <label for="7">Sale price (1000 gr. / 1 num.)</label>
              <input type="text" class="form-control" id="7" name="7" value="£6,00">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 col-lg-9 mb-05">
            <fieldset class="form-group">
              <label for="8">Description</label>
              <input type="text" class="form-control" id="8" name="8" value="Пилешко филе от свободно отглеждани пилета">
            </fieldset>
          </div>
          <div class="col-12 mt-1 dtl-mtc">
            <button type="button" id="9" class="btn btn-dark text-uppercase mb-1">Save</button>
            <button type="button" id="10" class="btn btn-light text-uppercase mb-1">Cancel</button>
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