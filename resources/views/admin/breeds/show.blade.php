@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - breed edit')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="{{ route('admin.breeds.index') }}" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all breeds</span>
    </a>
    <h4>{{ $breed->name }}</h4>
    <div>ID: {{ $breed->id }}</div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-1">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="name">Breed name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $breed->name }}" disabled>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" name="description" value="{{ $breed->description }}" disabled>
            </fieldset>
          </div>
          @if(checkAccess('Breeds','create_edit'))
              <div class="col-12 mt-2 dtl-mtc">
                  <a href="{{ route('admin.breeds.edit.view', ['id' => $breed->id]) }}" id="2" class="btn btn-dark text-uppercase">{{ __('Edit') }}</a>
              </div>
          @endif
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 mt-1 mb-1">
      <div class="row">
          <div class="col-12 col-md-6 dtr-mtc">
              <strong>Created:</strong>
          </div>
          <div class="col-12 col-md-6 dtl-mtc mb-05">
              {{ parseDate($breed->created_at) }}
          </div>
          <div class="col-12 col-md-6 dtr-mtc">
              <strong>Created by:</strong>
          </div>
          <div class="col-12 col-md-6 dtl-mtc mb-05">
              {{ $breed->created_by ?? __('Website') }}
          </div>
          <div class="col-12 col-md-6 dtr-mtc">
              <strong>Edited:</strong>
          </div>
          <div class="col-12 col-md-6 dtl-mtc mb-05">
              {{ parseDate($breed->updated_at) }}
          </div>
          <div class="col-12 col-md-6 dtr-mtc">
              <strong>Edited by:</strong>
          </div>
          <div class="col-12 col-md-6 dtl-mtc mb-05">
              {{ $breed->updated_by }}
          </div>
      </div>
  </div>
</div>
@endsection
