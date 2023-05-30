{{-- vertical-menu --}}
@if($configData['mainLayoutType'] == 'vertical-menu')
    <div
        class="main-menu menu-fixed @if($configData['theme'] === 'light') {{"menu-light"}} @else {{'menu-dark'}} @endif menu-accordion menu-shadow"
        data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{asset('/')}}">
                        <div class="brand-logo">
                            <img src="{{asset('images/logo/logo.png')}}" class="logo" alt="">
                        </div>
                        <h2 class="brand-text mb-0">
                        </h2>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="lines">
                @if(!empty($menuData[0]) && isset($menuData[0]))
                    @foreach ($menuData[0]->menu as $menu)

                        @if(isset($menu->navheader))
                            @if(!checkAccess($menu->subs,'show_module'))
                                @continue
                            @endif
                            <li class="navigation-header text-truncate"><span>{{ __($menu->navheader) }}</span></li>
                        @else
                            @if(!checkAccess($menu->name,'show_module'))
                                @continue
                            @endif


                            <li class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                                <a href="@if(isset($menu->url) && $menu->url != ''){{route($menu->url)}} @endif" @if(isset($menu->newTab)){{"target=_blank"}}@endif>
                                    @if(isset($menu->name))
                                        <span
                                            class="menu-title text-truncate text-uppercase">{{ __($menu->name)}}</span>
                                    @endif
                                    @if(isset($menu->tag))
                                        <span class="{{$menu->tagcustom}} ml-auto">{{$menu->tag}}</span>
                                    @endif
                                </a>
                                @if(isset($menu->submenu))
                                    @include('panels.sidebar-submenu',['menu' => $menu->submenu])
                                @endif
                                @if(isset($menu->hr))
                                    <hr>
                                @endif
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endif
{{-- horizontal-menu --}}
@if($configData['mainLayoutType'] == 'horizontal-menu')
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-light navbar-without-dd-arrow
@if($configData['navbarType'] === 'navbar-static') {{'navbar-sticky'}} @endif" role="navigation"
         data-menu="menu-wrapper">
        <div class="navbar-header d-xl-none d-block">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{asset('/')}}">
                        <div class="brand-logo">
                            <img src="{{asset('images/logo/logo.png')}}" class="logo" alt="">
                        </div>
                        <h2 class="brand-text mb-0">
                        </h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="filled">
                @if(!empty($menuData[1]) && isset($menuData[1]))
                    @foreach ($menuData[1]->menu as $menu)
                        <li class="@if(isset($menu->submenu)){{'dropdown'}} @endif nav-item" data-menu="dropdown">
                            <a class="@if(isset($menu->submenu)){{'dropdown-toggle'}} @endif nav-link"
                               href="{{route($menu->url)}}"
                            @if(isset($menu->submenu)){{'data-toggle=dropdown'}} @endif @if(isset($menu->newTab)){{"target=_blank"}}@endif>
                                <i class="menu-livicon" data-icon="{{$menu->icon}}"></i>
                                <span>{{ __($menu->name)}}</span>
                            </a>
                            @if(isset($menu->submenu))
                                @include('panels.sidebar-submenu',['menu'=>$menu->submenu])
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <!-- /horizontal menu content-->
    </div>
@endif

{{-- vertical-box-menu --}}
@if($configData['mainLayoutType'] == 'vertical-menu-boxicons')
    <div
        class="main-menu menu-fixed @if($configData['theme'] === 'light') {{"menu-light"}} @else {{'menu-dark'}} @endif menu-accordion menu-shadow"
        data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{asset('/')}}">
                        <div class="brand-logo">
                            <img src="{{asset('images/logo/logo.svg')}}" class="logo" alt="">
                        </div>
                        <h2 class="brand-text mb-0">
                        </h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                            data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="">
                @if(!empty($menuData[2]) && isset($menuData[2]))
                    @foreach ($menuData[2]->menu as $menu)
                        @if(isset($menu->navheader))
                            <li class="navigation-header text-truncate"><span>{{$menu->navheader}}</span></li>
                        @else
                            <li class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                                <a href="@if(isset($menu->url)){{route($menu->url)}} @endif" @if(isset($menu->newTab)){{"target=_blank"}}@endif>
                                    @if(isset($menu->name))
                                        <span class="menu-title text-truncate">{{ __($menu->name)}}</span>
                                    @endif
                                    @if(isset($menu->tag))
                                        <span class="{{$menu->tagcustom}} ml-auto">{{$menu->tag}}</span>
                                    @endif
                                </a>
                                @if(isset($menu->submenu))
                                    @include('panels.sidebar-submenu',['menu' => $menu->submenu])
                                @endif
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endif
