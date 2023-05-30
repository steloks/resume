@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Store - products in objects detail')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 col-md-7 mt-1 mb-3">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>Към всички Продукти в обекти</span>
    </a>
    <h4>Пилешко месо</h4>
    <div>
      Код: C01-P01
    </div>
  </div>
  <div class="col-12 col-md-5 mt-1 mb-3">
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
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-1">
        <div class="row">
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Име</label>
              <select class="form-control" id="id">
                <option selected>Пилешко месо</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Мярка</label>
              <select class="form-control" id="id">
                <option selected>Грама</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Категория</label>
              <select class="form-control" id="id">
                <option selected>Протеин</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Ккал./100 гр.</label>
              <input type="text" class="form-control" id="id" name="name" value="200">
            </fieldset>
          </div>
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Обект</label>
              <select class="form-control" id="id">
                <option selected>Кухня 1</option>
              </select>
            </fieldset>
          </div>
        </div>
      </div>
      <div class="col-12 mb-1">
        <div class="row">
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Ед. доставна цена (за 1000гр)</label>
              <input type="text" class="form-control" id="id" name="name" value="£5,00">
            </fieldset>
          </div>
          <div class="col-12 col-md-2 mb-05">
            <fieldset class="form-group">
              <label for="id">Ед. продажна цена (за 1000гр)</label>
              <input type="text" class="form-control" id="id" name="name" value="£6,00">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Описание</label>
              <input type="text" class="form-control" id="id" name="name" value="Пилешко месо от свободно отглеждани кокошки">
            </fieldset>
          </div>
        </div>
      </div>
      <div class="col-12 mt-2">
        <div class="row">
          <div class="col-12 mb-1 dtl-mtc">
            <h5>Партиди на продукта</h5>
          </div>
          <div class="col-12 col-md-6 mb-1">
            Datatable JS
          </div>
        </div>
      </div>
      <div class="col-12 mt-2 mb-2 dtl-mtc">
        <button type="button" id="id" class="btn btn-dark text-uppercase">редактирай</button>
      </div>
    </div>
  </div>
</div>
@endsection