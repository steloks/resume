@@ -0,0 +1,152 @@
@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Cookhouse - Order')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="#" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>Към всички поръчки</span>
            </a>
            <h4>Поръчка №121434</h4>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12 py-1">
            <div class="row py-1">
                <div class="col-12 text-left">
                    Меню 1
                </div>
                <div class="col-6 text-left mb-1">
                    <strong>Chicken & liver with brown rice</strong>
                </div>
                <div class="col-6 text-right mb-1">
                    <div class="checkbox">
                        <input type="checkbox" class="checkbox-input" id="c1">
                        <label for="c1" class="text-uppercase fw-600">Приготвено</label>
                    </div>
                </div>
            </div>
            <div class="row py-1 bg-f7">
                <div class="col-6 text-left text-uppercase">
                    <strong>Съставки</strong>
                </div>
                <div class="col-6 text-right text-uppercase">
                    <strong>Количество</strong>
                </div>
            </div>
            <div class="row brd-b1-c4 py-1">
                <div class="col-6 text-left">
                    Пилешко
                </div>
                <div class="col-6 text-right">
                    100гр
                </div>
            </div>
            <div class="row brd-b1-c4 py-1">
                <div class="col-6 text-left">
                    Зеленчуци
                </div>
                <div class="col-6 text-right">
                    100гр
                </div>
            </div>
            <div class="row brd-b1-c4 py-1">
                <div class="col-6 text-left">
                    Субпродукт
                </div>
                <div class="col-6 text-right">
                    100гр
                </div>
            </div>
            <div class="row brd-b1-c4 py-1">
                <div class="col-6 text-left">
                    Яйце
                </div>
                <div class="col-6 text-right">
                    100гр
                </div>
            </div>
            <div class="row py-1 bg-c4">
                <div class="col-6 text-left text-uppercase">
                    <strong>Общо:</strong>
                </div>
                <div class="col-6 text-right text-uppercase">
                    400гр
                </div>
            </div>
        </div>
        <div class="col-12 py-1">
            <div class="row py-1">
                <div class="col-12 text-left">
                    Меню 2
                </div>
                <div class="col-6 text-left mb-1">
                    <strong>Chicken & liver with brown rice</strong>
                </div>
                <div class="col-6 text-right mb-1">
                    <div class="checkbox">
                        <input type="checkbox" class="checkbox-input" id="c2">
                        <label for="c2" class="text-uppercase">Приготвено</label>
                    </div>
                </div>
            </div>
            <div class="row py-1 bg-f7">
                <div class="col-6 text-left text-uppercase">
                    <strong>Съставки</strong>
                </div>
                <div class="col-6 text-right text-uppercase">
                    <strong>Количество</strong>
                </div>
            </div>
            <div class="row brd-b1-c4 py-1">
                <div class="col-6 text-left">
                    Пилешко
                </div>
                <div class="col-6 text-right">
                    100гр
                </div>
            </div>
            <div class="row brd-b1-c4 py-1">
                <div class="col-6 text-left">
                    Зеленчуци
                </div>
                <div class="col-6 text-right">
                    100гр
                </div>
            </div>
            <div class="row brd-b1-c4 py-1">
                <div class="col-6 text-left">
                    Субпродукт
                </div>
                <div class="col-6 text-right">
                    100гр
                </div>
            </div>
            <div class="row brd-b1-c4 py-1">
                <div class="col-6 text-left">
                    Яйце
                </div>
                <div class="col-6 text-right">
                    100гр
                </div>
            </div>
            <div class="row py-1 bg-c4">
                <div class="col-6 text-left text-uppercase">
                    <strong>Общо:</strong>
                </div>
                <div class="col-6 text-right text-uppercase">
                    400гр
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center mb-3">
            <button type="button" class="btn btn-dark text-uppercase">Отбележи като приключена</button>
        </div>
    </div>
@endsection
