@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Shopping - shop')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row text-center">
        <div class="col-12 mt-1 mb-1">
            <a href="#" class="brd-a-item justify-content-center mb-1">
                <i class="bx bx-arrow-back"></i> <span>Към списъка</span>
            </a>
        </div>
        <div class="col-12 mb-1">
            <h4>Пазаруване</h4>
        </div>
        <div class="col-12 mb-1">
            Дата на закупуване: 04.11.2021
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-6 text-uppercase mb-1 mt-1">
            <div class="row">
                <label class="col-sm-2 pr-0 align-self-center" for="c"><strong>обект</strong></label>
                <div class="col-sm-10">
                    <select class="filter form-control w-auto pl-1 pr-3" id="c" name="c">
                        <option value="1">Кухня 1</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6 text-uppercase mb-1 mt-1 clearfix">
            <div class="row float-right">
                <label class="col-sm-3 align-self-center" for="s"><strong>Търсене</strong></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control w-100" id="s" name="s">
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-12 py-1">
            <div class="card dfs-card text-center">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-6 text-left fz-1d2">
                            <strong>Телешко месо</strong>
                        </div>
                        <div class="col-6 text-uppercase text-right">
                            <div class="row">
                                <label class="col-sm-5 align-self-center" for="i1"><strong>закупено к-во</strong></label>
                                <div class="col-sm-7 pr-0">
                                    <input type="text" class="form-control w-100 text-center" id="i1" name="i1" value="1000гр">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>код</strong>
                        </div>
                        <div class="col-6 text-right">
                            1
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Обект</strong>
                        </div>
                        <div class="col-6 text-right">
                            Кухня 1
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Партиден №</strong>
                        </div>
                        <div class="col-6 text-right">
                            43235245
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Мярка</strong>
                        </div>
                        <div class="col-6 text-right">
                            Грама
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Необходимо к-во</strong>
                        </div>
                        <div class="col-6 text-right">
                            1000гр
                        </div>
                    </div>
                    <div class="row mt-1 py-1">
                        <div class="col-6 text-left pl-0">
                        </div>
                        <div class="col-6 text-right pr-0">
                            <button type="button" class="btn btn-dark text-uppercase">принт</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card dfs-card text-center">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-6 text-left fz-1d2">
                            <strong>Телешко месо</strong>
                        </div>
                        <div class="col-6 text-uppercase text-right">
                            <div class="row">
                                <label class="col-sm-5" for="i1"><strong>закупено к-во</strong></label>
                                <div class="col-sm-7 pr-0">
                                    <input type="text" class="form-control w-100 text-center" id="i1" name="i1" value="1000гр">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>код</strong>
                        </div>
                        <div class="col-6 text-right">
                            1
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Обект</strong>
                        </div>
                        <div class="col-6 text-right">
                            Кухня 1
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Партиден №</strong>
                        </div>
                        <div class="col-6 text-right">
                            43235245
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Мярка</strong>
                        </div>
                        <div class="col-6 text-right">
                            Грама
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Необходимо к-во</strong>
                        </div>
                        <div class="col-6 text-right">
                            1000гр
                        </div>
                    </div>
                    <div class="row mt-1 py-1">
                        <div class="col-6 text-left pl-0">
                            <button type="button" class="btn btn-dark text-uppercase">заприходи</button>
                        </div>
                        <div class="col-6 text-right pr-0">
                            <button type="button" class="btn btn-dark text-uppercase">принт</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="pagination-dfa" class="col-12 mob-tmp">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-lg justify-content-center mb-1">
                    <li class="page-item previous"><a class="page-link bg-trsp-i" href="">Предишна</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item next"><a class="page-link bg-trsp-i" href="#">Следваща</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
