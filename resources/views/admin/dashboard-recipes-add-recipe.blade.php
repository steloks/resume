@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Recipes - add recipe')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>Към всички рецепти</span>
    </a>
    <h4>Новa рецепта</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-8 mt-1 mb-1">
    <form id="form1" class="row">
      <div class="col-12 col-md-6 mb-05">
        <fieldset class="form-group">
          <label for="id">Име меню</label>
          <input type="text" class="form-control" id="id" name="name">
        </fieldset>
      </div>
      <div class="col-12 col-md-6 mb-05">
        <fieldset class="form-group">
          <label for="id">Възраст</label>
          <select class="form-control" id="id">
            <option>Изберете възраст</option>
          </select>
        </fieldset>
      </div>
      <div class="col-12 mb-05">
        <fieldset class="form-group">
          <label for="3">Описание</label>
          <textarea id="3" name="3" class="form-control" rows="8" cols="7">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
        </fieldset>
      </div>
      <div class="col-12 mt-3 mb-05">
        <div class="row">
          <div class="col-12 col-md-6 mb-1">
            <h5>Продукти към рецепта</h5>
          </div>
          <div class="col-12 col-md-6 mb-1">
            <button type="button" id="2" class="btn btn-dark text-uppercase">+ добави продукт</button>
          </div>
          <div class="col-12">
            Datatable JS
          </div>
        </div>
      </div>
      <div class="col-12 mt-3 dtl-mtc">
        <button type="button" id="2" class="btn btn-dark text-uppercase">запази</button>
        <button type="button" id="2" class="btn btn-light text-uppercase">отмени</button>
      </div>
    </form>
  </div>
  <div class="col-12 col-md-4 mt-1 mb-1">
    <div class="row">
    </div>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    //$('#form1 :input').prop('disabled', true);
  });
</script>
@endsection