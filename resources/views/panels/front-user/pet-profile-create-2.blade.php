<div class="row">
    <div class="col-12 fw-600 fz-18xr mb-2r text-center">
        Pet’s physical conditions
    </div>
    <div class="col-12 mb-4r">
        <form action="{{ route('profile.storePetSecondStep') }}" method="POST">
            @csrf
            <div class="mb-3 w-50p-75p m-auto"">
                <label for="weight" class="form-label">Weight</label>
                <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight') }}">
            </div>
            <div class="row">
                <div class="col-12 fw-600 fz-18xr my-3r text-center">
                    Weight level:
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    @foreach($weightLvls as $key => $weightLvl)
                        <div class="col-12 col-md-4 py-2r px-1r brd-radius-0d7r text-center slt-pet-order slt-pet-wl">
                            <div class="form-check p-0">
                                <input class="form-check-input vsb-hidden" type="radio" name="weight_lvl" id="weight_{{ $key }}" value="{{ $key }}">
                                {{--
                                <label class="form-check-label" for="weight_{{ $key }}">
                                    {!! $weightLvl !!}
                                </label>
                                --}}
                                <label class="form-check-label fw-600 text-uppercase" for="weight_{{ $key }}">
                                    <div><img class="img-fluid mb-1r crs-pointer" src="{{ asset('images/icon/pets/'.$weightLvl.'.png') }}" alt="Icon"></div>
                                    <div>{!! $weightLvl !!}</div>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-12 fw-600 fz-18xr my-3r text-center">
                    Activity level:
                </div>
            </div>
            <div class="mb-4r">
                <div class="row">
                    @foreach($activityLvls as $key => $activityLvl)
                    <div class="col-12 col-md-4 py-2r px-1r brd-radius-0d7r text-center slt-pet-order slt-pet-al">
                        <div class="form-check">
                            <input class="form-check-input vsb-hidden" type="radio" name="activity_lvl" id="activity_{{ $key }}" value="{{ $key }}">
                            {{--
                            <label class="form-check-label" for="activity_{{ $key }}">
                                {!! $activityLvl !!}
                            </label>
                            --}}
                            <label class="form-check-label fw-600 text-uppercase" for="activity_{{ $key }}">
                                <div><img class="img-fluid mb-1r crs-pointer" src="{{ asset('images/icon/pets/'.$activityLvl.'.png') }}" alt="Icon"></div>
                                <div>{!! $activityLvl !!}</div>
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn d-block w-50p-75p m-auto my-3 btn-df-lbr btn-sq-lp df-second-step">Continue</button>
        </form>
    </div>
</div>
