<div class="u-profile-m h-100">
  <ul class="list-unstyled text-uppercase py-2r px-2r fw-normal pb-1 small">
    <li class="u-profile-mitem">
      <a href="{{ route('profile.index') }}" class="d-inline-flex align-items-center {{ activeRouteClass('index') }}">
        <img src="{{ asset('images/icon/user/menu/personal-details.png') }}" class="img-fluid usm-icon w-24x" alt="icon">
        Personal details
      </a>
    </li>
    <li class="u-profile-mitem">
      <a href="{{ route('profile.addresses') }}" class="d-inline-flex align-items-center {{ activeRouteClass('addresses') }}">
        <img src="{{ asset('images/icon/user/menu/addresses.png') }}" class="img-fluid usm-icon w-24x" alt="icon">
        My Addresses
      </a>
    </li>
    <li class="u-profile-mitem">
      <a href="{{ route('profile.orders') }}" class="d-inline-flex align-items-center {{ activeRouteClass('orders') }}">
        <img src="{{ asset('images/icon/user/menu/order.png') }}" class="img-fluid usm-icon w-24x" alt="icon">
        My orders
      </a>
    </li>
    <li class="u-profile-mitem">
      <a href="{{ route('profile.pets') }}" class="d-inline-flex align-items-center {{ activeRouteClass('pets') }}">
        <img src="{{ asset('images/icon/user/menu/pets-profile.png') }}" class="img-fluid usm-icon w-24x" alt="icon">
        Pets profiles
      </a>
    </li>
    <li class="u-profile-mitem">
      <a href="{{ route('profile.favourites') }}" class="d-inline-flex align-items-center {{ activeRouteClass('favourites') }}">
        <img src="{{ asset('images/icon/user/menu/favourites.png') }}" class="img-fluid usm-icon w-24x" alt="icon">
        Favourites
      </a>
    </li>
    <li class="u-profile-mitem">
      <hr>
      <a href="{{ route('auth.logout') }}" class="d-block-flex align-items-center {{ activeRouteClass('favourites') }}">
        <div class="fw-600"><img src="{{ asset('images/icon/user/menu/sign-out.png') }}" class="img-fluid usm-icon w-24x mr-i-0d5r" alt="icon"><span>{{ ucfirst(auth()->user()->name . ' ' . auth()->user()->last_name) }}</span></div>
        <div class="pl-24x ml-0d5r">Log out</div>
      </a>
    </li>
  </ul>
</div>
