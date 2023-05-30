<!DOCTYPE html>
<!--
Template Name: Frest HTML Admin Template
Author: :Pixinvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/pixinvent_portfolio
Renew Support: https://1.envato.market/pixinvent_portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
@php
    $configData = array(
      'mainLayoutType' => 'vertical-menu', //Options:vertical-menu,horizontal-menu,vertical-menu-boxicons, default(vertical-menu)
      'theme' => 'light',  //light(default),dark,semi-dark (note: Horizontal-menu not applicable for semi-dark)
      'isContentSidebar' => false,  // Options: True and false(default) (There are two page layout with content-sidebar and without sidebar)
      'pageHeader' => false, //options:Boolean: false(default), true (Page Header for Breadcrumbs) Warning:if page header true need to define a breadcrumbs in controller
      'bodyCustomClass' => '', //any custom class can be pass
      'navbarBgColor' => 'bg-white', //Options:bg-white(default for vertical-menu),bg-primary(default horizontal-menu), bg-success,bg-danger,bg-info,bg-warning,bg-dark.(Note:color only visible when you scroll down)
      'navbarType' => 'fixed', // options:fixed,static,hidden (note: Horizontal-menu template only support fixed and static)
      'isMenuCollapsed' => false, // options:true or false(default)  Warning:this option is not applicable for horizontal-menu template
      'footerType' => 'static', //options:fixed,static,hidden
      'templateTitle' => 'Frest', //template Title can be changed, default(Frest)
      'isCustomizer' => true, //If True customizer available or false its not available
      'isCardShadow' => true, // Option: true(default) and false ( remove card shadow)
      'isScrollTop' => true, // Option: true and false (Hide Scroll To Top)
      'defaultLanguage' => 'en', //set your default language Options: en(default),pt,fr,de
      'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'), // Page direction
      'navbarClass' => 'fixed-top',
    );
    // get all data from menu.json file
    $verticalMenuJson = file_get_contents(base_path('resources/data/menus/vertical-menu.json'));
    /*
    __('Nomenclatures')*/
    $verticalMenuData = json_decode($verticalMenuJson);
    // share all menuData to all the views
    \View::share('menuData', [$verticalMenuData]);
@endphp

<html class="loading"
      lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif"
      data-textdirection="{{$configData['direction'] == 'rtl' ? 'rtl' : 'ltr' }}" data-asset-path="{{ asset('/')}}">
<!-- BEGIN: Head-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/ico/favicon.ico')}}">

    {{-- Include core + vendor Styles --}}
    @include('panels.styles')
</head>
<!-- END: Head-->

@if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType']))
    @include(($configData['mainLayoutType'] === 'horizontal-menu') ? 'layouts.horizontalLayoutMaster':'layouts.verticalLayoutMaster')
@else
    {{-- if mainLaoutType is empty or not set then its print below line --}}
    <h1>{{'mainLayoutType Option is empty in config custom.php file.'}}</h1>
@endif


</html>


