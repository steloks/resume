@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - others detail')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <h4>Други настройки</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-1">
        <h5>Данни на фирмата</h5>
      </div>
      <div class="col-12 mb-1">
        <div class="row">
          <div class="col-12 col-md-6 mb-05">
            <label for="name">Валута</label>
            <fieldset class="form-group">
              <select class="form-control" name="name" id="name">
                <option value="">GBP</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <label for="name">Часова зона</label>
            <fieldset class="form-group">
              <select class="form-control" name="name" id="name">
                <option value="">UTC+02:00, Sofia, Moscow</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <label for="name">Формат дата</label>
            <fieldset class="form-group">
              <select class="form-control" name="name" id="name">
                <option value="">DD/MM/YY</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <label for="name">Мерна единица</label>
            <fieldset class="form-group">
              <select class="form-control" name="name" id="name">
                <option value="">Грама</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">Редактирай</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 mt-1 mb-1">
    <div class="row">
    </div>
  </div>
</div>
@endsection