<div class="modal fade df-modal df-mdl-lsf" id="dfCancelMenu" tabindex="-1" aria-labelledby="dfCancelMenuLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{ route('order.confirmCancelMenu') }}" method="POST">
              @csrf
        <div class="mb-1r text-center">
          <h2 class="ff-fptdemi">Cancel a menu</h2>
        </div>
        <div class="mb-3r text-center">
          {{ __('Please note that you can cancel ordered menus until 16:00 the previous day of the selected delivery date and time interval.') }}
        </div>
        <div class="col-12 mb-3r">
          <div class="row">
            <div class="col-12 text-left">
              <div class="row">
                <div class="col-12 col-md-3 text-uppercase">
                  Product
                </div>
                <div class="col-12 col-md-3 text-uppercase">
                  Date of delivery
                </div>
                <div class="col-12 col-md-2 text-uppercase">
                  Pet
                </div>
                <div class="col-12 col-md-2 text-uppercase">
                  Price
                </div>
                <div class="col-12 col-md-2 text-uppercase ta-dc-ml">
                </div>
              </div>
            </div>
            <div class="col-12">
              <hr>
            </div>
              @foreach($order->recipes as $orderRecipe)
                  <div class="col-12 text-left">
              <div class="row">
                <div class="col-12 col-md-3">
                    <div class="mb-0d5r"><strong>{{ $orderRecipe->recipe_name }}</strong></div>
                    <div>Time slot: {{ $orderRecipe->timeslot->start_at  . ' - ' . $orderRecipe->timeslot->end_at }}</div>
                </div>
                  <div class="col-12 col-md-3 mb-0d5r">
                      <div>{{ parseDate($orderRecipe->date) }}</div>
                  </div>
                  <div class="col-12 col-md-2 mb-0d5r">
                      <div>{{ $orderRecipe->pet->name }}</div>
                  </div>
                  <div class="col-12 col-md-2 mb-0d5r">
                      <div>{!! parsePrice($orderRecipe->price) !!}</div>
                  </div>
                <div class="col-12 col-md-2 ta-dc-ml">
                    @if(getMenusDate() < $orderRecipe->date)
                        <input type="hidden" name="canceled_menus[{{ $orderRecipe->order_id }}][{{ $orderRecipe->id }}][]" value="0">
                        <div id="" class="text-uppercase clr-grey-bd {{ $orderRecipe->status->name !== 'Cancelled' ? 'js-order-cancel-menu' : '' }}">
                            @if(!\Illuminate\Support\Str::contains($orderRecipe->status->name, ['canceled', 'Cancelled', 'canceled', 'Canceled']))
                                CANCEL MENU
                            @else
                                CANCELLED
                            @endif
                        </div>
                    @else
                        <div id="" class="text-uppercase clr-grey-bd" title="{{ __('Please note that this menu cannot be canceled as there is 48 hours until delivery.') }}">
                            @if(\Illuminate\Support\Str::contains($orderRecipe->status->name, ['canceled', 'Cancelled', 'canceled']))
                                CANCEL MENU
                            @else
                                CANCEL MENU
                            @endif
                        </div>
                    @endif
                </div>
              </div>
            </div>
                  <div class="col-12">
                      <hr>
                  </div>
              @endforeach
          </div>
        </div>
        <div class="mb-1r text-center">
          <button type="submit" id="" class="btn btn btn-df-wine btn-sq-lp-l confirm-canceled-menus" {{ $order->status->name !== 'Cancelled' ? '' : 'disabled' }}>CONFIRM</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
