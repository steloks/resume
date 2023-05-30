@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Recipe - calculated')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>Към всички калкулирани рецепти</span>
    </a>
    <h4>Chicken&liver with brown rice</h4>
    <div>Меню №: 12345-01</div>
  </div>
</div>
<div class="row mt-1">
  <ul class="nav nav-tabs col-12 mb-1 px-1" role="tablist">
    <li class="nav-item">
      <a href="#tab-1" class="btn btn-df-tab mr-05 mb-1 active" id="tab-1-tab" data-toggle="tab" aria-controls="tab-1" role="tab" aria-selected="true"><i class="bx bx-shopping-bag"></i> Поръчка и рецепта</a>
    </li>
    <li class="nav-item">
      <a href="#tab-2" class="btn btn-df-tab mr-05 mb-1" id="tab-2-tab" data-toggle="tab" aria-controls="tab-2" role="tab" aria-selected="true"><i class="bx bx-sun"></i> Профил на кучето</a>
    </li>
    <li class="nav-item">
      <a href="#tab-3" class="btn btn-df-tab mr-05 mb-1" id="tab-3-tab" data-toggle="tab" aria-controls="tab-3" role="tab" aria-selected="true"><i class="bx bx-calculator"></i> Калкулиране на меню</a>
    </li>
  </ul>
  <div class="col-12 mt-1 mb-1">
    <div class="row tab-content">
      <div class="tab-pane active col-12 mb-3" id="tab-1" aria-labelledby="tab-1-tab" role="tabpanel">
        <div class="row mb-2">
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Меню №</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  12345-01
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Име меню</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  Chicken & liver with brown rice
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Дата доставка</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  24/10/2021
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Грамаж</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  391гр
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>цена</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  £8,30
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Поръчка №</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  <a href="#">92813524</a>
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>дата на поръчка</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  22/10/2021
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>клиент</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  <a href="#">Марина Михайлова</a>
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Куче</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  <a href="#">Чарли</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Рецепта №</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  1
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Име рецепта</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  <a href="#">Chicken & liver with brown rice</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-2" aria-labelledby="tab-2-tab" role="tabpanel">
        <div class="row mb-2">
          <div class="col-12">
            <div class="row">
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Тегло</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  23кг
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Възраст</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  1 година
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Физическо състояние </strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  Нормално
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Активност</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  Нормална
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Кастрация</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  Да
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane col-12 mb-3" id="tab-3" aria-labelledby="tab-3-tab" role="tabpanel">
        <div class="row mb-2">
          <div class="col-12">
            <div class="row mb-2">
              <div class="col-12 mb-1">
                <h5>Калкулиране общ грамаж на меню</h5>
              </div>
              <div class="col-12 mb-1">
                Datatable JS
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-12 mb-1">
                <h5>Калкулиране продукти, грамаж и цена на менюто</h5>
              </div>
              <div class="col-12 mb-1">
                Datatable JS
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-12 mb-1">
                <div class="row">
                  <div class="col-12 col-md-6 mb-0d5 dtl-mtc text-uppercase">
                    <strong>Добавка %</strong>
                  </div>
                  <div class="col-12 col-md-6 mb-0d5 dtl-mtc">
                    <strong>150 %</strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-6 mb-0d5 dtl-mtc text-uppercase">
                    <strong>Твърда надбавка /£/</strong>
                  </div>
                  <div class="col-12 col-md-6 mb-0d5 dtl-mtc">
                    <strong>6 £</strong>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-md-6 mb-0d5 dtl-mtc text-uppercase">
                    <strong>Цена меню</strong>
                  </div>
                  <div class="col-12 col-md-6 mb-0d5 dtl-mtc">
                    <strong>£8,309025</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection