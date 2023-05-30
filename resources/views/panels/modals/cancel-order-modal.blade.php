<div class="modal fade df-modal" id="dfCancelOrderModal" tabindex="-1" aria-labelledby="dfCancelOrderModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('order.confirmCancelOrder') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <div class="mb-2r text-center">
                        <h2 class="ff-fptdemi">Are you sure you would like to cancel this order?</h2>
                    </div>
                    <div class="mb-2r text-center class-to-append-to">
                        <span>Please note that you can cancel orders not later than 48 hours before the chosen time slot for delivery.</span>
                    </div>
                    <div class="mb-1r text-center">
                        <button type="submit" id="" class="btn btn-df-wine btn-sq-lp-l confirm-canceled-order" {{ count($orderRecipesStillOn) == 0 ? 'disabled' : '' }}
                        >CONFIRM
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
