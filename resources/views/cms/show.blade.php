@extends('layouts.frontLayout')

@section('content')
    <div class="w-100 bg-white">
        <div class="container">
            <div class="row my-3r">
                <div class="col-12 text-center">
{{--                    <h2 class="">{{ __($cms->title) }}</h2>--}}
                </div>
            </div>
                <div class="col-12 mb-3r">
                    <label for="content"></label>
                    <div id="content" class="w-100">{!! $cms->content !!}</div>
                </div>
        </div>
    </div>
@endsection
