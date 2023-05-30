@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'User - Profile My Order History')
@section('content')
    <div class="container my-3r">
        <div class="row">
            <div class="col-12 col-lg-3">
                @include('panels.front-user.sidebar-navigation')
            </div>
            <div class="col-12 col-lg-9">
              @include('panels.front-user.user-profile-my-order-history')
            </div>
        </div>
    </div>
@stop
