<div class="row">
    <div class="col-12 fw-600 fz-18xr mb-2r text-center">
        Pets demographics
    </div>
    <div class="col-12 w-50p-75p-90p m-auto">
        <form action="{{ route('profile.updatePetFirstStep', ['id' => $pet->id]) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Pet’s name</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old('name', $pet->name ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="breed" class="form-label">Breed</label>
                <select class="form-select form-control" id="breed" name="breed">
                    @foreach($breeds as $breed)
                        <option
                            value="{{ $breed->id }}" {{ ($pet->breed->id == $breed->id) ? 'selected' : '' }}>{{ $breed->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="date_of_birth">Date of birth</label>
                <input class="datepicker form-control" id="date_of_birth" name="date_of_birth"
                       value="{{ old('date_of_birth', $pet->date_of_birth ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $pet->age ?? '') }}"  style="background-color: #dcdcdc" disabled>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select form-control" id="gender" name="gender">
                    <option value="Male" {{ ($pet->gender == 'Male') ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ ($pet->gender == 'Female') ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="mb-2r">
                <label class="form-label">Add a photo (optional):</label>
                <div class="dropzone dropzone-area dz-clickable text-center" id="df_dropzone">
                    <div class="dz-message dsp-n">{{ __('Choose a file to upload') }}</div>
                    <div class="dz-preview dz-image-preview dz-error dz-complete">
                        <div class="dz-message dz-clickable df-change-img">
                            @if(!empty($pet->image))
                                @if(\Illuminate\Support\Str::contains(request()->getHost(),['ebilling', 'cloud', 'dogfood', 'testdogfood']))
                                <div class="dz-image">
                                        <img data-dz-thumbnail="" alt="{{ $pet->name }}"
                                             src="{{ asset(\Illuminate\Support\Str::after($pet->image, '/home/ebilling/testdogfood.ebilling.cloud/public')) }}">
                                    </div>
                                @else
                                    <div class="dz-image">
                                        <img  data-dz-thumbnail="" alt="{{ $pet->name }}"
                                              src="{{ asset(\Illuminate\Support\Str::after($pet->image, '\\public\\')) }}"
                                            style="border-radius: 50%">
                                    </div>
                                @endif
                            @else
                                <h1>{{ __('Choose a file to upload') }}</h1>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="dz-clickable df-change-img d-inline-block crs-pointer mr-1d5r mt-3">
                    <span class="mr-0d5r img-fluid">
                        <img class="img-fluid" src="{{ asset('images/icon/user/edit-pencil.png') }}" alt="Edit">
                    </span>
                    <span class="df-blink">Edit</span>
                </div>
                <div class="dz-clickable df-delete-img d-inline-block crs-pointer mt-3">
                    <span class="mr-0d5r img-fluid">
                        <img class="img-fluid" src="{{ asset('images/icon/user/del-x.png') }}" alt="Del">
                    </span>
                    <span class="df-blink">Delete</span>
                </div>
            </div>
            <button type="submit" class="btn w-100 mt-3 btn-df-lbr btn-sq-lp df-first-update-step">Continue</button>
        </form>
    </div>
</div>
