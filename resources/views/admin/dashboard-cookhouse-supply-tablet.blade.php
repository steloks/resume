@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Cookhouse - Supply')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1">
            <h4>Доставки</h4>
            <p>Вашите доставки за 04.11.2021 / Куриер: Иван Иванов</p>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-6 text-uppercase align-self-center mb-2 mt-1">
            <div class="checkbox">
                <input type="checkbox" class="checkbox-input" id="c1">
                <label for="c1" class="fz-1d2 tm-lh-0">Маркирай всички поръчки</label>
            </div>
        </div>
        <div class="col-6 text-right text-uppercase mb-2 mt-1">
            <button type="button" class="btn btn-dark text-uppercase" data-toggle="modal" data-target="#dashboard-modal-supply-change-status">Промени статус</button>
        </div>
        <div class="col-12 py-1">
            <div class="card dfs-card text-center">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-6 text-left align-self-center">
                            <div class="checkbox">
                                <input type="checkbox" class="checkbox-input" id="co1">
                                <label for="co1" class="fz-1d2 tm-lh-0">Поръчка № 121434</label>
                            </div>
                        </div>
                        <div class="col-6 text-uppercase text-right">
                            <select id="" class="form-select text-uppercase select-bg-yellow">
                                <option value="1">Приключена</option>
                                <option value="2">Взета от куриер</option>
                                <option value="3">Доставена</option>
                            </select>
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Менюта</strong>
                        </div>
                        <div class="col-6 text-right">
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Обект</strong>
                        </div>
                        <div class="col-6 text-right">
                            Кухня 1, 0888 888 888
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Клиент</strong>
                        </div>
                        <div class="col-6 text-right">
                            Марина Михайлова, 0893 941 340
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Район</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Brentwood, CM13, Hutton Central
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>подрайон</strong>
                        </div>
                        <div class="col-6 text-right">
                            Hutton Central
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>адрес</strong>
                        </div>
                        <div class="col-6 text-right">
                            4 The Spinney, Hutton, Brentwood, CM13 1AS
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
                        <div class="col-6 text-left align-self-center">
                            <div class="checkbox">
                                <input type="checkbox" class="checkbox-input" id="co2">
                                <label for="co2" class="fz-1d2 tm-lh-0">Поръчка № 121434</label>
                            </div>
                        </div>
                        <div class="col-6 text-uppercase text-right">
                            <select id="" class="form-select text-uppercase select-bg-yellow">
                                <option value="1">Приключена</option>
                                <option value="2">Взета от куриер</option>
                                <option value="3">Доставена</option>
                            </select>
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Менюта</strong>
                        </div>
                        <div class="col-6 text-right">
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Обект</strong>
                        </div>
                        <div class="col-6 text-right">
                            Кухня 1, 0888 888 888
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Клиент</strong>
                        </div>
                        <div class="col-6 text-right">
                            Марина Михайлова, 0893 941 340
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Район</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Brentwood, CM13, Hutton Central
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>подрайон</strong>
                        </div>
                        <div class="col-6 text-right">
                            Hutton Central
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>адрес</strong>
                        </div>
                        <div class="col-6 text-right">
                            4 The Spinney, Hutton, Brentwood, CM13 1AS
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
                        <div class="col-6 text-left align-self-center">
                            <div class="checkbox">
                                <input type="checkbox" class="checkbox-input" id="co3">
                                <label for="co3" class="fz-1d2 tm-lh-0">Поръчка № 121434</label>
                            </div>
                        </div>
                        <div class="col-6 text-uppercase text-right">
                            <select id="" class="form-select text-uppercase select-bg-yellow">
                                <option value="1">Приключена</option>
                                <option value="2">Взета от куриер</option>
                                <option value="3">Доставена</option>
                            </select>
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Менюта</strong>
                        </div>
                        <div class="col-6 text-right">
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                            <p class="mb-0d5">1 x Chicken & liver with brown rice</p>
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Обект</strong>
                        </div>
                        <div class="col-6 text-right">
                            Кухня 1, 0888 888 888
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Клиент</strong>
                        </div>
                        <div class="col-6 text-right">
                            Марина Михайлова, 0893 941 340
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>Район</strong>
                        </div>
                        <div class="col-6 text-right">
                            И.Brentwood, CM13, Hutton Central
                        </div>
                    </div>
                    <div class="row py-1 bg-f7">
                        <div class="col-6 text-left text-uppercase">
                            <strong>подрайон</strong>
                        </div>
                        <div class="col-6 text-right">
                            Hutton Central
                        </div>
                    </div>
                    <div class="row py-1">
                        <div class="col-6 text-left text-uppercase">
                            <strong>адрес</strong>
                        </div>
                        <div class="col-6 text-right">
                            4 The Spinney, Hutton, Brentwood, CM13 1AS
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
    @include('admin.modals.dashboard-modal-supply-change-status')
@endsection
