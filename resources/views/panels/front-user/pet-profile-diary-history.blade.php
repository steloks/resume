@foreach((!empty($noChunk) ? $petHistories->chunk(1000) : $petHistories->chunk(3)) as $petChunkHistory)
    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}" data-bs-interval="6000">
        @foreach($petChunkHistory as $petHistory)
            @if($petHistory->key == 'weight_lvl')
                @if($petHistory->value != $pet->weight_lvl)
                    <div class="row mb-1r px-2 py-1r wbr-0d7r">
                        <div class="col-12 pr-0 col-md-1">
                            <img src="{{ asset('images/icon/diary/diary-icon-attention.png') }}" class="img-fluid w-di-m35x" alt="Icon">
                        </div>

                        <div class="col-12 col-md-9">
                            <div>{{ __('Change in weight level') }}
                            </div>
                            @if($previousPetHistory = $petHistories->where('key', $petHistory->key)->where('id', '>' , $petHistory->id)->first())
                                <div>{{ ucfirst($pet->name) . '\'s ' . __('weight level has been changed from') . ' ' .
                                            \App\Models\UserPetHistory::$weightLvl[$petHistory->value] . ' ' . __('to') . ' '  .
                                            \App\Models\UserPetHistory::$weightLvl[$previousPetHistory->value] }}.
                                </div>
                            @else
                            <div>{{ ucfirst($pet->name) . '\'s ' . __('weight level has been changed from') . ' ' . \App\Models\UserPetHistory::$weightLvl[$petHistory->value] . ' ' . __('to') . ' '  . \App\Models\Pet::$weightLvl[$pet->weight_lvl] }}
                                .
                            </div>
                            @endif
                        </div>

                        <div class="col-12 col-md-2">
                            {{ parseDate($petHistory->created_at, 1) }}
                        </div>
                    </div>
                @endif
            @elseif($petHistory->key == 'activity_lvl')
                @if($petHistory->value != $pet->activity_lvl)
                <div class="row mb-1r px-2 py-1r wbr-0d7r">
                    <div class="col-12 pr-0 col-md-1">
                        <img src="{{ asset('images/icon/diary/diary-icon-attention.png') }}" class="img-fluid dw-di-m35x" alt="Icon">
                    </div>

                    <div class="col-12 col-md-9">
                        <div>{{ __('Change in activity level') }}
                        </div>
                        @if($previousPetHistory = $petHistories->where('key', $petHistory->key)->where('id', '>' , $petHistory->id)->first())
                            <div>{{ ucfirst($pet->name) . '\'s ' . __('activity level has been changed from') . ' ' .
                                    \App\Models\UserPetHistory::$activityLvl[$petHistory->value] . ' ' . __('to') . ' '  .
                                    \App\Models\UserPetHistory::$activityLvl[$previousPetHistory->value] }}
                                .
                            </div>
                        @else
                            <div>{{ ucfirst($pet->name) . '\'s ' . __('activity level has been changed from') . ' ' . \App\Models\UserPetHistory::$activityLvl[$petHistory->value] . ' ' . __('to') . ' '  . \App\Models\Pet::$activityLvl[$pet->activity_lvl] }}
                                .
                            </div>
                        @endif
                    </div>

                    <div class="col-12 col-md-2">
                        {{ parseDate($petHistory->created_at, 1) }}
                    </div>
                </div>
                @endif
            @elseif($petHistory->key == 'allergen_ids')
                <div class="row mb-1r px-2 py-1r wbr-0d7r">
                    <div class="col-12 pr-0 col-md-1">
                        <img src="{{ asset('images/icon/diary/diary-icon-update.png') }}" class="img-fluid w-di-m35x" alt="Icon">
                    </div>

                    <div class="col-12 col-md-9">
                        <div>{{ __('List of allergens updated') }}</div>
{{--                        @if($previousPetHistory = $petHistories->where('key', $petHistory->key)->where('id', '>' , $petHistory->id)->first())--}}
{{--                            <div>--}}
{{--                                @foreach(\App\Models\ProductAllergen::query()->whereIn('id', json_decode($previousPetHistory->value))->get() as $product)--}}
{{--                                    {!! $product->product->name !!}{!! (!$loop->last ? ',' : '') !!}--}}
{{--                                @endforeach--}}
{{--                                {{ __('has been added to the list of allergens.') }}--}}
{{--                            </div>--}}
{{--                        @else--}}
                            <div>
                                @foreach(\App\Models\ProductAllergen::query()->whereIn('id', json_decode($petHistory->value))->get() as $product)
                                    {!! $product->product->name !!}{!! (!$loop->last ? ',' : '') !!}
                                @endforeach
                                {{ __('has been added to the list of allergens.') }}
                            </div>
{{--                        @endif--}}
                    </div>

                    <div class="col-12 col-md-2">
                        {{ parseDate($petHistory->created_at, 1) }}
                    </div>
                </div>
            @elseif($petHistory->key == 'disease')
                <div class="row mb-1r px-2 py-1r wbr-0d7r">
                    <div class="col-12 pr-0 col-md-1">
                        <img src="{{ asset('images/icon/diary/diary-icon-medical.png') }}" class="img-fluid w-di-m35x" alt="Icon">
                    </div>

                    <div class="col-12 col-md-9">
                        <div>{{ __('Medical conditions change') }}
                        </div>
                        @if($previousPetHistory = $petHistories->where('key', $petHistory->key)->where('id', '>' , $petHistory->id)->first())
                            <div>{{ __('"Does your pet have any disease?" has been changed to ') }} {{ !empty($previousPetHistory->value) ? __('Yes') : __('NO') }}
                                .
                            </div>
                        @else
                            <div>{{ __('"Does your pet have any disease?" has been changed to ') }} {{ !empty($petHistory->value) ? __('Yes') : __('NO') }}
                                .
                            </div>
                        @endif
                    </div>

                    <div class="col-12 col-md-2">
                        {{ parseDate($petHistory->created_at, 1) }}
                    </div>
                </div>
            @elseif($petHistory->key == 'unusual_behavior')
                <div class="row mb-1r px-2 py-1r wbr-0d7r">
                    <div class="col-12 pr-0 col-md-1">
                        <img src="{{ asset('images/icon/diary/diary-icon-update.png') }}" class="img-fluid w-di-m35x" alt="Icon">
                    </div>

                    <div class="col-12 col-md-9">
                        <div>{{ __('Behaviour change') }}
                        </div>
                        @if($previousPetHistory = $petHistories->where('key', $petHistory->key)->where('id', '>' , $petHistory->id)->first())
                            <div>{{ __('"Does your pet have any unusual behaviour?" has been changed to ') }} {{ !empty($previousPetHistory->value) ? __('Yes') : __('NO') }}
                                .
                            </div>
                        @else
                            <div>{{ __('"Does your pet have any unusual behaviour?" has been changed to ') }} {{ !empty($petHistory->value) ? __('Yes') : __('NO') }}
                                .
                            </div>
                        @endif
                    </div>

                    <div class="col-12 col-md-2">
                        {{ parseDate($petHistory->created_at, 1) }}
                    </div>
                </div>
            @elseif($petHistory->key == 'neutered')
                <div class="row mb-1r px-2 py-1r wbr-0d7r">
                    <div class="col-12 pr-0 col-md-1">
                        <img src="{{ asset('images/icon/diary/diary-icon-update.png') }}" class="img-fluid w-di-m35x" alt="Icon">
                    </div>

                    <div class="col-12 col-md-9">
                        <div>{{ __('Pet neutered change') }}
                        </div>
                        @if($previousPetHistory = $petHistories->where('key', $petHistory->key)->where('id', '>' , $petHistory->id)->first())
                            <div>{{ __('"Is your pet neutered?" has been changed to ') }} {{ !empty($previousPetHistory->value) ? __('Yes') : __('NO') }}
                                .
                            </div>
                        @else
                            <div>{{ __('"Is your pet neutered?" has been changed to ') }} {{ !empty($petHistory->value) ? __('Yes') : __('NO') }}
                                .
                            </div>
                        @endif
                    </div>

                    <div class="col-12 col-md-2">
                        {{ parseDate($petHistory->created_at, 1) }}
                    </div>
                </div>
            @elseif($petHistory->key == 'weight')
                @if($petHistory->value != $pet->weight)
                    <div class="row mb-1r px-2 py-1r wbr-0d7r">
                        <div class="col-12 pr-0 col-md-1">
                            <img src="{{ asset('images/icon/diary/diary-icon-attention.png') }}" class="img-fluid w-di-m35x" alt="Icon">
                        </div>

                        <div class="col-12 col-md-9">
                            <div>{{ __('Pet weight change') }}
                            </div>
                            @if($previousPetHistory = $petHistories->where('key', $petHistory->key)->where('id', '>' , $petHistory->id)->first())
                                <div>{{ ucfirst($pet->name) . '\'s ' . __('Weight has been changed from') . ' ' . $petHistory->value . 'kg ' . __('to') . ' '  . $previousPetHistory->value . 'kg' }}
                                    .
                                </div>
                            @else
                                <div>{{ ucfirst($pet->name) . '\'s ' . __('Weight has been changed from') . ' ' . $petHistory->value . 'kg ' . __('to') . ' '  . $pet->weight . 'kg' }}
                                    .
                                </div>
                            @endif
                        </div>

                        <div class="col-12 col-md-2">
                            {{ parseDate($petHistory->created_at, 1) }}
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
@endforeach
