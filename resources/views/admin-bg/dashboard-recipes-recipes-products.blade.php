@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Recipes - recipes products')
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
    <h4>Chicken&liver with brown rice</h4>
    <div>Меню №: 1</div>
  </div>
</div>
<div class="row">
  <ul class="nav nav-tabs col-12 mb-1 px-1" role="tablist">
    <li class="nav-item">
      <a href="#tab-detail" class="btn btn-df-tab mr-05 mb-1 active" id="tab-detail-tab" data-toggle="tab" aria-controls="tab-detail" role="tab" aria-selected="true"><i class="bx bx-detail"></i> Детайли</a>
    </li>
    <li class="nav-item">
      <a href="#tab-products" class="btn btn-df-tab mr-05 mb-1" id="tab-products-tab" data-toggle="tab" aria-controls="tab-products" role="tab" aria-selected="true"><i class="bx bx-dish"></i> Продукти</a>
    </li>
  </ul>
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row tab-content">
      <div class="tab-pane active col-12 mb-3" id="tab-detail" aria-labelledby="tab-detail-tab" role="tabpanel">
        <form id="form1" class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Име меню</label>
              <input type="text" class="form-control" id="id" name="name" value="Chicken&liver with brown rice">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Възраст</label>
              <select class="form-control" id="id">
                <option selected>1м. - 15м.</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 mb-05">
            <fieldset class="form-group">
              <label for="3">Описание</label>
              <textarea id="3" name="3" class="form-control" rows="8" cols="7">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc edit-fe dsp-n">
            <button type="button" id="b1" class="btn btn-dark text-uppercase">запази</button>
            <button type="button" id="b2" class="btn btn-light text-uppercase">отмени</button>
          </div>
        </form>
        <div class="row">
          <div class="col-12 mt-2 dtl-mtc detail-fe">
            <button type="button" id="b3" class="btn btn-dark text-uppercase">редактирай</button>
          </div>
        </div>
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-products" aria-labelledby="tab-products-tab" role="tabpanel">
        <div class="row">
          <div class="col-12 col-md-6 mb-1">
            <h5>Продукти към рецепта</h5>
          </div>
          <div class="col-12 col-md-6 mb-1">
            <button type="button" id="2" class="btn btn-dark text-uppercase">+ добави продукт</button>
          </div>
        </div>
        <form id="form2" class="row">
          <div class="col-12">
            Datatable JS
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="b4" class="btn btn-dark text-uppercase">запази</button>
            <button type="button" id="b5" class="btn btn-light text-uppercase">отмени</button>
          </div>
        </form>
        <div class="row">
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="b63" class="btn btn-dark text-uppercase">редактирай</button>
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
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    $('#form1 :input').prop('disabled', true);
    $("#b1").click(function() {
      // Saved
    });
    $("#b2").click(function() {
      // Cancel - make visible detail elements and disable form
      $('#form1 :input').prop('disabled', true);
      $(".edit-fe").each(function() {
        if(!$(this).hasClass("dsp-n")) {
          $(this).addClass("dsp-n");
        }
      });
      $(".detail-fe").each(function() {
        if($(this).hasClass("dsp-n")) {
          $(this).removeClass("dsp-n");
        }
      });
    });
    $("#b3").click(function() {
      // Go to edit - make visible edit elements and enable form
      $('#form1 :input').prop('disabled', false);
      $(".detail-fe").each(function() {
        if(!$(this).hasClass("dsp-n")) {
          $(this).addClass("dsp-n");
        }
      });
      $(".edit-fe").each(function() {
        if($(this).hasClass("dsp-n")) {
          $(this).removeClass("dsp-n");
        }
      });
    });
  });
</script>
@endsection