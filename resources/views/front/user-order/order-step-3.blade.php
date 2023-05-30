<div class="row mw-800x mx-auto">
    <div class="col-12 text-center mb-3r">
        <h2 class="ff-fptdemi">Choose a payment method</h2>
    </div>
    <div class="col-12">
        <div class="row mb-3">
            <div class="col-12 col-md-6 mb-3 text-center">
                <div class="form-check">
                    <input class="form-check-input vsb-hidden radio-payment-type" type="radio" name="payment" id="bank" value="bank">
                    <label class="form-check-label crs-pointer slt-card-order" for="bank">
                        <img src="{{ asset('images/logo/order/card.png') }}" alt="Pet pic">
                    </label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 text-center">
                <div class="form-check">
                    <input class="form-check-input vsb-hidden radio-payment-type" type="radio" name="payment" id="paypal-input" value="paypal">
                    <label class="form-check-label crs-pointer slt-card-order" for="paypal-input">
                        <img src="{{ asset('images/logo/order/paypal.png') }}" alt="Pet pic">
                    </label>
                </div>
            </div>
        </div>
        <div class="row mt-2r mb-3">
            <div class="col-12 mb-3 text-center">

            </div>
            <div class="col-12 text-center">
                <h3 class="ff-fptdemi">Add a comment</h3>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <textarea class="form-control" id="3" rows="8" name="comment"></textarea>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="agreed_terms" name="agreed_terms">
                <label class="form-check-label" for="agreed_terms">
                    I agree with the <a href="{{ url('terms-and-conditions') }}" target="_blank" class="df-blink"><strong>Terms of use</strong></a>
                </label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="agreed_privacy" name="agreed_privacy">
                <label class="form-check-label" for="agreed_privacy">
                    I agree with the <a href="{{ url('privacy-policy') }}" target="_blank" class="df-blink"><strong>Privacy policy</strong></a>
                </label>
            </div>
        </div>
    </div>
    <div class="row mb-3r mx-auto">
        <div class="col-12 text-center">
            <div class="d-none" id="paypal-button-container" data-user-id="{{ auth()->id() }}" data-paypal-create="{{ route('paypal.paypalCreate') }}" data-paypal-capture="{{ route('paypal.paypalCapture') }}"></div>
            <button type="submit" class="btn btn-df-lbr btn-sq-lp btn-submit-order">complete order</button>
        </div>
    </div>
</div>
