@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - object region edit')
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
    <h4>Обект 1</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-detail"></i> Детайли</a>
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-map"></i> Райони</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-shopping-bag"></i> Продукти</a>
  </div>
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <form class="row">
          <div class="col-12 mt-2">
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
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">запази</button>
            <button type="button" id="2" class="btn btn-light text-uppercase">отмени</button>
          </div>
      </div>
    </div>
    </form>
  </div>
  <div class="col-12 col-md-4 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Създадено на:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        14/10/2021
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Създадено от:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        Администратор
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Редактирано на:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        22/10/2021
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Редактирано от:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        Иван Иванов
      </div>
    </div>
  </div>
</div>
@endsection