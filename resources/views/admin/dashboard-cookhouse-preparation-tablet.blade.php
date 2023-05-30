@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Cookhouse - Preparation')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1">
            <h4>List of cooking products</h4>
            <p>Date: 04.11.2021</p>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-12 text-right text-uppercase mb-2 mt-1">
            <label for="s1" class="form-label d-inline-block mr-1"><strong>обект</strong></label>
            <select class="form-control w-25 d-inline-block" id="s1">
                <option>Кухня 1</option>
            </select>
        </div>
        <div class="col-12 py-1">
            <div class="card dfs-card text-center">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-6 text-left">
                            <strong>Телешко месо</strong>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-success round text-uppercase">отбележи като приготвено</button>
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>ПАртиден номер</strong>
                        </div>
                        <div class="col-6 text-right">
                            7867
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>НАличност</strong>
                        </div>
                        <div class="col-6 text-right">
                            2кг
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>необходимо к-во</strong>
                        </div>
                        <div class="col-6 text-right">
                            1кг
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>срок на годност</strong>
                        </div>
                        <div class="col-6 text-right">
                            05.11.2021
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>служител</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Иванов
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>обект</strong>
                        </div>
                        <div class="col-6 text-right">
                            Кухня 1
                        </div>
                    </div>
                </div>
            </div>
            <div class="card dfs-card text-center">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-6 text-left">
                            <strong>Телешко месо</strong>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-success round text-uppercase">отбележи като приготвено</button>
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>ПАртиден номер</strong>
                        </div>
                        <div class="col-6 text-right">
                            7867
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>НАличност</strong>
                        </div>
                        <div class="col-6 text-right">
                            2кг
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>необходимо к-во</strong>
                        </div>
                        <div class="col-6 text-right">
                            1кг
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>срок на годност</strong>
                        </div>
                        <div class="col-6 text-right">
                            05.11.2021
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>служител</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Иванов
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>обект</strong>
                        </div>
                        <div class="col-6 text-right">
                            Кухня 1
                        </div>
                    </div>
                </div>
            </div>
            <div class="card dfs-card text-center">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-6 text-left">
                            <strong>Телешко месо</strong>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-success round text-uppercase">отбележи като приготвено</button>
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>ПАртиден номер</strong>
                        </div>
                        <div class="col-6 text-right">
                            7867
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>НАличност</strong>
                        </div>
                        <div class="col-6 text-right">
                            2кг
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>необходимо к-во</strong>
                        </div>
                        <div class="col-6 text-right">
                            1кг
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>срок на годност</strong>
                        </div>
                        <div class="col-6 text-right">
                            05.11.2021
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>служител</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Иванов
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>обект</strong>
                        </div>
                        <div class="col-6 text-right">
                            Кухня 1
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="pagination-dfa" class="col-12">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-lg justify-content-center mb-1">
                    <li class="page-item previous"><a class="page-link bg-trsp-i" href="">Предишна</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item active"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item next"><a class="page-link bg-trsp-i" href="#">Следваща</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
