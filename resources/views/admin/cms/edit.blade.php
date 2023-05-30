@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - company data edit')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.min.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{ route('admin.cms.index') }}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>{{ __('To all cms') }}</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <h4>{{ ucfirst($cms->title) }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 mt-1 mb-1">
            <form action="{{ route('admin.cms.update', ['id' => $cms->id]) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 mb-05">
                                <fieldset class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           value="{{ $cms->title ?? '' }}">
                                </fieldset>
                            </div>
                            @if($cms->type == 'blog')
                                <div class="col-12 mb-05">
                                    <fieldset class="form-group">
                                        <label for="short_preview">{{ __('Short preview') }}</label>
                                        <textarea name="short_preview" id="short_preview"
                                                  class="w-100">{!! $cms->short_preview ?? '' !!}</textarea>
                                    </fieldset>
                                </div>
                            @endif
                            <div class="col-12 mb-3r">
                                <label for="content">{{ __('Content') }}</label>
                                <textarea name="content" id="content" class="w-100">{!! $cms->content !!}</textarea>
                            </div>
                            <div class="col-12 mt-2 dtl-mtc">
                                @if(checkAccess('CMS','create_edit'))
                                    <div class="col-12 mt-2 dtl-mtc">
                                        <button type="submit" id="2"
                                                class="btn btn-dark text-uppercase">{{ __('Save') }}</button>
                                        <a href="{{ route('admin.cms.index') }}" id="2"
                                           class="btn btn-dark text-uppercase">{{ __('Cancel') }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-4 mt-1 mb-1">
            <div class="row">
                @if(!empty($cms))
                    <div class="col-12 col-md-6 dtr-mtc">
                        <strong>{{ __('Created') }}: {{ parseDate($cms->created_at) }}</strong>
                    </div>
                    <div class="col-12 col-md-6 dtl-mtc mb-05">

                    </div>
                    <div class="col-12 col-md-6 dtr-mtc">
                        <strong>{{ __('Created by') }}: {{$cms->created_by}}</strong>
                    </div>
                    <div class="col-12 col-md-6 dtl-mtc mb-05">

                    </div>
                    <div class="col-12 col-md-6 dtr-mtc">
                        <strong>{{ __('Edited') }}: {{ parseDate($cms->updated_at) }}</strong>
                    </div>
                    <div class="col-12 col-md-6 dtl-mtc mb-05">

                    </div>
                    <div class="col-12 col-md-6 dtr-mtc">
                        <strong>{{ __('Edited by') }}:{{$cms->updated_by}}</strong>
                    </div>
                    <div class="col-12 col-md-6 dtl-mtc mb-05">
                    </div>
            </div>
            @endif
        </div>
    </div>
@endsection
@section('page-scripts')
    <script src="{{ asset('summernote/summernote-lite.js') }}"></script>
    <script>
        $('#content, #short_preview').summernote({
            placeholder: 'Content...',
            tabsize: 1,
            height: 620,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['codeview', 'help']]
            ]
        });
    </script>
@endsection
