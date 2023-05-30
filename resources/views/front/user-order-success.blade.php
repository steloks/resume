@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Order Success')
@section('content')
<div class="w-100 bg-white">
  <div class="container">
    <div class="row">
      <div class="col-12">
        @include('panels.front-user.order-success')
      </div>
    </div>
  </div>
</div>
@stop