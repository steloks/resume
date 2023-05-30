@foreach($addresses as $address)
    <div class="modal fade df-modal" id="dfUserDeleteAddress_{{ $address->id }}" tabindex="-1" aria-labelledby="dfUserDeleteAddressLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3 text-center">
					<h2 class="ff-fptdemi">Are you sure you would like to delete this address?</h2>
				</div>
				<div class="mb-2r text-center">
					If you confirm that you would like to delete this address, you won’t be able to order food for it before adding it to your profile again.
				</div>
				<form action="{{ route('profile.deleteAddress', ['id' => $address->id]) }}" method="POST">
                    @csrf
					<div class="mb-3 text-center">
						<button type="submit" id="" class="btn btn-df-wine btn-sq-lp">Delete address</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach
