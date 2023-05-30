@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Store - category new')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all categories</span>
    </a>
    <h4>New category</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <form class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="1">Prefix</label>
              <input type="text" class="form-control" id="1" name="1">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="2">Name category</label>
              <input type="text" class="form-control" id="2" name="2">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="3">Description</label>
              <textarea id="3" name="3"  class="form-control" rows="20" cols="7"></textarea>
            </fieldset>
          </div>
          <div class="col-12 mt-1 dtl-mtc">
            <button type="button" id="3" class="btn btn-dark text-uppercase">Save</button>
          </div>
        </form>
      </div>
      <div class="col-12 col-md-4 form-group">
        <div class="row">
          <div class="col-12"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection