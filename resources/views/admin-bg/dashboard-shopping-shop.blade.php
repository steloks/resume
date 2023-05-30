@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Shopping - shop')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>Към списъка</span>
    </a>
    <h4>Пазаруване</h4>
    <div>
      Дата на закупуване: 04.11.2021
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    Datatable JS
  </div>
</div>
@endsection