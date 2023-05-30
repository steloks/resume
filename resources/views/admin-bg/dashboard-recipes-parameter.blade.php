@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Recipes - parameter')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <h4>Параметри рецепти</h4>
  </div>
</div>
<div class="row">
  <ul class="nav nav-tabs col-12 mb-1 px-1" role="tablist">
    <li class="nav-item">
      <a href="#tab-1" class="btn btn-df-tab mr-05 mb-1 active" id="tab-1-tab" data-toggle="tab" aria-controls="tab-1" role="tab" aria-selected="true"><i class="bx bx-slider"></i> Входни параметри</a>
    </li>
    <li class="nav-item">
      <a href="#tab-2" class="btn btn-df-tab mr-05 mb-1" id="tab-2-tab" data-toggle="tab" aria-controls="tab-2" role="tab" aria-selected="true"><i class="bx bx-hive"></i> Хранителни вещества</a>
    </li>
    <li class="nav-item">
      <a href="#tab-3" class="btn btn-df-tab mr-05 mb-1" id="tab-3-tab" data-toggle="tab" aria-controls="tab-3" role="tab" aria-selected="true"><i class="bx bx-pound"></i> Надбавка</a>
    </li>
  </ul>
  <div class="col-12 mt-1 mb-1">
    <div class="row tab-content">
      <div class="tab-pane active col-12 mb-3" id="tab-1" aria-labelledby="tab-1-tab" role="tabpanel">
        <form class="row">
          <div class="col-12 col-lg-6 mb-2">
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                <h5>Породи и процент</h5>
              </div>
              <div class="col-12 col-md-6 mb-1">
                <button type="button" id="button" class="btn btn-dark text-uppercase">+ добави</button>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                Datatable JS
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 mb-2">
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                <h5>Кастрация</h5>
              </div>
              <div class="col-12 col-md-6 mb-1">
                <button type="button" id="button" class="btn btn-dark text-uppercase">+ добави</button>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                Datatable JS
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 mb-2">
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                <h5>Физическо състояние</h5>
              </div>
              <div class="col-12 col-md-6 mb-1">
                <button type="button" id="button" class="btn btn-dark text-uppercase">+ добави</button>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                Datatable JS
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 mb-2">
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                <h5>Активност</h5>
              </div>
              <div class="col-12 col-md-6 mb-1">
                <button type="button" id="button" class="btn btn-dark text-uppercase">+ добави</button>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                Datatable JS
              </div>
            </div>
          </div>
          <div class="col-12 mt-1 dtl-mtc">
            <button type="button" id="b1" class="btn btn-dark text-uppercase mr-1">запази</button>
            <button type="button" id="b2" class="btn btn-light text-uppercase">отмени</button>
          </div>
        </form>
        <div class="row">
          <div class="col-12 mt-2 dtl-mtc detail-fe">
            <button type="button" id="b3" class="btn btn-dark text-uppercase">редактирай</button>
          </div>
        </div>
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-2" aria-labelledby="tab-2-tab" role="tabpanel">
        <form class="row">
          <div class="col-12 mb-2">
            <div class="row">
              <div class="col-12 col-lg-4 mb-1">
                <fieldset class="form-group">
                  <label for="id">Добавка</label>
                  <input type="text" class="form-control" id="id" name="name" value="Яйце">
                </fieldset>
              </div>
              <div class="col-12 col-lg-4 mb-1">
                <fieldset class="form-group">
                  <label for="id">Грамаж</label>
                  <input type="text" class="form-control" id="id" name="name" value="20гр.">
                </fieldset>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 mb-2">
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                <h5>Възраст: 1м. - 15м.</h5>
              </div>
              <div class="col-12 col-md-6 mb-1">
                <button type="button" id="button" class="btn btn-dark text-uppercase">+ добави</button>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                Datatable JS
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 mb-2">
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                <h5>Възраст: 15м. - 7г.</h5>
              </div>
              <div class="col-12 col-md-6 mb-1">
                <button type="button" id="button" class="btn btn-dark text-uppercase">+ добави</button>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                Datatable JS
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4 mb-2">
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                <h5>Възраст: Над 7 г.</h5>
              </div>
              <div class="col-12 col-md-6 mb-1">
                <button type="button" id="button" class="btn btn-dark text-uppercase">+ добави</button>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-6 mb-1">
                Datatable JS
              </div>
            </div>
          </div>
          <div class="col-12 mt-1 dtl-mtc">
            <button type="button" id="b1" class="btn btn-dark text-uppercase mr-1">запази</button>
            <button type="button" id="b2" class="btn btn-light text-uppercase">отмени</button>
          </div>
        </form>
        <div class="row">
          <div class="col-12 mt-2 dtl-mtc detail-fe">
            <button type="button" id="b3" class="btn btn-dark text-uppercase">редактирай</button>
          </div>
        </div>
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-3" aria-labelledby="tab-3-tab" role="tabpanel">
      <form class="row">
          <div class="col-12 mb-1">
            <div class="row">
              <div class="col-12 col-lg-4 mb-1">
                <fieldset class="form-group">
                  <label for="id">Добавка %</label>
                  <input type="text" class="form-control" id="id" name="name" value="150%">
                </fieldset>
              </div>
              <div class="col-12 col-lg-4 mb-1">
                <fieldset class="form-group">
                  <label for="id">Твърда надбавка</label>
                  <input type="text" class="form-control" id="id" name="name" value="6 GBP">
                </fieldset>
              </div>
            </div>
          </div>
          <div class="col-12 mt-1 dtl-mtc">
            <button type="button" id="b1" class="btn btn-dark text-uppercase mr-1">запази</button>
            <button type="button" id="b2" class="btn btn-light text-uppercase">отмени</button>
          </div>
        </form>
        <div class="row">
          <div class="col-12 mt-2 dtl-mtc detail-fe">
            <button type="button" id="b3" class="btn btn-dark text-uppercase">редактирай</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection