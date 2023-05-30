@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - permissions add 1')
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
    <h4>Нов профил за достъп</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <form class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Име профил</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Описание</label>
              <input type="text" class="form-control" id="id" name="name">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
          <fieldset class="form-group">
              <label for="id">Роля *</label>
              <select class="form-control" id="id">
                <option selected>Изберете роля</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
          <fieldset class="form-group">
              <label for="id">Обект *</label>
              <select class="form-control" id="id">
                <option selected>Изберете обект</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">Продължи</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 mt-1 mb-1">
    <div class="row">
    </div>
  </div>
</div>
@endsection