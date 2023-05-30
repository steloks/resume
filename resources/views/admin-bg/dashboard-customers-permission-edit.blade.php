@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - permission edit')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>Към всички профили</span>
    </a>
    <h4>Управител кухня</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-1">
    <a href="#" class="btn btn-dark mr-05 mb-1"><i class="bx bx-detail"></i> Детайли</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-globe"></i> Глобални привилегии</a>
    <a href="#" class="btn btn-light mr-05 mb-1"><i class="bx bx-category-alt"></i> Привилегии по модул</a>
  </div>
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <form class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Име профил</label>
              <input type="text" class="form-control" id="id" name="name" value="Управител кухня">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Описание</label>
              <input type="text" class="form-control" id="id" name="name" value="">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
          <fieldset class="form-group">
              <label for="id">Роля</label>
              <select class="form-control" id="id">
                <option selected>Администратор</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
          <fieldset class="form-group">
              <label for="id">Обект</label>
              <select class="form-control" id="id">
                <option selected>Кухня 1</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">запази</button>
            <button type="button" id="2" class="btn btn-light text-uppercase">отмени</button>
          </div>
        </form>
      </div>
    </div>
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