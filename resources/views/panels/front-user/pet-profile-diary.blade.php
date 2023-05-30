<div class="row">
    <div class="col-12 col-xl-5">
        <div>
            <a href="{{ route('profile.pets') }}" class="df-blink text-uppercase mb-0d5">Back to all pets</a>
        </div>
        <div class="mb-1r">
            <h2 class="fw-600">{{ ucfirst($pet->name) }}</h2>
        </div>
        <div class="row m-0 text-center">
            <div class="col-12 py-1r wbr-0d7r">
                <div class="row">
                    <div class="col-12">
                        <div>
                            @if(\Illuminate\Support\Str::contains(request()->getHost(),['ebilling', 'cloud', 'dogfood', 'testdogfood']))
                            <img
                                    src="{{ asset(\Illuminate\Support\Str::after($pet->image, '/home/ebilling/testdogfood.ebilling.cloud/public')) }}"
                                    style="border-radius: 50%" class="img-fluid max-wh-125x" alt="{{ $pet->name }}"/>
                            @else
                                <img src="{{ asset(\Illuminate\Support\Str::after($pet->image, '\\public\\')) }}"
                                     style="border-radius: 50%" class="img-fluid max-wh-125x" alt="{{ $pet->name }}"/>
                            @endif
                        </div>
                        <div class="mt-3 mb-2 fz-20xr fw-600">
                            {{ $pet->name }}
                        </div>
                        <div class="mb-3">
                            {{ $pet->breed->name }}
                        </div>
                    </div>
                    <div class="col-6 mb-1r">
                        <div class="clr-grey-82 text-uppercase mb-0d5r">Date of birth:</div>
                        <div>{{ parseDate($pet->date_of_birth) }}</div>
                    </div>
                    <div class="col-6 mb-1r">
                        <div class="clr-grey-82 text-uppercase mb-0d5r">Age:</div>
                        <div>{{ dateToYearsAndMonths($pet->date_of_birth) }}</div>
                    </div>
                    <div class="col-6 mb-1r">
                        <div class="clr-grey-82 text-uppercase mb-0d5r">Gender:</div>
                        <div>{{ $pet->gender }}</div>
                    </div>
                    <div class="col-6 mb-1r">
                        <div class="clr-grey-82 text-uppercase mb-0d5r">Weight:</div>
                        <div>{{ $pet->weight }}</div>
                    </div>
                    <div class="col-6 mb-1r">
                        <div class="clr-grey-82 text-uppercase mb-0d5r">Weight level:</div>
                        <div class="{{ $pet->weight_lvl == 3 ? 'lbl-owheight' : '' }}">{{ \App\Models\Pet::$weightLvl[$pet->weight_lvl] }}</div>
                    </div>
                    <div class="col-6 mb-1r">
                        <div class="clr-grey-82 text-uppercase mb-0d5r">Activity level:</div>
                        <div>{{ \App\Models\Pet::$activityLvl[$pet->activity_lvl] }}</div>
                    </div>
                    <div class="col-6 mb-1r">
                        <div class="clr-grey-82 text-uppercase mb-0d5r">Neutering:</div>
                        <div>{{ !empty($pet->neutered) ? __('Yes') : __('No') }}</div>
                    </div>
                    <div class="col-6 mb-1r">
                        <div class="clr-grey-82 text-uppercase mb-0d5r">Diseases:</div>
                        <div>{{ !empty($pet->disease) ? __('Yes') : __('No') }}</div>
                    </div>
                    <div class="col-6 mb-1r">
                        <div class="clr-grey-82 text-uppercase mb-0d5r">Unusual behavior:</div>
                        <div>{{ !empty($pet->unusual_behavior) ? __('Yes') : __('No') }}</div>
                    </div>
                    <div class="col-6 mb-1r">
                        <div class="clr-grey-82 text-uppercase mb-0d5r">Allergens:</div>
                        <div>{{ implode(',', $pet->getPetAllergens($pet->product_allergens->pluck('product_id')->toArray())) }}</div>
                    </div>
                </div>
            </div>
            @if($pet->weight_notification == 'new')
                <div class="col-12 py-1r wbr-0d7r">
                    <form action="{{ route('profile.diaryCheckNotification', ['id' => $pet->id]) }}" class="d-flex" method="POST">
                        @csrf
                  <div class="row">
                      <div class="col-6">
                          <img src="{{ asset('images/icon/diary/diary-icon-attention.png') }}" class="img-fluid w-di-m35x" alt="Icon">
                      </div>

                      <div class="col-6">
                          <span>{{ __('Change in weight level') }}</span>
                      </div>
                  </div>
                        <button type="submit" class="btn btn-df-wlgb" style="margin-left: 20px"> {{ __('Check') }}</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
    <div class="col-12 col-xl-7 mt-d0r-m1r">
        <div class="row m-0">
            <div class="col-12 col-12 mb-3 fz-20xr ff-fptdemi">
                Weight change
            </div>
            <div class="col-12 py-1r wbr-0d7r">
                <div id="dog-weight-summary-chart-detail"></div>
            </div>
        </div>
        <div class="row py-2r">
            <div class="col-12 mb-1r">
                <div class="row align-items-center">
                    <div class="col-6 fz-20xr ff-fptdemi">
                        Diary
                    </div>
                    <div id="carouselPetDiary-np" class="col-6 ta-right">
                        <button class="carousel-control-prev position-relative d-inline-block" type="button"
                                data-bs-target="#carouselPetDiary" data-bs-slide="prev">
                            <span class=""><svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_895_12725)"> <path d="M0.499999 13.5C0.5 6.3203 6.3203 0.5 13.5 0.500001C20.6797 0.500001 26.5 6.3203 26.5 13.5C26.5 20.6797 20.6797 26.5 13.5 26.5C6.3203 26.5 0.499999 20.6797 0.499999 13.5Z" stroke="#333333"/> <path d="M9.2569 13.5C9.2569 13.3296 9.31974 13.159 9.44526 13.029L15.8738 6.36663C16.125 6.1063 16.5318 6.1063 16.7828 6.36663C17.0338 6.62697 17.034 7.04852 16.7828 7.30869L10.8088 13.5L16.7828 19.6913C17.034 19.9516 17.034 20.3732 16.7828 20.6333C16.5316 20.8935 16.1248 20.8937 15.8738 20.6333L9.44526 13.971C9.31974 13.8409 9.2569 13.6704 9.2569 13.5Z" fill="black"/></g><defs><clipPath id="clip0_895_12725"><rect width="27" height="27" fill="white" transform="translate(27 27) rotate(-180)"/></clipPath></defs></svg> </span>
                        </button>
                        <button class="carousel-control-next position-relative d-inline-block" type="button"
                                data-bs-target="#carouselPetDiary" data-bs-slide="next">
                            <span class=""><svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="13.5" cy="13.5" r="13" stroke="#333333"/><path d="M17.7431 13.5C17.7431 13.6704 17.6803 13.841 17.5547 13.971L11.1262 20.6334C10.875 20.8937 10.4682 20.8937 10.2172 20.6334C9.96617 20.373 9.96601 19.9515 10.2172 19.6913L16.1912 13.5L10.2172 7.30871C9.96601 7.04838 9.96601 6.62682 10.2172 6.36666C10.4684 6.10649 10.8752 6.10633 11.1262 6.36666L17.5547 13.029C17.6803 13.1591 17.7431 13.3296 17.7431 13.5Z" fill="black"/></svg></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div id="carouselPetDiary" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner row m-0">
                        @include('panels.front-user.pet-profile-diary-history')
                    </div>
                    <div class="carousel-indicators">
                        @foreach($petHistories as $petHistory)
                                <button type="button" data-bs-target="#carouselPetDiary" data-bs-slide-to="{{ $loop->index }}"
                                        class="{{ $loop->index == 0 ? 'active' : '' }} {{ $loop->index >= 3 ? 'd-none' : '' }}"
                                        aria-current="true" aria-label="Page {{ $loop->index }}"
                                ></button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
