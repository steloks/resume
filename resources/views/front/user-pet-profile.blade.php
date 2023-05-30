@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'User - Pet Profile')

@section('content')
    <div class="container my-3r">
        <div class="row mx-3pr">
            <div class="col-12 col-lg-3">
                @include('panels.front-user.sidebar-navigation')
            </div>
            <div class="col-12 col-lg-9">
                @include('panels.front-user.pet-profile')
            </div>
        </div>
    </div>
@stop
