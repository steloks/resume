@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Order Has Not Been Processed')
@section('content')
<div class="w-100 bg-white bg-art">
  <div class="container">
    <div class="row">
      <div class="col-12">
        @include('test-project.resources.views.panels.front-user.order-has-not-been-processed')
      </div>
    </div>
  </div>
</div>
@stop
