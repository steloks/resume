<div class="row">
    <div class="col-12 col-md-6 mb-2r">
        <div class="row m-0">
            <div class="col-12 u-profile-m py-2r px-2r">
                <div class="row">
                    <div class="col-12 ta-dl-mc-t mb-1r">
                        <h2 class="ff-fptdemi">Personal info</h2>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('profile.updateProfile') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">First name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Family name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', auth()->user()->last_name ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone number</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone ?? '') }}">
                            </div>
                            <div class="row pt-3">
                                <div class="col-12 col-xl-6 mb-1r">
                                    <button type="submit" class="btn w-100 btn-df-lbr btn-sq-lp-xs">Save changes</button>
                                </div>
                                <div class="col-12 col-xl-6 mb-1r">
                                    <button type="submit" class="btn w-100 btn-df-wdgb btn-sq-lp-xs">Discard</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 mb-2r">
        <div class="row m-0 h-100">
            <div class="col-12 u-profile-m py-2r px-2r">
                <div class="row">
                    <div class="col-12 ta-dl-mc-t mb-1r">
                        <h2 class="ff-fptdemi">Change password</h2>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('profile.updateProfile') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="password" class="form-label">Current password</label>
                                <input type="password" class="form-control" id="password" name="password" value="">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" value="">
                                @error('new_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirm_new_password" class="form-label">Confirm new password</label>
                                <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" value="">
                                @error('confirm_new_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row pt-3">
                                <div class="col-12 col-xl-6 mb-1r">
                                    <button type="submit" class="btn w-100 btn-df-lbr btn-sq-lp-xs">Save changes</button>
                                </div>
                                <div class="col-12 col-xl-6 mb-1r">
                                    <button type="submit" class="btn w-100 btn-df-wdgb btn-sq-lp-xs">Discard</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
