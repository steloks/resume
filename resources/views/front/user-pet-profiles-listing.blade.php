@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'User - Pet Profiles Listing')

@section('content')
    <div class="container my-3r">
        <div class="row">
            <div class="col-12 col-lg-3">
                @include('panels.front-user.sidebar-navigation')
            </div>
            <div class="col-12 col-lg-9 mt-2r">
                @include('panels.front-user.pet-profiles-listing')
            </div>
        </div>
    </div>
@stop
