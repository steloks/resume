@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - role add')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>Към всички роли</span>
    </a>
    <h4>Нова роля</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <form class="row">
      <div class="col-12 col-xl-6 mb-3">
        <div class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Име</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Статус</label>
              <select class="form-control" id="id">
                <option selected>Активен</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mb-05">
            <fieldset class="form-group">
              <label for="id">Описание</label>
              <textarea class="form-control" id="id" rows="6"></textarea>
            </fieldset>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-6">
        <div class="row">
        </div>
      </div>
      <div class="col-12 col-xl-6">
        <div class="row">
          <div class="col-12 col-md-6 mb-1 dtl-mtc">
            <h5>Потребители</h5>
          </div>
          <div class="col-12 col-md-6 mb-1 dtr-mtc">
            <button type="button" id="id" class="btn btn-dark text-uppercase">+ добави потребител</button>
          </div>
          <div class="col-12 col-md-6 mb-1">
            Datatable JS
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-6"></div>
      <div class="col-12 mt-2 mb-2 dtl-mtc">
        <button type="button" id="id" class="btn btn-dark text-uppercase">запази</button>
      </div>
    </form>
  </div>
</div>
@endsection