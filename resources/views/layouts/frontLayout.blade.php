<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('panels.front-styles')
    @yield('page-styles')
</head>
<!-- END: Head-->
<body>
<!-- BEGIN: Header-->
@include('partials.front-navbar')
<!-- END: Header-->

<!-- BEGIN: Content-->
<div id="app" class="content">
    @yield('content')
    @if(!auth()->check())
        @include('panels.modals.user-login-modal')
        @include('panels.modals.user-forgot-password-modal')
        @include('panels.modals.user-signup-modal')
        @include('panels.modals.not-delivering-area-modal')
    @endif
</div>
<!-- END: Content-->

<!-- BEGIN: Footer-->
@include('partials.front-footer')
<!-- END: Footer-->

@include('panels.front-scripts')
@yield('scripts')
</body>
<!-- END: Body-->
</html>


