@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Admin modals')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<div class="col-12 my-1r">
			<button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#printLabel1">Print label 1</button>
			@include('admin.modals.print-label-1-modal')
		</div>
		<div class="col-12 my-1r">
			<button type="button" class="btn df-blink" data-bs-toggle="modal" data-bs-target="#printLabel2">Print label 2</button>
			@include('admin.modals.print-label-2-modal')
		</div>
	</div>
</div>
@endsection