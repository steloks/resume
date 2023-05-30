@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'User - Pet Profile Cretae Step 2')
@section('content')
<div class="w-100 bg-white bg-art">
  <div class="container-fluid bg-m-1">
    <div class="row">
      <div class="col-12 py-3r ff-fptdemi fz-30xr text-center">
        Create your pet profile
      </div>
    </div>
  </div>
  <div class="container py-3r">
    <div class="row">
      <div class="col-12 w-75p-100p m-auto">
          @include('panels.front-user.pet-profile-create-2')
      </div>
    </div>
  </div>
</div>
@stop