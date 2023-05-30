@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'User - Pet Profile No Pets')
@section('content')
    <div class="container my-3r">
        <div class="row">
            <div class="col-12 col-md-3">
                @include('panels.front-user.sidebar-navigation')
            </div>
            <div class="col-12 col-md-9 mt-2r">
                @include('panels.front-user.user-pet-profile-no-pets')
            </div>
        </div>
    </div>
@endsection
@include('panels.front-scripts')