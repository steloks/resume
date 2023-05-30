<tr class="menu-recipes">
    <td colspan="12">
        <form action="{{ route('admin.order-menus.markRecipeAsReturned', ['orderId' => $order->id, ]) }}" method="POST">
            @csrf
            <div class="row mb-2r">
                <div class="col-12">
                    <div class="row m-0 py-2r px-2r wbr-0d7r">
                        <div class="col-12 mb-1r">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 text-left dd-b-md-n">
                                        <div class="row">
                                            <div class="col-1  text-uppercase">
                                                {{ __('Menu №') }}
                                            </div>
                                            <div class="col-3  text-uppercase">
                                                {{ __('Menu name') }}
                                            </div>
                                            <div class="col-1  text-uppercase">
                                                {{ __('Pet') }}
                                            </div>
                                            <div class="col-2  text-uppercase">
                                                {{ __('Delivery date') }}
                                            </div>
                                            <div class="col-1  text-uppercase">
                                                {{ __('Menu status') }}
                                            </div>
                                            <div class="col-1  text-uppercase ta-dc-ml">
                                                {{ __('Payment status') }}
                                            </div>
                                            <div class="col-1  text-uppercase ta-dc-ml">
                                                {{ __('Date of payment status') }}
                                            </div>
                                            <div class="col-1  text-uppercase ta-dc-ml">
                                                {{ __('Price') }}
                                            </div>
                                            <div class="col-1  text-uppercase ta-dc-ml">
                                                {{ __('Returned amount') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                    @foreach($recipes as $orderRecipe)
                                        @if($orderRecipe->status->id === $statusCanceledId)
                                            <input type="hidden" name="order_recipe_id[]"
                                                   value="{{ $orderRecipe->id }}">
                                        @endif
                                        <div class="col-12 text-left">
                                            <div class="row">
                                                <div class="col-1  mb-0d5r">
                                                    <div>{{ $orderRecipe->order_id . '-0' . $orderRecipe->id }}</div>
                                                </div>
                                                <div class="col-3  mb-0d5r">
                                                    <div class="mb-0d5r">
                                                        <strong>{{ $orderRecipe->recipe_name }}</strong></div>
                                                </div>
                                                <div class="col-1  mb-0d5r">
                                                    <div>{{ $orderRecipe->pet->name }}</div>
                                                </div>
                                                <div class="col-2  mb-0d5r">
                                                    <div>{{ parseDate($orderRecipe->date) }}</div>
                                                </div>
                                                <div class="col-1  mb-0d5r">
                                                    <div
                                                        class="text-uppercase lbl-os-{{ badgeColor($orderRecipe->status->name) }}">{{ $orderRecipe->status->name }}</div>
                                                </div>
                                                <div class="col-1  ta-dc-ml mb-0d5r">
                                                    <div
                                                        class="text-uppercase lbl-os-{{ lcfirst($orderRecipe->paymentStatus->name) }}">{{ $orderRecipe->paymentStatus->name }}</div>
                                                </div>

                                                <div class="col-1  ta-dc-ml mb-0d5r">
                                                    <div
                                                        class="text-uppercase lbl-os-{{ lcfirst($orderRecipe->paymentStatus->name) }}">
                                                        {{ parseDate(optional($orderRecipe->history()->where('type', 'payment')->where('status_id', $orderRecipe->payment_status_id)->first())->updated_at) }}</div>
                                                </div>
                                                <div class="col-1  mb-0d5r">
                                                    @if($orderRecipe->status->name != 'Cancelled')
                                                        <div>{!! parsePrice($orderRecipe->price) !!}</div>
                                                    @endif
                                                </div>
                                                <div class="col-1  mb-0d5r">
                                                    @if($orderRecipe->status->name == 'Cancelled')
                                                        <div>{!! parsePrice($orderRecipe->price) !!}</div>
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
                        </div>
                    </div>
                </div>
            </div>
            {{--      </div>--}}
            <div class="d-flex justify-content-between">
                @if($order->status->name != 'Delivered')
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary brd-r-1d5">{{ __('Mark as complete') }}</button>
                    </div>
                @endif
                <div class="col-md-4 text-nowrap">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                            <div class="col-6 col-md-6 dtr-mtc">
                                <strong>{{ __('Price') }}:</strong>
                            </div>
                            <div class="col-6 col-md-6 dtl-mtc mb-05">
                                {!! parsePrice($order->recipes()->where('status_id', '<>', 10)->sum('price')) !!}
                            </div>
                            <div class="col-6 col-md-6 dtr-mtc">
                                <strong>{{ __('Delivery price') }}:</strong>
                            </div>
                            <div class="col-6 col-md-6 dtl-mtc mb-05">
                                {!! parsePrice($order->delivery_price) !!}
                            </div>
                            <div class="col-6 col-md-6 dtr-mtc">
                                <strong>{{ __('VAT') }}:</strong>
                            </div>
                            <div class="col-6 col-md-6 dtl-mtc mb-05">
                                {!! parsePrice($order->vat) !!}
                            </div>
                            <div class="col-6 col-md-6 dtr-mtc">
                                <strong>{{ __('Total price') }}:</strong>
                            </div>
                            <div class="col-6 col-md-6 dtl-mtc mb-05">
                                {!! parsePrice($order->total_amount) !!}
                            </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                            <div class="col-6 col-md-6 dtr-mtc">
                                <strong>{{ __('Price') }}:</strong>
                            </div>
                            <div class="col-6 col-md-6 dtl-mtc mb-05">
                                {!! $order->status_id == 14 ? parsePrice($order->recipes()->where('status_id', 10)->sum('price')) : '' !!}
                            </div>
                            <div class="col-6 col-md-6 dtr-mtc">
                                <strong>{{ __('Delivery price') }}:</strong>
                            </div>
                            <div class="col-6 col-md-6 dtl-mtc mb-05">
                                {!! $order->status_id == 14 ?  parsePrice($deliveryPrice) : '' !!}
                            </div>
                            <div class="col-6 col-md-6 dtr-mtc">
                                <strong>{{ __('VAT') }}:</strong>
                            </div>
                            <div class="col-6 col-md-6 dtl-mtc mb-05">
                                {!! $order->status_id == 14 ?  parsePrice($order->vat) : '' !!}
                            </div>
                            <div class="col-6 col-md-6 dtr-mtc">
                                <strong>{{ __('Total price') }}:</strong>
                            </div>
                            <div class="col-6 col-md-6 dtl-mtc mb-05">
                                {!! $order->status_id == 14 ?  parsePrice($order->total_amount) : '' !!}
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </td>
</tr>


