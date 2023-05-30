@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - allergens list')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-md-8 mt-1">
            <h4>Allergens</h4>
        </div>
        <div class="col-12 col-md-4 mt-1 dtr-mtc">
            <a href="{{route('admin.allergen.add.view')}}">
                <button type="button" class="btn btn-dark text-uppercase">Add allergen</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1">
            Datatable JS
        </div>
    </div>
@endsection
