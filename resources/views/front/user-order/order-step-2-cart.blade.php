<div class="row mb-3r">
  <div class="col-12 col-md-8">
    <div class="row">
      <div class="col-12 mb-2r">
        <span>
          <svg width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.8058 6.62364L20.7881 6.59294C20.7635 6.54189 20.7351 6.493 20.7034 6.44654L17.3645 0.674064C17.124 0.258282 16.6762 0 16.1959 0H4.70509C4.22401 0 3.77588 0.258891 3.53546 0.675798L0.142172 6.56265C0.11161 6.61572 0.0895783 6.67122 0.0740157 6.72761C0.02625 6.85656 0 6.99592 0 7.14133V22.346C0 23.258 0.741986 24 1.65399 24H19.2464C20.1584 24 20.9004 23.258 20.9004 22.346V7.08559C20.9004 7.0652 20.8998 7.04495 20.8987 7.0248C20.9083 6.88947 20.8789 6.74992 20.8058 6.62364ZM11.1777 1.40677H16.1632L18.7897 5.9477H11.1777V1.40677ZM4.73786 1.40677H9.77088V5.9477H2.12035L4.73786 1.40677ZM19.4936 22.346C19.4936 22.4823 19.3827 22.5932 19.2464 22.5932H1.65399C1.51768 22.5932 1.40677 22.4823 1.40677 22.346V7.35447H19.4936V22.346Z" fill="#C59F7B" />
          </svg>
        </span>
        <span class="fz-20xr pl-0d4r va-center ff-fptdemi">Order summary</span>
      </div>
      <div class="col-12">
        <div class="row">
          <div class="col-12 text-left dd-b-md-n">
            <div class="row">
              <div class="col-12 col-md-3 text-uppercase">
                Product
              </div>
              <div class="col-12 col-md-2 text-uppercase">
                Grams
              </div>
                <div class="col-12 col-md-3 text-uppercase">
                Date of delivery
              </div>
              <div class="col-12 col-md-2 text-uppercase">
                Pet
              </div>
              <div class="col-12 col-md-1 text-uppercase">
                Price
              </div>
              <div class="col-12 col-md-1 text-uppercase ta-dc-ml">
                Remove
              </div>
            </div>
          </div>
          <div class="col-12">
            <hr>
          </div>
            @foreach($orders as $order)
          <div class="col-12 position-relative text-left">
            <div class="row">
              <div class="col-12 col-md-3 mb-0d5r">
                <div class="mb-0d5r title-order-summary-item"><strong>{{$order['recipeName']}}</strong></div>
                <div>Time slot: {{$order['timeSlot']}}</div>
              </div>
              <div class="col-12 col-md-3 mb-0d5r">
                  <div>{{parseNumber($order['grams'])}}</div>
              </div>
                <div class="col-12 col-md-2 mb-0d5r">
                    <div>{{$order['date']}}</div>
                </div>
              <div class="col-12 col-md-2 mb-0d5r">
                <div>{{$order['petName']}}</div>
              </div>
              <div class="col-12 col-md-1 mb-0d5r">
                <div>{{$order['price']}}</div>
              </div>
              <div class="col-12 col-md-1 ta-dc-ml mb-0d5r">
                <div class="del-order-item" data-url="{{ route('order.deleteCartItem', ['id' => $order['recipeId']]) }}">
                  <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0_810_10165)"> <path d="M8.74761 7.50047L14.7413 1.50683C15.0862 1.16184 15.0862 0.604221 14.7413 0.259231C14.3963 -0.0857592 13.8386 -0.0857592 13.4937 0.259231L7.50001 6.25287L1.50634 0.259231C1.16135 -0.0857592 0.603732 -0.0857592 0.258742 0.259231C-0.0862475 0.604221 -0.0862475 1.16184 0.258742 1.50683L6.25239 7.50047L0.258742 13.4941C-0.0862475 13.8391 -0.0862475 14.3967 0.258742 14.7417C0.430798 14.9138 0.65667 15.0002 0.882542 15.0002C1.10841 15.0002 1.33429 14.9137 1.50634 14.7417L7.49998 8.74807L13.4936 14.7417C13.6657 14.9138 13.8916 15.0002 14.1174 15.0002C14.3433 15.0002 14.5692 14.9137 14.7412 14.7417C15.0862 14.3967 15.0862 13.8391 14.7412 13.4941L8.74761 7.50047Z" fill="#803134"/> </g> <defs> <clipPath id="clip0_810_10165"> <rect width="15" height="15" fill="white"/> </clipPath> </defs> </svg>
              </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <hr>
          </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 py-2r px-1r brd-lgry-1">
    <div class="row mb-1r">
      <div class="col-6">
        <h3>Cost:</h3>
      </div>
      <div class="col-6 txt-right">
        £{{$cost}}
      </div>
    </div>
    <div class="row mb-1r">
      <div class="col-6">
        <h3>Delivery:</h3>
      </div>
      <div class="col-6 txt-right">
          <input type="hidden" name="delivery_price" value="{{ $deliveryPrice }}">
        £{{$deliveryPrice}}
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <h3>VAT:</h3>
      </div>
      <div class="col-6 txt-right">
          <input type="hidden" name="vat" value="{{ $vat }}">
          £{{$vat}}
      </div>
    </div>
    <div class="row mb-1r">
      <div class="col-12">
        <hr>
      </div>
    </div>
    <div class="row mb-2r">
      <div class="col-6">
        <h3>Total cost:</h3>
      </div>
      <div class="col-6 txt-right">
          <input type="hidden" name="total_amount" value="{{ $totalCost }}">
        £{{$totalCost}}
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-df-lbr w-100 btn-sq-lp proceed-to-checkout-js" data-url="{{ route('order.checkoutOrderStep') }}">PROCEED to checkout</button>
      </div>
    </div>
  </div>
</div>
