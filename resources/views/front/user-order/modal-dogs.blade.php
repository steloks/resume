@foreach($pets as $pet)
    @if(empty($pet->disease) && empty($pet->unusual_behavior))
            <div class="col-12 col-md-4" data-bs-toggle="modal" data-bs-dismiss="modal">
            <div class="form-check my-2r mx-2r py-2r crs-pointer brd-radius-0d7r pl-0 slt-pet-order">
                <input class="form-check-input vsb-hidden  dog_select" type="radio" name="dog_id"
                       id="dog{{$pet->id}}" value="{{$pet->id}}">
                <label class="form-check-label mb-1r px-1r crs-pointer" for="dog{{$pet->id}}">
                    @if(!empty($pet->image))
                        @if(\Illuminate\Support\Str::contains(request()->getHost(),['ebilling', 'cloud', 'dogfood', 'testdogfood']))
                        <img src="{{ asset(\Illuminate\Support\Str::contains(\Illuminate\Support\Str::after($pet->image, '/home/ebilling/testdogfood.ebilling.cloud/public'), ['png', 'jpg', 'jpeg']) ?
                                        \Illuminate\Support\Str::after($pet->image, '/home/ebilling/testdogfood.ebilling.cloud/public') : ('images\dog-default.png')) }}"
                                 class="img-fluid" alt="{{ $pet->name }}" style="border-radius: 50%">
                        @else
                            <img src="{{ asset(\Illuminate\Support\Str::after($pet->image, '\\public\\')) }}"
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
