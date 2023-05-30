<div class="row">
    <div class="col-12 mb-2r fw-600 fz-18xr text-center">
        Pets demographics
    </div>
    <div class="col-12 w-50p-75p-90p m-auto">
        <form action="{{ route('profile.storePetFirstStep') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Pet’s name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                       placeholder="{{ __('Pet\'s name') }}">
            </div>
            <div class="mb-3">
                <label for="breed" class="form-label">Breed</label>
                <select class="form-select form-control" id="breed" name="breed" data-live-search="true">
                    <option disabled>Choose a breed</option>
                    {{--                    TODO will probably want search--}}
                    @foreach(\App\Models\Breed::all() as $breed)
                        <option value="{{ $breed->id }}">{{ $breed->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="date_of_birth">Date of birth</label>
                <input class="datepicker form-control" id="date_of_birth" name="date_of_birth"
                       value="{{ old('date_of_birth') }}">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" style="background-color: #dcdcdc" disabled>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select form-control" id="gender" name="gender">
                    <option selected>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="mb-2r">
                <label class="form-label">Add a photo (optional):</label>
                <div class="dropzone dropzone-area dz-clickable text-center" id="df_dropzone">
                    <div class="dz-message dsp-n">{{ __('Choose a file to upload') }}</div>
                    <div class="dz-preview dz-image-preview">
                        <div class="dz-message dz-clickable df-change-img">
                            <div class="mb-1r"><svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0_554_2113)"> <path d="M22.5322 29.5C22.9263 29.5007 23.3166 29.4234 23.6808 29.2728C24.045 29.1221 24.3758 28.9009 24.6542 28.622L28.5732 24.7L27.1592 23.29L23.5262 26.924L23.5002 10.5H21.5002L21.5262 26.908L17.9062 23.288L16.4922 24.7L20.4112 28.619C20.6893 28.8983 21.0198 29.1199 21.3838 29.2711C21.7478 29.4223 22.138 29.5001 22.5322 29.5Z" fill="#374957"/> <path d="M32.5 26.5004V31.5004C32.5 31.7656 32.3946 32.0199 32.2071 32.2075C32.0196 32.395 31.7652 32.5004 31.5 32.5004H13.5C13.2348 32.5004 12.9804 32.395 12.7929 32.2075C12.6054 32.0199 12.5 31.7656 12.5 31.5004V26.5004H10.5V31.5004C10.5 32.296 10.8161 33.0591 11.3787 33.6217C11.9413 34.1843 12.7044 34.5004 13.5 34.5004H31.5C32.2956 34.5004 33.0587 34.1843 33.6213 33.6217C34.1839 33.0591 34.5 32.296 34.5 31.5004V26.5004H32.5Z" fill="#374957"/> </g> <defs> <clipPath id="clip0_554_2113"> <rect width="24" height="24" fill="white" transform="translate(10.5 10.5)"/> </clipPath> </defs> </svg></div>
                            <h2>{{ __('Choose a file to upload') }}</h2>
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
            <button type="submit" class="btn w-100 btn-df-lbr btn-sq-lp df-first-step">Continue</button>
        </form>
    </div>
</div>
