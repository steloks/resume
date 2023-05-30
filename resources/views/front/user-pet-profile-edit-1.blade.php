@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'User - Pet Profile Edit Step 1')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/flatpickr.css') }}">
@endsection
@section('content')
<div class="w-100 bg-white bg-art">
  <div class="container-fluid bg-m-1">
    <div class="row">
      <div class="col-12 py-3r ff-fptdemi fz-30xr text-center">
        Edit your pet profile
      </div>
    </div>
  </div>
  <div class="container py-3r">
    <div class="row">
      <div class="col-12">
          @include('panels.front-user.pet-profile-edit-1')
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts')
    {{--    <script type="application/javascript" src="{{ 'js/pet.js' }}"></script>--}}
@endsection
