<div class="row">
  <div class="col-12 text-center mb-3r">
    <h2>Choose a payment method</h2>
  </div>
  <div class="col-12">
    <div class="row mb-3">
      <div class="col-12 col-md-6 mb-3 text-center">
        <div class="form-check">
          <input class="form-check-input vsb-hidden" type="radio" name="r1" id="1" value="ro1">
          <label class="form-check-label crs-pointer slt-card-order" for="1">
            <img src="{{ asset('images/logo/order/card.png') }}" alt="Pet pic">
          </label>
        </div>
      </div>
      <div class="col-12 col-md-6 mb-3 text-center">
        <div class="form-check">
          <input class="form-check-input vsb-hidden" type="radio" name="r1" id="2" value="ro2">
          <label class="form-check-label crs-pointer slt-card-order" for="2">
            <img src="{{ asset('images/logo/order/paypal.png') }}" alt="Pet pic">
          </label>
        </div>
      </div>
    </div>
    <div class="row mt-2r mb-3">
      <div class="col-12 mb-3 text-center">
        Once you click on complete order you will be transferred to PayPal to complete your order.
      </div>
      <div class="col-12 text-center">
        <h3>Add a comment</h3>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-12">
        <textarea class="form-control" id="3" rows="8"></textarea>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="4" name="4">
        <label class="form-check-label" for="4">
          I agree with the <a href="#" class="df-blink"><strong>Terms of use</strong></a>
        </label>
      </div>
    </div>
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="5" name="5">
        <label class="form-check-label" for="5">
          I agree with the <a href="#" class="df-blink"><strong>Privacy policy</strong></a>
        </label>
      </div>
    </div>
  </div>
  <div class="row mb-3r">
    <div class="col-12 text-center">
      <button type="submit" class="btn btn-df-lbr btn-sq-lp">complete order</button>
    </div>
  </div>
</div>
</div>