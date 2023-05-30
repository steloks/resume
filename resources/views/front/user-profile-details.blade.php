@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'User - Profile Details')
@section('content')
    <div class="container my-3r">
        <div class="row">
            <div class="col-12 col-lg-3 mb-2r">
                @include('panels.front-user.sidebar-navigation')
            </div>
            <div class="col-12 col-lg-9">
              @include('panels.front-user.user-profile-details')
            </div>
        </div>
    </div>
@stop
