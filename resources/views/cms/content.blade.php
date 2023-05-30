@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Editor')
@section('content')
    @if(auth()->check() && !empty(auth()->user()) && auth()->user()->hasRole('Admin'))
        @include('cms.edit')
    @else
        @include('cms.show')
    @endif
@endsection
