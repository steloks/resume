<div class="row mw-1000x mx-auto">
    <div class="col-12 text-center">
        <h2 class="ff-fptdemi">Choose for which pet you would like to order food</h2>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <div class="row text-center">
                @foreach($pets as $pet)
                    @if(empty($pet->disease) && empty($pet->unusual_behavior))
                        <div class="col-12 col-md-4 data-pet-id-js" data-pet-id-js="{{ !empty($petSelectedFromTabs) ? $petSelectedFromTabs->id : '' }}">
                            <div class="form-check my-2r mx-2r py-2r crs-pointer brd-radius-0d7r pl-0 slt-pet-order @if(!empty($petSelectedFromTabs) && ($petSelectedFromTabs->id == $pet->id)) bg-b30-0d9 @endif">
                                <input class="form-check-input vsb-hidden  dog_select" type="radio" name="dog_id" data-url="{{ route('order.recipes', ['id' => $pet->id]) }}"
                                       id="dog{{$pet->id}}" value="{{$pet->id}}" @if(!empty($petSelectedFromTabs) && ($petSelectedFromTabs->id == $pet->id)) checked="checked" @endif>
                                <label class="form-check-label mb-1r px-1r crs-pointer" for="dog{{$pet->id}}">
                                    @if(!empty($pet->image))
                                        @if(\Illuminate\Support\Str::contains(request()->getHost(),['ebilling', 'cloud', 'dogfood', 'testdogfood']))
                                        <img src="{{ asset(\Illuminate\Support\Str::contains(\Illuminate\Support\Str::after($pet->image, '/home/ebilling/testdogfood.ebilling.cloud/public'), ['png', 'jpg', 'jpeg']) ?
                                        \Illuminate\Support\Str::after($pet->image, '/home/ebilling/testdogfood.ebilling.cloud/public') : ('images\dog-default.png')) }}"
                                                 class="img-fluid" alt="{{ $pet->name }}" style="border-radius: 50%">
                                        @else
                                            <img src="{{ asset(\Illuminate\Support\Str::contains(\Illuminate\Support\Str::after($pet->image, '\\public\\'), ['png', 'jpg', 'jpeg']) ? \Illuminate\Support\Str::after($pet->image, '\\public\\') : ('images\dog-default.png')) }}"
                                                 class="img-fluid" alt="{{ $pet->name }}" style="border-radius: 50%">
                                        @endif
                                    @else
                                        <img src="{{ asset(\Illuminate\Support\Str::contains(\Illuminate\Support\Str::after($pet->image, '\\public\\'), ['png', 'jpg', 'jpeg']) ? \Illuminate\Support\Str::after($pet->image, '\\public\\') : ('images\dog-default.png')) }}"
                                             class="img-fluid" alt="{{ $pet->name }}" style="border-radius: 50%">
                                    @endif
                                </label>
                                <div class="fz-20xr mb-0d5r">{{$pet->name}}</div>
                                <div>{{$pet->breed->name}}</div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row mb-1r">
            <div class="col-12 text-center">
                <h2 class="ff-fptdemi">Delivery details</h2>
            </div>
            <div class="col-12 text-center">
                Choose the address for delivery
            </div>
        </div>
        <div class="mb-3">
            <div class="row py-2r px-2r brd-lgry-1">
                <div class="col-12 col-md-8">
                    <div class="row">
                        <div class="col-12 mb-1r">
                            <h3>Choose from your saved addresses:</h3>
                        </div>
                        @foreach($addresses as $address)
                            <div class="col-12 mb-0d7r">
                                <div class="form-check">
                                    <input class="form-check-input address_select" type="radio" name="address"
                                           id="address{{$address->id}}" value="{{$address->id}}"
                                           @if(!empty($selectedAddressId) && $address->id == $selectedAddressId) checked @endif
                                           data-area_id="{{$address->postcodeRelation->area_id}}">
                                    <label class="form-check-label" for="address{{$address->id}}">
                                        {{$address->address.', '.$address->postcode}}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-md-4 ta-dl-mc py-1r">
                    <button type="button" class="btn btn-df-lbr-r btn-sq-lp" data-bs-toggle="modal"
                            data-bs-target="#dfUserAddNewAddress">Add a new address
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center mt-2r mb-3r">
                <button type="button" class="btn btn-df-wine btn-sq-lp-l menu-selection-button">Continue</button>
            </div>
        </div>
    </div>
</div>

@include('front.user-order.add-new-address-modal')
