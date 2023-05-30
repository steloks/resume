@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Blog')
@section('content')
    <div class="w-100 bg-white bg-marble">
        <div class="container-fluid">
            <div class="row py-3r">
                <div class="col-12 my-1r container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="fz-36xr ff-avtr mb-1r fw-700 lh-1d3">{{ __('Blog') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="pt-1r pb-3r container-fluid">
                <div class="row">
                    <div class="col-12 container">
                        <div class="row pt-2r pb-3r">
                            @foreach($cms as $cm)
                                <div class="col-12 col-md-6 col-xl-4 mb-3r">
                                    <div class="row h-100">
                                        <div class="col-12 mb-3">
                                            <img class="d-block w-100" src="{!! getBlogImg($cm->short_preview) !!}" alt="Pic">
                                        </div>
                                        <div class="col-12 mb-3">
                                            {{ parseDate($cm->created_at) }}
                                        </div>
                                        <div class="col-12 mb-3 fz-26xr ff-fptdemi">
                                            {!! $cm->title !!}
                                        </div>
                                        <div class="col-12 mb-3">
                                            {!! \Illuminate\Support\Str::limit(\Illuminate\Support\Str::remove(getBlogImg($cm->short_preview), $cm->short_preview), 250) !!}
                                        </div>
                                        <div class="col-12">
                                            <a class="btn btn-df-lbr btn-sq-tb nav-link df-blink w-max-content"
                                               href="{{  url($cm->slug)  }}">{{ __('read more') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
