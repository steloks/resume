@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Cookhouse - Prepare Orders 2')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 text-center mt-1">
            <h4>Приготвяне на поръчки <span class="text-center bg-secondary white d-inline-block rounded-circle lab-w2d2r">2</span></h4>
            <p>Дата: 04.11.2021</p>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-5 text-uppercase mb-2 mt-1">
            <label for="s1" class="form-label d-inline-block mr-1"><strong>район:</strong></label>
            <select class="form-control w-100 d-inline-block" id="s1">
                <option>CM13</option>
            </select>
        </div>
        <div class="col-7 text-right text-uppercase pl-0 align-self-end mb-2 mt-1">
            <button type="submit" id="9" class="btn btn-dark dfm-btn-mob text-uppercase">Започни да готвиш</button>
        </div>
        <div class="col-12 py-1">
            <div class="card dfs-card text-center">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-6 text-left">
                            <strong>Поръчка № 121434</strong>
                        </div>
                        <div class="col-6 text-right pl-0">
                            <span class="badge-label-red-mob text-uppercase">не е започната</span>
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-5 text-left text-uppercase">
                            <strong>Менюта</strong>
                        </div>
                        <div class="col-7 text-right">
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Служител</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Иванов
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Обект</strong>
                        </div>
                        <div class="col-6 text-right">
                            Кухня 1
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Град/ Район/под район</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Brentwood, CM13, Hutton Central
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>часови слот</strong>
                        </div>
                        <div class="col-6 text-right">
                            8:00-9:00
                        </div>
                    </div>
                </div>
            </div>
            <div class="card dfs-card text-center">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-6 text-left">
                            <strong>Поръчка № 121434</strong>
                        </div>
                        <div class="col-6 text-right pl-0">
                            <span class="badge-label-red-mob text-uppercase">не е започната</span>
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-5 text-left text-uppercase">
                            <strong>Менюта</strong>
                        </div>
                        <div class="col-7 text-right">
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Служител</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Иванов
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Обект</strong>
                        </div>
                        <div class="col-6 text-right">
                            Кухня 1
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Град/ Район/под район</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Brentwood, CM13, Hutton Central
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>часови слот</strong>
                        </div>
                        <div class="col-6 text-right">
                            8:00-9:00
                        </div>
                    </div>
                </div>
            </div>
            <div class="card dfs-card text-center">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-6 text-left">
                            <strong>Поръчка № 121434</strong>
                        </div>
                        <div class="col-6 text-right pl-0">
                            <span class="badge-label-red-mob text-uppercase">не е започната</span>
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-5 text-left text-uppercase">
                            <strong>Менюта</strong>
                        </div>
                        <div class="col-7 text-right">
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Служител</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Иванов
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Обект</strong>
                        </div>
                        <div class="col-6 text-right">
                            Кухня 1
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Град/ Район/под район</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Brentwood, CM13, Hutton Central
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>часови слот</strong>
                        </div>
                        <div class="col-6 text-right">
                            8:00-9:00
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
