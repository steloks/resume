@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customer - objects detail')
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
    <h4>Потребител mmihaylova</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-user"></i> Лични данни</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-sun"></i> Смяна на парола</a>
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-map"></i> Обекти</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-sun"></i> Роли</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-key"></i> Права за достъп</a>
  </div>
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-5 mb-3">
        <div class="row">
          <div class="col-12 mb-05">
            Datatable JS
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">редактирай</button>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-7">
      </div>
    </div>
  </div>
</div>
@endsection