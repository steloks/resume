@extends('layouts.frontLayout')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.min.css') }}">
@endsection

@section('content')
    <div class="w-100 bg-white">
        <div class="container">
            <div class="row my-3r">
                <div class="col-12 text-center">
                    <h1 class="">Edit</h1>
{{--                    <h2 class="">{{ $cms->title }}</h2>--}}
                </div>
            </div>
            <form action="{{ route('cms.store.content', ['id' => $cms->id, 'slug' => $cms->slug]) }}" name="html-editor" id="html-editor" class="row mb-3r" method="post">
                @csrf
                <div class="col-12 mb-3r">
                    <label for="content"></label>
                    <textarea name="content" id="content" class="w-100">{{ $cms->content }}</textarea>
                </div>
                <div class="col-12 col-md-6 text-center mb-1r">
                    <button id="editor-save" type="submit" class="btn btn-df-wine btn-sq-lp-m w-200x">Save</button>
                </div>
                <div class="col-12 col-md-6 text-center mb-1r">
                    <a href="{{ route('home') }}" id="editor-cancel" class="btn btn-df-b btn-sq-lp-m w-200x">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
{{--    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.min.css') }}">--}}
    <script src="{{ asset('summernote/summernote-lite.js') }}"></script>
    <script>
        $('#content').summernote({
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
