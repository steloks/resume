<div class="modal fade df-modal" id="goToCartModal" tabindex="-1" aria-labelledby="goToCartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
				<div class="mb-2r text-center">
          <img class="img-fluid" src="{{ asset('images/icon/modals/icon-food-package.png') }}" alt="Icon">
				</div>
				<div class="mb-2r text-center ff-fptdemi fz-26xr go-to-cart-modal-message">

				</div>
					<div class="mb-1r text-center">
            <button type="button" id="go-to-cart-from-modal" class="btn w-100 btn-df-lbr btn-sq-lp" data-url="{{ route('order.cart') }}">Go to cart</button>
					</div>
					<div class="text-center">
            <button type="button" id="" class="btn w-100 btn-df-wdgb btn-sq-lp" data-bs-dismiss="modal">Continue shopping</button>
					</div>
      </div>
    </div>
  </div>
</div>
