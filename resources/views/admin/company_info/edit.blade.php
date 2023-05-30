@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - company data edit')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
      <h4>{{ __('Company info') }}</h4>
  </div>
</div>
<div class="row">
    <div class="col-12 col-md-8 mt-1 mb-1">
        <form action="{{ route('admin.company-info.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 mb-1">
                    <h5>{{ __('Company info') }}</h5>
                </div>
                <div class="col-12 mb-3">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="name">{{ __('Company name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $companyInfo->name ?? '' }}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="address">{{ __('Company address') }}</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $companyInfo->address ?? '' }}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="phone">{{ __('Phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $companyInfo->phone ?? '' }}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="website">{{ __('Website') }}</label>
                                <input type="text" class="form-control" id="website" name="website" value="{{ $companyInfo->website ?? '' }}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $companyInfo->email ?? '' }}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="identification_number">{{ __('Identification number') }}</label>
                                <input type="text" class="form-control" id="identification_number" name="identification_number" value="{{ $companyInfo->identification_number ?? '' }}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="vat_address">{{ __('Tax address of the company:') }}</label>
                                <input type="text" class="form-control" id="vat_address" name="vat_address" value="{{ $companyInfo->vat_address ?? '' }}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="mol">{{ __('MOL') }}</label>
                                <input type="text" class="form-control" id="mol" name="mol" value="{{ $companyInfo->mol ?? '' }}">
                            </fieldset>
                        </div>
                        <div class="col-12 mb-1">
                            <label for="id">{{ __('Logo') }}</label>
                            <input type="file" name="logo">
                        @if(!empty($companyInfo->logo))
                                <div>
                                    <img src="{{ asset('images/admin/company/'. $companyInfo->logo) }}" class="img-fluid w-max-250x" alt="Logo">
                                </div>
                            @else
                                <div>
                                    <img src="{{asset('images/admin/company/1/logo/logo.jpg')}}" class="img-fluid w-max-250x" alt="Logo">
                                </div>
                            @endif
                        </div>
                        <div class="col-12 mt-1 mb-1">
                            <h5>{{ __('Bank info') }}</h5>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="bank_name">{{ __('Bank name') }}</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $companyInfo->bank_name ?? '' }}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="iban">{{ __('IBAN') }}</label>
                                <input type="text" class="form-control" id="iban" name="iban" value="{{ $companyInfo->iban ?? '' }}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="bic">{{ __('BIC') }}</label>
                                <input type="text" class="form-control" id="bic" name="bic" value="{{ $companyInfo->bic ?? '' }}">
                            </fieldset>
                        </div>
                        <div class="col-12 mt-2 dtl-mtc">
                            <div class="col-12 mt-2 dtl-mtc">
                                <button type="submit" id="2" class="btn btn-dark text-uppercase">{{ __('Save') }}</button>
                                <a href="{{ route('admin.company-info.index') }}" id="2" class="btn btn-dark text-uppercase">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-md-4 mt-1 mb-1">
        <div class="row">
            @if(!empty($companyInfo))
            <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Created: {{ parseDate($companyInfo->created_at) }}</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">

                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Created by: {{$companyInfo->created_by}}</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">

                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Edited: {{ parseDate($companyInfo->updated_at) }}</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">

                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Edited by:{{$companyInfo->updated_by}}</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">
                </div>
        </div>
        @endif
    </div>
</div>
@endsection
