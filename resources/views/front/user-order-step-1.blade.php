@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Order Step 1')
@section('content')
<div class="w-100 bg-white">
  <div class="container-fluid bg-c4-0d1 mb-3r">
    <div class="row">
      <div class="col-12 text-center my-3r">
        <img src="{{ asset('images/logo/order/order-timeline-step-1.png') }}" class="img-fluid" alt="Pet pic">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        @include('panels.front-user.order-step-1')
      </div>
    </div>
  </div>
</div>
@stop