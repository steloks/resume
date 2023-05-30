<div class="row">
    <div class="col-12 col-md-9 text-center mb-1r">
        <h2 class="ff-fptdemi">Choose menu</h2>
    </div>
    <div class="col-12 col-md-9 text-center mb-1r align-self-center fz-20xr">
        These are the recommended menus for <strong>{{$pet->name ?? ''}}</strong> based on his profile
    </div>
    <div class="col-12 col-md-3 ta-dright-mc mb-1r">
        <button type="button" class="btn btn-df-lbr btn-sq-lp order-summary-section-button" data-url="{{ route('order.cart') }}"><span class="va-center">Continue </span>
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M15.125 11C15.125 11.1758 15.0578 11.3518 14.9236 11.486L8.04861 18.361C7.77997 18.6297 7.34495 18.6297 7.07648 18.361C6.80801 18.0924 6.80784 17.6574 7.07648 17.3889L13.4654 11L7.07648 4.61102C6.80784 4.34238 6.80784 3.90736 7.07648 3.63889C7.34512 3.37043 7.78014 3.37025 8.04861 3.63889L14.9236 10.5139C15.0578 10.6481 15.125 10.8241 15.125 11Z" fill="white"/> </svg>
        </button>
    </div>
    <div class="col-12 mt-3r mb-3">
        <div class="mb-3">
            <div class="row">
                @if(isset($recipes))
                    @foreach($recipes as $recipe)
                        <div class="col-12 col-md-6 ta-dl-mc mb-2r">
                            <div class="row m-0 brd-lgry-1">
                                <div class="col-12 col-xl-5 px-0 position-relative">
                                    <img src="{{Storage::disk('recipe')->exists($recipe->id.'/'.$recipe->image) ? 'storage/recipes/'.$recipe->id.'/'.$recipe->image : asset('images/menu/1/menu1.png') }}" class="img-fluid w-100" alt="Pet pic">
                                    <a href="javascript:void(0)" id="favourite_menu_{{ $recipe->id }}_{{ $pet->id }}" class="favorite-icon js-favourite-menu"
                                       data-url="{{ route('order.favouriteRecipe') }}" data-recipe-id="{{ $recipe->id }}" data-user-id="{{ auth()->user()->id }}" data-pet-id="{{ $pet->id }}">
                                                @if(!empty($favouriteRecipes) && optional($favouriteRecipes->where('recipe_id', $recipe->id)->where('user_id', auth()->user()->id)->first())->recipe_id == $recipe->id)
                                                    <img src="{{ asset('images\heart-true.svg') }}" alt="" class="heart-true">
                                                    <img src="{{ asset('images\heart-false.svg') }}" alt="" class="heart-false d-none">
                                                @else
                                                    <img src="{{ asset('images\heart-false.svg') }}" alt="" class="heart-false">
                                                    <img src="{{ asset('images\heart-true.svg') }}" alt="" class="heart-true d-none">
                                                @endif
                                    </a>
                                </div>
                                <div class="col-12 col-xl-7 mt-3 mb-1r bw-ball">
                                    <div class="fz-20xr mb-0d5r ff-fptbold">{{$recipe->name}}</div>
                                    <div class="mb-1r">
                                        {{$recipe->products}}
                                    </div>
                                    <div class="mb-1r">
                                        <span class="text-uppercase ff-fptdemi">Weight: </span><span>{{parseNumber($recipe->weight)}}gr</span>
                                    </div>
                                    <div class="mb-1r">
                                        <span class="text-uppercase ff-fptdemi">Calories: </span><span>{{parseNumber($recipe->kcal)}}</span>
                                    </div>
                                    <div class="mb-1r">
                                        <span class="text-uppercase ff-fptdemi">Price: </span><span>£{{parseNumber($recipe->price)}}</span>
                                    </div>
                                    <div class="mb-1r">
                                        <button type="button" class="btn btn-df-wine btn-sq-lp-l menuSelect"
                                                data-recipeId="{{$recipe->id}}" data-bs-toggle="modal" data-bs-target="#dfUserOrderDetails" >Select
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="row mb-3r py-2r px-1r mx-0 brd-lgry-1">
        <div class="col-12 col-md-3 mb-1r ta-dl-mc">
            <img src="{{ asset('images/cart/dog-art-1.png') }}" class="img-fluid" alt="Pet pic">
        </div>
        <div class="col-12 col-md-6 align-self-center mb-1r ta-dl-mc">
            <div>
                <h2 class="ff-fptdemi">You would like to add food for your other pets?</h2>
            </div>
            <div>Choose menus and meals’ delivery for your other pets</div>
        </div>
        <div class="col-12 col-md-3 text-center align-self-center mb-1r">
            <button type="button" class="btn btn-df-lbr btn-sq-lp newDogRecipes" data-bs-toggle="modal" data-bs-target="#dfUserOrderDogs">Add now</button>
        </div>
    </div>
    {{--
    <div class="row">
        <div class="col-12 text-center mt-2r mb-3r">
            <button type="button" class="btn btn-df-lbr btn-sq-lp-l order-summary-section-button" data-url="{{ route('order.cart') }}">Continue
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M15.125 11C15.125 11.1758 15.0578 11.3518 14.9236 11.486L8.04861 18.361C7.77997 18.6297 7.34495 18.6297 7.07648 18.361C6.80801 18.0924 6.80784 17.6574 7.07648 17.3889L13.4654 11L7.07648 4.61102C6.80784 4.34238 6.80784 3.90736 7.07648 3.63889C7.34512 3.37043 7.78014 3.37025 8.04861 3.63889L14.9236 10.5139C15.0578 10.6481 15.125 10.8241 15.125 11Z" fill="white"/> </svg>
            </button>
        </div>
    </div>
    --}}
</div>
@include('front.user-order.order-details-modal')
@include('front.user-order.order-dogs-modal')
