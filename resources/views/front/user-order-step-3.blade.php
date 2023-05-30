@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Order Step 3')
@section('content')
<div class="w-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center">
        <img src="{{ asset('images/logo/order/order-timeline-step-3.png') }}" alt="Pet pic">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        @include('panels.front-user.order-step-3')
      </div>
    </div>
  </div>
</div>
@stop