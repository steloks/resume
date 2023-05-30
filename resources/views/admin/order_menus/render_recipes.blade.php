<tr class="menu-recipes" style="max-width: 100%;">
    <td colspan="9">
        <form action="{{ route('admin.order-menus.markRecipeAsReturned', ['orderId' => $order->id, ]) }}" method="POST">
            @csrf
            <div class="row mb-2r">
                <div class="col-12">
                    <div class="row m-0 py-2r px-2r wbr-0d7r">
                        <div class="table-responsive dataTables_scroll mb-1r">


                            <table class="sub-table display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>{{ __('Menu №') }}</th>
                                    <th>{{ __('Menu name') }}</th>
                                    <th>{{ __('Pet') }}</th>
                                    <th>{{ __('Delivery date') }}</th>
                                    <th>{{ __('Menu status') }}</th>
                                    <th>{{ __('Payment status') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Returned amount') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recipes as $orderRecipe)
                                    <tr>
                                        <th>
                                            @if($orderRecipe->status->id === $statusCanceledId)
                                                <input type="hidden" name="order_recipe_id[]" value="{{ $orderRecipe->id }}">
                                            @endif
                                            {{ $orderRecipe->order_id . '-0' . $orderRecipe->id }}
                                        </th>
                                        <th>
                                            <strong>{{ $orderRecipe->recipe_name }}</strong>
                                        </th>
                                        <th>
                                            {{ $orderRecipe->pet->name }}
                                        </th>
                                        <th>
                                            {{ parseDate($orderRecipe->date) }}
                                        </th>
                                        <th>
                                            <div class="text-uppercase lbl-os-{{ badgeColor($orderRecipe->status->name) }}">{{ $orderRecipe->status->name }}</div>
                                        </th>
                                        <th>
                                            <div class="text-uppercase lbl-os-{{ lcfirst($orderRecipe->paymentStatus->name) }}">{{ $orderRecipe->paymentStatus->name }}</div>
                                        </th>
                                        <th>
                                            @if($orderRecipe->status->name != 'Cancelled')
                                                <div>{!! parsePrice($orderRecipe->price) !!}</div>
                                            @endif
                                        </th>
                                        <th>
                                            @if($orderRecipe->status->name == 'Cancelled')
                                                <div>{!! parsePrice($orderRecipe->price) !!}</div>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
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
            </div>
            {{-- </div>--}}

            {{--
            <div class="d-flex justify-content-between">
                @if($order->status->name != 'Delivered')
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary brd-r-1d5">{{ __('Mark as complete') }}</button>
                </div>
                @endif
                <div class="col-md-3">
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
            </div>
            --}}

        </form>
    </td>
</tr>

{{--<div class="col-12 col-xl-4 bg-lbr py-2r mb-1r px-1r">--}}
{{-- <div class="row mb-1r">--}}
{{-- <div class="col-6">--}}
{{-- <h3 class="fw-600">Cost:</h3>--}}
{{-- </div>--}}
{{-- <div class="col-6 txt-right">--}}
{{-- {!! parsePrice($order->recipes->sum('price')) !!}--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="row mb-1r">--}}
{{-- <div class="col-6">--}}
{{-- <h3 class="fw-600">Delivery:</h3>--}}
{{-- </div>--}}
{{-- <div class="col-6 txt-right">--}}
{{-- {!! parsePrice($order->delivery_price) !!}--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="row">--}}
{{-- <div class="col-6">--}}
{{-- <h3 class="fw-600">VAT:</h3>--}}
{{-- </div>--}}
{{-- <div class="col-6 txt-right">--}}
{{-- {!! parsePrice($order->vat) !!}--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="row mb-1r">--}}
{{-- <div class="col-12">--}}
{{-- <hr>--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <div class="row mb-2r">--}}
{{-- <div class="col-6">--}}
{{-- <h3 class="fw-600">Total cost:</h3>--}}
{{-- </div>--}}
{{-- <div class="col-6 txt-right">--}}
{{-- {!! parsePrice($order->total_amount) !!}--}}
{{-- </div>--}}
{{-- </div>--}}
{{--</div>--}}
