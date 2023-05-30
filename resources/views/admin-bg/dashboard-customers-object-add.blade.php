@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - object add')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>Към всички обекти</span>
    </a>
    <h4>Нов обект</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-user"></i> Лични данни</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-map"></i> Обекти</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-sun"></i> Роли</a>
  </div>
  <div class="col-12 mt-1 mb-1">
    <form class="row">
      <div class="col-12 col-md-6 mb-3">
        <div class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Име *</label>
              <input type="text" class="form-control" id="id" name="name" value="Кухня 1">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Брой менюта за ден *</label>
              <input type="text" class="form-control" id="id" name="name" value="111">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Префикс *</label>
              <select class="form-control" id="id">
                <option selected>01</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Град *</label>
              <select class="form-control" id="id">
                <option selected>Brentwood</option>
              </select>
            </fieldset>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 mb-3">
        <fieldset class="form-group">
          <label for="id">Описание</label>
          <textarea class="form-control" id="id" rows="6"></textarea>
        </fieldset>
      </div>
      <div class="col-12 col-md-6 mt-2">
        <div class="row">
          <div class="col-12 col-md-6 mb-1 dtl-mtc">
            <h5>Райони</h5>
          </div>
          <div class="col-12 col-md-6 mb-1 dtr-mtc">
            <button type="button" id="id" class="btn btn-dark text-uppercase">+ добави райони</button>
          </div>
          <div class="col-12 col-md-6 mb-1">
            Datatable JS
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6"></div>
      <div class="col-12 mt-2 dtl-mtc">
        <button type="button" id="id" class="btn btn-dark text-uppercase">запази</button>
      </div>
    </form>
  </div>
</div>
@endsection