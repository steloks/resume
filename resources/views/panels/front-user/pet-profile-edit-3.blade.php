<div class="row">
  <div class="col-12 fw-600 fz-18xr mb-2r text-center">
    Pet’s physical conditions
  </div>
  <div class="col-12 w-50p-75p-90p m-auto">
      <form action="{{ route('profile.updatePetThirdStep', ['id' => $pet->id]) }}" method="POST">
          @csrf
      <label for="1" class="form-label">Has your pet been neutered?</label>
      <div class="input-group mb-3">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="neutered" id="neutered_1"
                 value="1" {{ ($pet->neutered == 1) ? 'checked' : '' }}>
          <label class="form-check-label" for="neutered_1">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="neutered" id="neutered_2"
                 value="0" {{ ($pet->neutered == 0) ? 'checked' : '' }}>
          <label class="form-check-label" for="neutered_2">No</label>
        </div>
      </div>
      <div class="mb-3">
        <label for="disease" class="form-label">Does your pet have any diseases?</label>
        <select class="form-select form-control js-check-disease" id="disease" name="disease">
          <option value="1" {{ ($pet->disease == 1) ? 'selected' : '' }}>Yes</option>
          <option value="0" {{ ($pet->disease == 0) ? 'selected' : '' }}>No</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="unusual_behavior" class="form-label js-toggle-ub-modal">Does your pet have any unusual behavior?<span class="qhelp"><img src="{{ asset('images/question.png') }}" class="img-fluid" alt="?"></span></label>
        <select class="form-select form-control js-check-ub" id="unusual_behavior" name="unusual_behavior">
          <option value="1" {{ ($pet->unusual_behavior == 1) ? 'selected' : '' }}>Yes</option>
          <option value="0" {{ ($pet->unusual_behavior == 0) ? 'selected' : '' }}>No</option>
        </select>
      </div>
      <div class="row">
        <div class="col-12 fw-600 fz-18xr mt-3 mb-1r ta-dl-mc">
          Allergens
        </div>
        <div class="col-12 mb-1r">
          Please kindly let us know if you have pet is allergic to any of the below allergens. Please kindly select all that apply.
        </div>
      </div>
      <div class="row mb-3">
          @foreach($allergens as $allergen)
              <div class="col-4">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="allergen_{{ $allergen->id }}" name="allergens[]"
                             {{ checkAllergen($pet->product_allergens->firstWhere('id', $allergen->id),$allergen->id) }} value="{{ $allergen->id }}">
                      <label class="form-check-label" for="allergen_{{ $allergen->id }}">
                          {{ $allergen->product->name }}
                      </label>
                  </div>
              </div>
          @endforeach
      </div>
      <button type="submit" class="btn w-100 btn-df-lbr btn-sq-lp mt-1r df-third-update-step">Finish</button>
    </form>
  </div>
</div>
@include('panels.modals.explanation-unusual-behaviour-modal')
@include('panels.modals.consent-diseases-modal')
@include('panels.modals.consent-unusual-behavior-modal')

