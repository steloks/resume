@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - permissions add 2')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>Към всички профили</span>
    </a>
    <h4>Привилегии</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 col-lg-6 mt-1 mb-1">
    <form class="row">
      <div class="col-12 mb-3">
        <div class="row">
          <div class="col-12 mt-1 mb-1">
            <h5>Задайте глобални привилегии за достъп до всички модули</h5>
          </div>
          <div class="col-12 mb-05">
            <fieldset>
              <div class="checkbox checkbox-shadow">
                <input type="checkbox" id="1">
                <label for="1">
                  <strong>Виж всички</strong><br>
                  Позволява преглед на цялата информация в модулите
                </label>
              </div>
            </fieldset>
            <hr>
          </div>
          <div class="col-12 mb-05">
            <fieldset>
              <div class="checkbox checkbox-shadow">
                <input type="checkbox" id="2">
                <label for="2">
                  <strong>Редактирай всички</strong><br>
                  Позволява редакция на цялата информация в модулите 
                </label>
              </div>
            </fieldset>
            <hr>
          </div>
          <div class="col-12 mb-05">
            <fieldset>
              <div class="checkbox checkbox-shadow">
                <input type="checkbox" id="3">
                <label for="3">
                  <strong>Изтрий всички</strong><br>
                  Позволява изтриване на цялата информация в модулите
                </label>
              </div>
            </fieldset>
            <hr>
          </div>
          <div class="col-12 mt-1 mb-1">
            <h5>Задайте привилегии за достъп за всеки модул</h5>
          </div>
          <div class="col-12 mt-1 mb-1">
            Datatable.js
          </div>
          <div class="col-12 mt-1 mb-1 clr-red1 fw-600">
            + всички останали модули + известия
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">запази</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="col-12 col-lg-6 mt-1 mb-1">
    <div class="row">
    </div>
  </div>
</div>
@endsection