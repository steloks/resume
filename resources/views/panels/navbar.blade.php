{{-- navabar  --}}
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu
@if(isset($configData['navbarType'])){{$configData['navbarClass']}} @endif"
data-bgcolor="@if(isset($configData['navbarBgColor'])){{$configData['navbarBgColor']}}@endif">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
          </ul>
					<!--
          <ul class="nav navbar-nav bookmark-icons">
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{asset('app/email')}}" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon bx bx-envelope"></i></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{asset('app/chat')}}" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon bx bx-chat"></i></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{asset('app/todo')}}" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon bx bx-check-circle"></i></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{asset('app/calendar')}}" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon bx bx-calendar-alt"></i></a></li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon bx bx-star warning"></i></a>
              <div class="bookmark-input search-input">
                <div class="bookmark-input-icon"><i class="bx bx-search primary"></i></div>
                <input class="form-control input" type="text" placeholder="Explore Frest..." tabindex="0" data-search="template-search">
                <ul class="search-list"></ul>
              </div>
            </li>
          </ul>
					-->
        </div>
        <ul class="nav navbar-nav float-right">

          <li class="dropdown dropdown-language nav-item">
            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="flag-icon flag-icon-us"></i><span class="selected-language">{{ session('locale') == 'en' ? __('English') : __('Bulgarian') }}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
              <a class="dropdown-item" href="{{ route('admin.setLocale', ['locale' => 'en' ]) }}" data-language="en">
                <i class="flag-icon flag-icon-us mr-50"></i> {{ __('English') }}
              </a>
              <a class="dropdown-item" href="{{ route('admin.setLocale', ['locale' => 'bg' ]) }}" data-language="bg">
                <i class="flag-icon flag-icon-bg mr-50"></i> {{ __('Bulgarian') }}
              </a>
            </div>
          </li>
{{--          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>--}}
{{--          <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon bx bx-search"></i></a>--}}
{{--            <div class="search-input">--}}
{{--              <div class="search-input-icon"><i class="bx bx-search primary"></i></div>--}}
{{--              <input class="input" type="text" placeholder="Explore Frest..." tabindex="-1" data-search="template-search">--}}
{{--              <div class="search-input-close"><i class="bx bx-x"></i></div>--}}
{{--              <ul class="search-list"></ul>--}}
{{--            </div>--}}
{{--          </li>--}}
            @if(\Illuminate\Support\Facades\Auth::guard('admin')->user()->hasRole('Admin'))

            <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                  <i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i>
                  <span class="badge badge-pill badge-white badge-up txt-d3 to-remove-notification-when-checked">{{ getAdminNotifications()->where('checked', 0)->count() }}</span>
              </a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
						<!--
              <li class="dropdown-menu-header">
                <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">7 new Notification</span><span class="text-bold-400 cursor-pointer">Mark all as read</span></div>
              </li>
							-->
              <li class="scrollable-container media-list">
                  @foreach(getAdminNotifications()->where('checked', 0) as $notification)
                      @if($notification->type == 'order')
                          @if($notification->order->status->name == 'Cancelled')
                              <div class="d-flex justify-content-between dv-link">
                                  <div class="media d-flex align-items-center">
                                      <div class="media-left pr-0">
                                          <div class="mr-1 m-0">
                                              <i class="ficon bx bx-note clr-d3"></i>
                                          </div>
                                      </div>

                                      <div class="media-body">
                                          <h5 class="media-heading"><span
                                                  class="text-bold-600">{{ __('Order №') . $notification->order->id . ' ' . __('has been cancelled') }}</span>
                                          </h5>
                                          {{--                                      <div class="mb-0d6"><small class="notification-text">{{ $notification->order->comment }}.</small></div>--}}
                                          <div><small
                                                  class="notification-text clr-g97">{{ parseDate($notification->created_at) }}</small>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @else
                              <div class="d-flex justify-content-between dv-link">
                                  <div class="media d-flex align-items-center">
                                      <div class="media-left pr-0">
                                          <div class="mr-1 m-0">
                                              <i class="ficon bx bx-note clr-d3"></i>
                                          </div>
                                      </div>

                                      <div class="media-body">
                                          <h5 class="media-heading"><span
                                                  class="text-bold-600">{{ __('Comment on Order #') . $notification->order->id }}</span>
                                          </h5>
                                          <div class="mb-0d6"><small
                                                  class="notification-text">{{ $notification->order->comment }}.</small>
                                          </div>
                                          <div><small
                                                  class="notification-text clr-g97">{{ parseDate($notification->created_at) }}</small>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endif
                      @elseif($notification->type == 'order_menu')
{{--                          todo wierd bug for now just check if order exists--}}
                          @if(!empty($notification->orderMenu) && !empty($notification->order))
                          <div class="d-flex justify-content-between dv-link">
                              <div class="media d-flex align-items-center">
                                  <div class="media-left pr-0">
                                      <div class="mr-1 m-0">
                                          <i class="ficon bx bx-note clr-d3"></i>
                                      </div>
                                  </div>

                                  <div class="media-body">
                                      <h5 class="media-heading"><span
                                              class="text-bold-600">{{ __('Cancelled Menu №') . $notification->orderMenu->order_id }}</span></h5>
                                      <div class="mb-0d6"><small class="notification-text">{{ $notification->order->comment }}.</small></div>
                                      <div><small class="notification-text clr-g97">{{ parseDate($notification->created_at) }}</small></div>
                                  </div>
                              </div>
                          </div>
                              @endif
                      @else
                          <div class="d-flex justify-content-between dv-link">
                              <div class="media d-flex align-items-center">
                                  <div class="media-left pr-0">
                                      <div class="mr-1 m-0">
                                          <i class="ficon bx bx-info-circle clr-d3"></i>
                                      </div>
                                  </div>
                                  <div class="media-body">
                                      <h5 class="media-heading"><span class="text-bold-600">{{ __('Change in weight for') . ' ' . ucfirst($notification->pet->name) }}</span>
                                      </h5>
                                      <div class="mb-0d6"><small class="notification-text">{{ __('The weigh level') }} {!! parseEditRoute('clients-pets', $notification->pet->id, ucfirst($notification->pet->name)) !!}

                                              {{ __('has been changed from') . ' ' . \App\Models\UserPetHistory::$weightLvl[optional($notification->pet->history->sortByDesc('id')->take(2)->first())->value ?? 1] . ' ' . __('to') . ' '  .
                                    \App\Models\Pet::$weightLvl[optional($notification->pet->history->sortByDesc('id')->take(2)->last())->value ?? 1]}}</small></div>
                                      <div><small class="notification-text clr-g97">{{ parseDate($notification->created_at)  }}</small></div>
                                  </div>
                              </div>
                          </div>
                      @endif

                  @endforeach
              </li>
              <li class="dropdown-menu-footer"><a class="dropdown-item p-1 link-d0 fz-1 fw-600 justify-content-center" href="{{ route('admin.dashboard-index') }}">{{ __('See all notifications') }}</a></li>
            </ul>
          </li>
            @endif

            <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none admin-class-dont-touch">
                <span class="user-name">{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->name }}</span>
                <span class="user-status">{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->roles->pluck('name')->unique()->implode(',') }}</span>

              </div>
{{--              <span><img class="round" src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40"></span>--}}
            </a>
            <div class="dropdown-menu dropdown-menu-right pb-0">
              {{--
              <a class="dropdown-item" href="{{asset('page/user/profile')}}">
                <i class="bx bx-user mr-50"></i> Edit Profile
              </a>
              <a class="dropdown-item" href="{{asset('app/email')}}">
                <i class="bx bx-envelope mr-50"></i> My Inbox
              </a>
              <a class="dropdown-item" href="{{asset('app/todo')}}">
                <i class="bx bx-check-square mr-50"></i> Task</a>
                <a class="dropdown-item" href="{{asset('app/chat')}}"><i class="bx bx-message mr-50"></i> Chats
              </a>
              <div class="dropdown-divider mb-0"></div>
              --}}
              <a class="dropdown-item" href="{{route('auth.logout',['isAdmin'=>true])}}"><i class="bx bx-power-off mr-50"></i> Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
