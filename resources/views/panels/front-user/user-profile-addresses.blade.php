@if(!$addresses->isEmpty())
<div class="row">
    <div class="col-12 ta-dl-mc-t mb-1r">
        <h2 class="ff-fptdemi">My addresses</h2>
    </div>
</div>
<div class="row">
    @foreach($addresses as $address)
        <div class="col-12 col-md-6 mb-3">
            <div class="row m-0">
                <div class="col-12 u-profile-m py-2r px-2r">
                    <div class="mb-1r"><strong>Address {{ $loop->iteration }}:</strong></div>
                    <div class="mb-1r">{{ $address->address }}, {{ $address->postcode }}</div>
                    <div class="d-flex align-items-center">
                        <span class="mr-0d5r"><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#dfUserEditAddress_{{ $address->id }}">
                                <img class="img-fluid"
                                     src="{{ asset('images/icon/user/edit-pencil.png') }}"
                                     alt="Edit"></a></span><span class="mr-1d5r">
                            <a class="df-blink" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#dfUserEditAddress_{{ $address->id }}">Edit
                            </a></span>
                        <span class="mr-0d5r"><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#dfUserDeleteAddress_{{ $address->id }}">
                                <img class="img-fluid"
                                     src="{{ asset('images/icon/user/del-x.png') }}"
                                     alt="Del"></a>
                        </span><span>
                            <a  class="df-blink" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#dfUserDeleteAddress_{{ $address->id }}">Delete
                            </a></span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row">
    <div class="col-12 ta-dl-mc-t mb-1 mt-3">
        <h2 class="ff-fptdemi">Add new address</h2>
    </div>
    <div class="col-12 mt-2 mb-3">
        Please add your full postcode and our system will let you choose your exact address from the dropdown menu.
    </div>
</div>
<form class="row mb-0" action="{{ route('profile.addNewAddress') }}" method="POST">
    @csrf
    <div class="col-12 col-md-6">
        <input type="hidden" name="profile-edit" value="1">
        <div class="mb-3">
            <label for="register-postcode" class="form-label">Please add your postcode:</label>
            <input type="text" class="form-control" id="register-postcode" name="postcode" value=""
                   placeholder="Please add your postcode:">
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="mb-3">
            <label for="register-addresses" class="form-label">Please select your address:</label>
            <select class="form-select form-control" id="register-addresses" name="address">
                <option id="register-addresses-option" selected="">Address line, Region....</option>
            </select>
        </div>
    </div>
    <div class="col-12 ta-dl-mc mt-2">
        <button type="submit" id="" class="btn btn-df-lbr btn-sq-lp">Save changes</button>
    </div>
</form>
@include('panels.modals.user-delete-address-modal')
@include('panels.modals.user-edit-address-modal')
@else
    @include('panels.front-user.user-profile-no-addresses')
    @include('front.user-order.add-new-address-modal')
@endif
