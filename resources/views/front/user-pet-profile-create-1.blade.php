@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'User - Pet Profile Cretae Step 1')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
@endsection
@section('content')
<div class="w-100 bg-white bg-art">
  <div class="container-fluid bg-c4-0d1">
    <div class="row">
      <div class="col-12 fz-30xr ff-fptdemi my-3r text-center">
        Create your pet profile
      </div>
    </div>
  </div>
  <div class="container py-3r">
    <div class="row">
      <div class="col-12">
          @include('panels.front-user.pet-profile-create-1')
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
{{--    <script type="application/javascript" src="{{ 'js/pet.js' }}"></script>--}}
@endsection
