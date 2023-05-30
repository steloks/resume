@if(!$pets->isEmpty())
    <div class="row mb-2r">
        <div class="col-12 col-md-6 ta-dl-mc-t">
            <h2 class="ff-fptdemi">My pets profiles</h2>
        </div>
        <div class="col-12 col-md-6 ta-dright-mc-t">
            <a href="{{ route('profile.createPet') }}" type="button" id="" class="btn btn-df-lbr btn-sq-lp">Add new
                pet</a>
        </div>
    </div>
    @foreach($pets as $pet)
        <div class="row m-0">
            <div class="col-12 u-profile-m pt-2r pb-1r mb-1r">
                <div class="row">
                    <div class="col-12 col-md-3 mb-1r">
                        @if(\Illuminate\Support\Str::contains(request()->getHost(),['ebilling', 'cloud', 'dogfood', 'testdogfood', 'testdogfood']))
                            <img class="{{ $pet->image . 'img-fluid rounded-circle' }}"
                                 src="{{ asset(\Illuminate\Support\Str::contains(\Illuminate\Support\Str::after($pet->image, '/home/ebilling/testdogfood.ebilling.cloud/public'), ['png', 'jpg', 'jpeg']) ? \Illuminate\Support\Str::after($pet->image, '/home/ebilling/testdogfood.ebilling.cloud/public') : ('images\dog-default.png')) }}"
                                 alt="{{ $pet->name }}"
                                 style="border-radius: 50%">
                        @else
                            <img
                                src="{{ asset(\Illuminate\Support\Str::contains(\Illuminate\Support\Str::after($pet->image, '\\public\\'), ['png', 'jpg', 'jpeg']) ? \Illuminate\Support\Str::after($pet->image, '\\public\\') : ('images\dog-default.png')) }}"
                                alt="{{ $pet->name }}"
                                style="border-radius: 50%" class="img-fluid rounded-circle">
                        @endif
                    </div>
                    <div class="col-12 col-md-4 mb-1r">
                        <div class="mb-1r">
                            <span class="ff-fptdemi">{{ $pet->name }}</span>
                        </div>
                        <div class="mb-1r">
                            {{ $pet->breed->name }}
                        </div>
                        <div class="d-flex align-items-center">
                        <span class="mr-0d5r"><a href="{{ route('profile.editPet', ['id' => $pet->id]) }}"><img
                                    class="img-fluid" src="{{ asset('images/icon/user/edit-pencil.png') }}" alt="Edit"></a></span>
                            <span class="mr-1d5r"><a class="df-blink"
                                                     href="{{ route('profile.editPet', ['id' => $pet->id]) }}">Edit</a></span>
                            <form action="{{ route('profile.archivePet', ['id' => $pet->id ?? '']) }}" method="POST"
                                  class="df-blink">
                                @csrf
                                <button type="submit" id="" class="remove-default-btn-style" style="background: none;color: inherit;border: none;padding: 0;font: inherit;cursor: pointer;outline: inherit;">
                                         <span class="mr-0d5r"><img class="img-fluid"
                                                                    src="{{ asset('images/icon/user/archive.png') }}"
                                                                    alt="Archive"></span>
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-xl-2 text-center mb-1r">
                        <a href="{{ route('profile.diary', ['id' => $pet->id]) }}" id=""
                           class="btn btn-df-wlgb btn-sq-lp w-100-1200w">
                            @if($pet->weight_notification == 'new')
                                <span class="rounded-circle circle-24x-wine">1</span>
                            @endif
                            Diary
                        </a>
                    </div>
                    @if(empty($pet->disease) && empty($pet->unusual_behavior))
                        <div class="col-12 col-xl-3 mb-1r">
                            <a href="{{route('order.index', ['petId' => $pet->id])}}" id=""
                               class="btn btn-df-lgr btn-sq-lp-xs w-100">Order food for
                                <span>{{ $pet->name }}</span></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('panels.modals.archive-pet-profile-modal', ['petId' => $pet->id])
    @endforeach
@else
    @include('panels.front-user.user-pet-profile-no-pets')
@endif
