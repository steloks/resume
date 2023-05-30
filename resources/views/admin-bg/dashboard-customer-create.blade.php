@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customer - create')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>Към всички потребители</span>
    </a>
    <h4>Нов потребител</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-user"></i> Лични данни</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-map"></i> Обекти</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-sun"></i> Роли</a>
  </div>
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <form class="row">
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">Потребителско име</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">Име</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">Фамилия</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">Парола <a href="#" class="text-lowercase">Генерирай</a></label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">Имейл</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">Телефонен номер</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group">
              <label for="id">Наименование на фирма</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-4 mb-05">
            <fieldset class="form-group w-max-250x">
              <label for="id">Статус</label>
              <select class="form-control" id="id">
                <option selected>Активен</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">запази</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection