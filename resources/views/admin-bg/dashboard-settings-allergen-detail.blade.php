@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - allergen edit')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>Към всички алергени</span>
    </a>
    <h4>Яйце</h4>
    <div>ID: 1</div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-1">
        <div class="row">
          <div class="col-12 col-md-6 mb-05">
            <label for="name">Избор номенклатура</label>
            <fieldset class="form-group">
              <select class="form-control" name="name" id="name">
                <option value="">Яйце</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Описание</label>
              <input type="text" class="form-control" id="id" name="name" value="Описание на описанието">
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">редактирай</button>
          </div>
        </div>
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