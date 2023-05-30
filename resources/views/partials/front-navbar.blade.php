<div class="container-fluid top-bar">
    <div class="row">
        <div class="col-12">
            WE ARE CURRENTLY DELIVERING TO THE CM13, CM14 AND CM15 AREAS. ORDERS FOR THE NEXT DAY ARE ACCEPTED UNTIL 16:00.
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-0 shadow-sm-ctm" aria-label="Main navigation">
    <div class="container container-mob">
        <button class="navbar-toggler p-0 border-0 noselect" type="button" id="navbar-mobile" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{asset('images/logo/dogfood.png')}}" class="img-fluid mw-d80x-m56x" alt="DogFood">
        </a>
        <div class="navbar-collapse offcanvas-collapse" id="navbar-top">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/our-beliefs">Our beliefs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/our-philosophy">Our philosophy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/our-menus">Our menus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <li class="nav-item dd-n-md-b">
                @if(! auth()->check())
                    <a class="btn btn-df-wine btn-sq-tb-f nav-link position-relative mt-3" href="#">Order menu</a>
                @else
                    <a class="btn btn-df-wine btn-sq-tb-f nav-link position-relative mt-3" href="{{route('order.index')}}">Order menu</a>
                @endif
                </li>
            </ul>
        </div>
        @if(! auth()->check())
        <!-- Not logged in user - begin -->
        <li class="nav-item list-unstyled">
            <a class="position-relative btn btn-df-lbr btn-sq-tb nav-link df-blink" data-bs-toggle="modal" data-bs-target="#dfUserLogin" href="javascript:void(0)" data-dismiss="modal">Log in</a>
        </li>
        <li class="nav-item list-unstyled dd-b-md-n">
            <a class="btn btn-df-wine btn-sq-tb-f nav-link position-relative ml-1r" href="#">Order menu</a>
        </li>
        <!-- Not logged in user - end -->
        @else
        <!-- Logged in user - begin -->
        <ul class="list-group list-group-horizontal top-ubar">
            <li class="nav-item dropdown list-unstyled">
                <a class="nav-link dropdown-toggle" id="top-user-nav" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.00448 15.6753C8.09438 15.5834 8.20168 15.5103 8.32012 15.4603C8.43855 15.4103 8.56576 15.3844 8.69432 15.384C8.82288 15.3837 8.95022 15.4089 9.06893 15.4583C9.18764 15.5077 9.29533 15.5802 9.38573 15.6716C9.47614 15.763 9.54744 15.8715 9.5955 15.9907C9.64355 16.1099 9.66738 16.2376 9.66562 16.3661C9.66385 16.4947 9.63651 16.6216 9.58519 16.7394C9.53388 16.8573 9.45962 16.9638 9.36673 17.0527C8.54484 17.8615 7.89277 18.8262 7.44878 19.8904C7.0048 20.9546 6.77784 22.0967 6.78124 23.2498C6.78124 24.4347 10.1776 26.156 15.5 26.156C20.8224 26.156 24.2187 24.4338 24.2187 23.2479C24.222 22.1027 23.9981 20.9683 23.5599 19.9102C23.1218 18.8522 22.4782 17.8916 21.6663 17.084C21.5744 16.9945 21.5013 16.8876 21.4511 16.7696C21.4009 16.6515 21.3746 16.5247 21.3738 16.3965C21.373 16.2682 21.3977 16.1411 21.4464 16.0225C21.4951 15.9038 21.5668 15.796 21.6575 15.7053C21.7482 15.6147 21.856 15.5429 21.9747 15.4942C22.0933 15.4455 22.2204 15.4208 22.3487 15.4216C22.4769 15.4224 22.6037 15.4487 22.7218 15.4989C22.8398 15.5491 22.9467 15.6222 23.0362 15.7141C24.0287 16.7014 24.8156 17.8758 25.3511 19.1694C25.8867 20.4629 26.1604 21.8498 26.1562 23.2498C26.1562 26.3959 20.6663 28.0935 15.5 28.0935C10.3336 28.0935 4.84374 26.3959 4.84374 23.2498C4.83943 21.8404 5.11682 20.4443 5.6596 19.1435C6.20238 17.8428 6.99961 16.6636 8.00448 15.6753Z" fill="#ffffff" />
                        <path d="M15.5 16.4687C14.1588 16.4687 12.8477 16.071 11.7325 15.3258C10.6174 14.5807 9.7482 13.5216 9.23494 12.2825C8.72168 11.0434 8.58739 9.67992 8.84905 8.36448C9.11071 7.04905 9.75656 5.84075 10.7049 4.89237C11.6533 3.944 12.8616 3.29815 14.177 3.03649C15.4925 2.77484 16.856 2.90913 18.0951 3.42238C19.3342 3.93564 20.3933 4.80481 21.1384 5.91998C21.8835 7.03515 22.2812 8.34624 22.2812 9.68744C22.2792 11.4853 21.5641 13.2089 20.2928 14.4802C19.0215 15.7515 17.2979 16.4666 15.5 16.4687ZM15.5 4.84369C14.542 4.84369 13.6055 5.12777 12.809 5.66001C12.0124 6.19225 11.3916 6.94874 11.025 7.83382C10.6583 8.7189 10.5624 9.69281 10.7493 10.6324C10.9362 11.572 11.3975 12.4351 12.075 13.1125C12.7524 13.7899 13.6154 14.2512 14.555 14.4381C15.4946 14.625 16.4685 14.5291 17.3536 14.1625C18.2387 13.7959 18.9952 13.175 19.5274 12.3785C20.0597 11.5819 20.3438 10.6454 20.3438 9.68744C20.3422 8.40326 19.8314 7.17212 18.9234 6.26406C18.0153 5.35601 16.7842 4.8452 15.5 4.84369Z" fill="#ffffff" />
                    </svg>
                    <span class="va-center dd-b-md-n">My profile</span>
                </a>
                <ul class="dropdown-menu shadow-sm" aria-labelledby="top-user-nav" data-bs-popper="none">
                    <li>
                        <div class="text-capitalize fw-600-i dropdown-item">{{ ucfirst(auth()->user()->name . ' ' . auth()->user()->last_name) }}</div><hr>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                            <img src="{{ asset('images/icon/user/menu/personal-details.png') }}" class="img-fluid utm-icon w-24x" alt="icon">
                            Personal details
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.addresses') }}">
                            <img src="{{ asset('images/icon/user/menu/addresses.png') }}" class="img-fluid utm-icon w-24x" alt="icon">
                            My Addresses
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.orders') }}">
                            <img src="{{ asset('images/icon/user/menu/order.png') }}" class="img-fluid utm-icon w-24x" alt="icon">
                            My orders
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.pets') }}">
                            <img src="{{ asset('images/icon/user/menu/pets-profile.png') }}" class="img-fluid utm-icon w-24x" alt="icon">
                            Pets profiles
{{--                            maybe change this, is not good--}}
                            @if(\App\Models\Pet::query()->where('weight_notification', 'new')->count() > 0)
                                <span class="rounded-circle circle-24x-wine">1</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.favourites') }}">
                            <img src="{{ asset('images/icon/user/menu/favourites.png') }}" class="img-fluid utm-icon w-24x" alt="icon">
                            Favourites
                        </a>
                    </li>
                    <li>
                        <hr>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}">
                            <img src="{{ asset('images/icon/user/menu/sign-out.png') }}" class="img-fluid utm-icon w-24x" alt="icon">
                            Log out
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item list-unstyled">
{{--                <a class="nav-link position-relative ml-1r" href="#">--}}
{{--                    //todo navbar cart to cart--}}
                <a class="nav-link position-relative ml-1r" href="{{ (!empty(session('orderStep')) && session('orderStep') == 3) ? route('order.index') : '#' }}">
                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.4257 8.93762H23.0863C24.2338 8.93762 25.1863 9.8245 25.2682 10.9695L26.3394 25.9695C26.3826 26.5751 26.1726 27.1714 25.7588 27.6158C25.3445 28.0601 24.7651 28.3126 24.1576 28.3126H6.84258C6.23508 28.3126 5.6557 28.0601 5.24133 27.6158C4.82758 27.1714 4.61759 26.5751 4.66071 25.9695L5.73195 10.9695C5.81383 9.8245 6.76633 8.93762 7.91383 8.93762H9.56258V8.62512C9.56258 5.34575 12.2207 2.68762 15.5001 2.68762C18.6595 2.68762 21.5795 5.20387 21.4376 8.62512C21.4332 8.72887 21.4294 8.83325 21.4257 8.93762ZM9.56258 10.8126V15.5001C9.56258 16.0176 9.98258 16.4376 10.5001 16.4376C11.0176 16.4376 11.4376 16.0176 11.4376 15.5001V10.8126H19.5626V15.5001C19.5626 16.0176 19.9826 16.4376 20.5001 16.4376C21.0176 16.4376 21.4376 16.0176 21.4376 15.5001C21.4376 15.5001 21.3563 13.3095 21.3832 10.8126H23.0863C23.2501 10.8126 23.3863 10.9395 23.3976 11.1026L24.4695 26.1026C24.4757 26.1895 24.4457 26.2745 24.3863 26.3383C24.3269 26.4014 24.2444 26.4376 24.1576 26.4376H6.84258C6.75571 26.4376 6.67321 26.4014 6.61383 26.3383C6.55446 26.2745 6.52444 26.1895 6.53069 26.1026L7.60258 11.1026C7.61384 10.9395 7.75008 10.8126 7.91383 10.8126H9.56258ZM11.4376 8.93762V8.62512C11.4376 6.38137 13.2563 4.56262 15.5001 4.56262C17.7438 4.56262 19.5626 6.38137 19.5626 8.62512V8.93762H11.4376Z" fill="#ffffff" />
                    </svg>
                    <span class="va-center dd-b-md-n">Cart</span>
                    <span class="rounded-circle circle-24x-wine top-cart-notification d-none"></span>
                </a>
            </li>
            <li class="nav-item list-unstyled dd-b-md-n">
                <a class="btn btn-df-wine btn-sq-tb-f nav-link position-relative ml-1r" href="{{route('order.index')}}">Order menu</a>
            </li>
        </ul>
        <!-- Logged in user - end -->
        @endif
    </div>
</nav>
