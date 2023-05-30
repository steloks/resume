<div class="modal fade df-modal" id="dfArchivePetProfileModal_{{$petId ?? 123}}" tabindex="-1" aria-labelledby="dfArchivePetProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
				<div class="mb-2r text-center">
          <h2 class="ff-fptdemi">Are you sure you would like to archive this profile?</h2>
				</div>
				<div class="mb-2r text-center">
					<span>If you confirm that you would like to archive this pet profile, its profile will be removed and you won’t be able to order food for this pet anymore.</span>
				</div>
        <form action="{{ route('profile.archivePet', ['id' => $petId ?? '']) }}" method="POST">
            @csrf
					<div class="mb-1r text-center">
						<button type="submit" id="" class="btn btn-df-wine btn-sq-lp-l">Archive profile</button>
					</div>
        </form>
      </div>
    </div>
  </div>
</div>
