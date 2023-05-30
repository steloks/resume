@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - role detail')
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
    <h4>Администратор</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-6 mb-3">
        <div class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Име</label>
              <input type="text" class="form-control" id="id" name="name" value="Администратор">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Статус</label>
              <input type="text" class="form-control bg-success" id="id" name="name" value="Активен">
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
      <div class="col-12 col-md-6 mb-3">
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
      <div class="col-12 col-md-6 mt-2">
        <div class="row">
          <div class="col-12 col-md-6 mb-1 dtl-mtc">
            <h5>Потребители</h5>
          </div>
          <div class="col-12 col-md-6 mb-1 dtr-mtc">
          </div>
          <div class="col-12 col-md-6 mb-1">
            Datatable JS
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6"></div>
      <div class="col-12 mt-2 mb-2 dtl-mtc">
        <button type="button" id="id" class="btn btn-dark text-uppercase">редактирай</button>
      </div>
</div>
  </div>
</div>
@endsection