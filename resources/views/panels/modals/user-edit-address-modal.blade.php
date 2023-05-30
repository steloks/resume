@foreach($addresses as $address)
    <div class="modal fade df-modal" id="dfUserEditAddress_{{ $address->id }}" tabindex="-1" aria-labelledby="dfUserEditAddressLabel" data-modal-id="{{ $address->id }}" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-2r text-center">
					<h2 class="ff-fptdemi">Edit address</h2>
				</div>
				<form action="{{ route('profile.updateAddress', ['id' => $address->id]) }}" method="POST">
                    @csrf
					<div class="mb-3">
						<label for="register-postcode" class="form-label">Please add your postcode:</label>
						<input type="text" class="form-control" id="register-postcode" name="postcode" value="{{ $address->postcode }}">
					</div>
					<div class="mb-2r">
						<label for="register-addresses-modal-edit_{{ $address->id }}" class="form-label">Please select your address:</label>
						<select class="form-select form-control" id="register-addresses-modal-edit_{{ $address->id }}" name="address">
							<option id="register-addresses-option" selected="{{ $address->address }}">{{ $address->address }}</option>
						</select>
					</div>
					<div class="mb-3 text-center">
						<button type="submit" id="" class="btn btn-df-lbr btn-sq-lp">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach
