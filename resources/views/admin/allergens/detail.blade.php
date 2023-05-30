@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - allergen edit')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="{{ route('admin.allergens.index') }}" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>{{ __('To all allergens') }}</span>
    </a>
    <h4>{{ $allergen->product->name }}</h4>
    <div>{{ __('ID') }}: {{ $allergen->id}}</div>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-1">
        <div class="row">
          <div class="col-12 col-md-6 mb-05">
            <label for="name">{{ __('Select nomenclature') }}</label>
            <fieldset class="form-group">
              <select class="form-control" name="name" id="name" disabled>
                <option value="">{{ $allergen->product->name }}</option>
              </select>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="description">{{ __('Description') }}</label>
              <input type="text" class="form-control" id="description" name="description" value="{{ $allergen->description }}" disabled>
            </fieldset>
          </div>
            @if(checkAccess('Allergens','create_edit'))
                <div class="col-12 mt-2 dtl-mtc">
                    <a href="{{ route('admin.allergens.edit.view', ['id' => $allergen->id]) }}" id="2" class="btn btn-dark text-uppercase">{{__('Edit')}}</a>
                </div>
            @endif
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 mt-1 mb-1">
      <div class="row">
          <div class="col-12 col-md-6 dtr-mtc">
              <strong>Created:</strong>
          </div>
          <div class="col-12 col-md-6 dtl-mtc mb-05">
              {{ parseDate($allergen->created_at) }}
          </div>
          <div class="col-12 col-md-6 dtr-mtc">
              <strong>Created by:</strong>
          </div>
          <div class="col-12 col-md-6 dtl-mtc mb-05">
              {{ $allergen->created_by ?? __('Website') }}
          </div>
          <div class="col-12 col-md-6 dtr-mtc">
              <strong>Edited:</strong>
          </div>
          <div class="col-12 col-md-6 dtl-mtc mb-05">
              {{ parseDate($allergen->updated_at) }}
          </div>
          <div class="col-12 col-md-6 dtr-mtc">
              <strong>Edited by:</strong>
          </div>
          <div class="col-12 col-md-6 dtl-mtc mb-05">
              {{ $allergen->updated_by }}
          </div>
      </div>
  </div>
</div>
@endsection
