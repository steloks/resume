<div class="row">
  <div class="col-12">
    <div class="row my-3r">
      <div class="col-12 text-center">
        <img src="{{ asset('images/logo/order/success-dog.png') }}" alt="Pet pic">
      </div>
    </div>
    <div class="row">
      <div class="col-12 ff-fptdemi fz-30xr mb-2r text-center">
        Thank you for your order!
      </div>
      <div class="col-12 text-center">
        Your order <strong>#{{ $order->id }}</strong> has been successfully received! You will receive an email with your order confirmation. You can also track your order in My orders menu in your profile.
      </div>
    </div>
  </div>
  <div class="col-12 text-center my-3r">
    <a href="{{ route('profile.orders') }}" class="btn btn-df-lbr btn-sq-lp">to my orders</a>
  </div>
</div>