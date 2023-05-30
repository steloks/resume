<div class="row home-notification-w mb-1">
    <div class="col-12 h-100">
        <h3 class="mt-3">{{ __('Pet profiles') }}</h3>
            <div class="overflow-auto scrollable-notif">
                <div class="scrollable-container media-list ps ps--active-y mr-2r mt-2">
                    @foreach($petNotifications as $petNotification)
                        <div class="d-flex justify-content-between dv-link">
                            <div class="media d-flex align-items-center">
                                <div class="media-left pr-0">
                                    <div class="mr-1 m-0">
                                        <i class="ficon bx bx-note clr-d3 fz-1d8"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading"><span
                                            class="text-bold-600">
                                            {!! __('Change in weight for') . ' ' .  parseEditRoute('clients-pets', $petNotification->pet->id, ucfirst($petNotification->pet->name)) !!}
                                        </span>
                                    </h5>

                                    <div class="mb-0d6">
                                        <p class="notification-text">
                                            {{ ucfirst($petNotification->pet->name) . '\'s ' . __('weight level has been changed from') . ' ' .
                                            \App\Models\UserPetHistory::$weightLvl[optional($petNotification->pet->history->sortByDesc('id')->take(2)->first())->value ?? 1] . ' ' . __('to') . ' '  .
                                            \App\Models\Pet::$weightLvl[optional($petNotification->pet->history->sortByDesc('id')->take(2)->last())->value ?? 1] }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="notification-text clr-g97">{{ parseDate($petNotification->created_at)  }}</p>
                                    </div>
                                </div>
                                @if($petNotification->checked === 0)
                                    <div class="media-right pl-0 js-notification-check"
                                         data-url="{{ route('admin.dashboard-index-check-notification', ['id' => $petNotification->id]) }}">
                                        <div class="mr-1 m-0" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                             data-bs-placement="left" data-bs-html="true" title="{{ __('Mark as checked') }}">
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
