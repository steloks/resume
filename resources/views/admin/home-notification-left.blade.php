<div class="row home-notification-w mb-1">
    <div class="col-12 h-100">
        <h3 class="mt-3 pl-1">{{ __('Order notifications') }}</h3>
        <div class="overflow-auto scrollable-notif">
            <div class="scrollable-container media-list ps ps--active-y mr-2r mt-2">
                @foreach($orderNotifications as $orderNotification)
                    <div class="d-flex justify-content-between dv-link">
                        <div class="media d-flex align-items-center">
                            <div class="media-left pr-0">
                                <div class="mr-1 m-0">
                                    <i class="ficon bx bx-note clr-d3 fz-1d8"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                @if($orderNotification->type != 'order_menu')
                                    @if($orderNotification->order->status->name == 'Cancelled')
                                        <h5 class="media-heading"><span class="text-bold-600">
                        {!! __('Order №') . ' ' . parseEditRoute('orders', $orderNotification->order->id, $orderNotification->order->id) . ' ' . __('has been cancelled') !!}
                    </span></h5>
                                        {{--            <div class="mb-0d6">--}}
                                        {{--              <p class="notification-text">{{ $orderNotification->order->comment }}.</p>--}}
                                        {{--            </div>--}}
                                        <div>
                                            <p class="notification-text clr-g97">{{ parseDate($orderNotification->created_at) }}</p>
                                        </div>
                                    @else
                                        <h5 class="media-heading"><span class="text-bold-600">
                        {!! __('Comment on Order №') . ' ' . parseEditRoute('orders', $orderNotification->order->id, $orderNotification->order->id) !!}
                    </span></h5>
                                        <div class="mb-0d6">
                                            <p class="notification-text">{{ $orderNotification->order->comment }}.</p>
                                        </div>
                                        <div>
                                            <p class="notification-text clr-g97">{{ parseDate($orderNotification->created_at) }}</p>
                                        </div>
                                    @endif

                                @else
                                    {{--                          todo wierd bug for now just check if order exists--}}
                                    @if(!empty($orderNotification->orderMenu))
                                        <h5 class="media-heading"><span class="text-bold-600">
                        {!! __('Menu №') . ' ' . parseEditRoute('orders', $orderNotification->orderMenu->order_id, $orderNotification->orderMenu->id) . ' ' . __('has been cancelled') !!}
                    </span></h5>
                                        <div class="mb-0d6">
                                            <p class="notification-text">{!! __('Return amount') . ': ' . parsePrice($orderNotification->orderMenu->price) !!}
                                                .</p>
                                            <p class="notification-text">{{ __('Date return amount') . ': ' . parseDate($orderNotification->created_at) }}
                                                .</p>
                                        </div>
                                        <div>
                                            <p class="notification-text clr-g97">{{ parseDate($orderNotification->created_at) }}</p>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            @if($orderNotification->checked === 0)
                                <div class="media-right pl-0 js-notification-check"
                                     data-url="{{ route('admin.dashboard-index-check-notification', ['id' => $orderNotification->id]) }}">
                                    <div class="mr-1 m-0" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                         data-bs-placement="left" data-bs-html="true"
                                         title="{{ __('Mark as checked') }}">
                                        <i class="ficon bx bx-info-circle clr-d3 fz-1d8"></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
