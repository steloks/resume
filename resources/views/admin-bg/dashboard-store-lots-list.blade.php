@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Store - lots list')
{{-- vendor style --}}
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
<div class="col-12 col-md-6 mt-1">
    <h4>Партиди</h4>
  </div>
  <div class="col-12 col-md-6 mt-1 dtr-mtc">
    <button type="button" class="btn btn-wine text-uppercase">експорт в excel</button>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1">
    Datatable JS
  </div>
</div>
@endsection