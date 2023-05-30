<div class="modal fade df-modal" id="dfUserAddNewAddress" tabindex="-1" aria-labelledby="dfUserAddNewAddressLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3 text-center">
				<h2 class="ff-fptdemi">Add new address</h2>
				</div>
				<div class="mb-2r text-center">
					Please add your full postcode and our system will let you choose your exact address from the dropdown menu.
				</div>
                    <div class="mb-3">
                        <label for="register-postcode" class="form-label">Please add your postcode:</label>
                        <input type="text" class="form-control order" id="register-postcode" name="postcode_modal" data-transalte="{{__('This postcode is not supported')}}" data-route="{{route('zoning.postcode.valid')}}"
                               placeholder="Please add your postcode:">
                    </div>
                    <div class="mb-2r">
                        <label for="register-addresses" class="form-label">Please select your address:</label>
                        <select id="register-addresses" name="address_modal" class="form-select form-control">
                            <option id="register-addresses-option" selected="">Please select your address:</option>
                        </select>
                    </div>
					<div class="mt-3 text-center">
						<button type="button" id="add-new-address-from-order" class="btn btn-df-lbr btn-sq-lp"
                                data-url="{{ route('profile.addNewAddress') }}">Add new address
                        </button>
					</div>
			</div>
		</div>
	</div>
</div>
