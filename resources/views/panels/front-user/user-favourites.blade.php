<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12 ta-dl-mc-t mb-1r">
                <h2 class="ff-fptdemi">Favourites</h2>
            </div>
        </div>
        @foreach($pets as $pet)
            @if(!$pet->favourites->isEmpty())
                <div id="carouselPetFavourites{{ $pet->id }}" class="row mt-1r py-1r carousel slide" data-ride="carousel" data-bs-interval="false">
                    <div class="col-12 mb-1r">
                        <div class="row align-items-center">
                            <div class="col-6 fz-20xr fw-600">
                                FOR {{ ucfirst($pet->name) }}
                            </div>
                            <div class="col-6 ta-right carousels-favourites">
                                <button class="carousel-control-prev position-relative d-inline-block" type="button" data-bs-target="#carouselPetFavourites{{ $pet->id }}" data-bs-slide="prev">
              <span class=""><svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_895_12725)">
                    <path d="M0.499999 13.5C0.5 6.3203 6.3203 0.5 13.5 0.500001C20.6797 0.500001 26.5 6.3203 26.5 13.5C26.5 20.6797 20.6797 26.5 13.5 26.5C6.3203 26.5 0.499999 20.6797 0.499999 13.5Z" stroke="#333333"></path>
                    <path d="M9.2569 13.5C9.2569 13.3296 9.31974 13.159 9.44526 13.029L15.8738 6.36663C16.125 6.1063 16.5318 6.1063 16.7828 6.36663C17.0338 6.62697 17.034 7.04852 16.7828 7.30869L10.8088 13.5L16.7828 19.6913C17.034 19.9516 17.034 20.3732 16.7828 20.6333C16.5316 20.8935 16.1248 20.8937 15.8738 20.6333L9.44526 13.971C9.31974 13.8409 9.2569 13.6704 9.2569 13.5Z" fill="black"></path>
                  </g>
                  <defs>
                    <clipPath id="clip0_895_12725">
                      <rect width="27" height="27" fill="white" transform="translate(27 27) rotate(-180)"></rect>
                    </clipPath>
                  </defs>
                </svg> </span>
                                </button>
                                <button class="carousel-control-next position-relative d-inline-block" type="button" data-bs-target="#carouselPetFavourites{{ $pet->id }}" data-bs-slide="next">
              <span class=""><svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="13.5" cy="13.5" r="13" stroke="#333333"></circle>
                  <path d="M17.7431 13.5C17.7431 13.6704 17.6803 13.841 17.5547 13.971L11.1262 20.6334C10.875 20.8937 10.4682 20.8937 10.2172 20.6334C9.96617 20.373 9.96601 19.9515 10.2172 19.6913L16.1912 13.5L10.2172 7.30871C9.96601 7.04838 9.96601 6.62682 10.2172 6.36666C10.4684 6.10649 10.8752 6.10633 11.1262 6.36666L17.5547 13.029C17.6803 13.1591 17.7431 13.3296 17.7431 13.5Z" fill="black"></path>
                </svg></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row mb-3 carousel-inner">
                            @php
                                $countItems = 1;
                                $elmClassActive = ' active';
                            @endphp
                            @foreach($pet->favourites as $recipe)
                                @if($countItems % 2 !== 0)
                                    <div class="col-12 carousel-item{{ $elmClassActive }}">
                                        <div class="row">
                                            @endif
                                            <div class="col-12 col-md-6 ta-dl-mc mb-2r cl-to-remove">
                                                <div class="row m-0 brd-lgry-1 bg-white">
                                                    <div class="col-12 col-xl-6 px-0 position-relative">
                                                        <img src="{{ asset('images/menu/1/menu1.png') }}" class="img-fluid favorite-img-in" alt="Pet pic">
                                                        <a href="javascript:void(0)" id="favourite_menu_{{ $recipe->id }}_{{ $pet->id }}" class="favorite-icon js-favourite-menu remove-whole-recipe" data-url="{{ route('order.favouriteRecipe') }}" data-recipe-id="{{ $recipe->id }}" data-user-id="{{ auth()->user()->id }}" data-pet-id="{{ $pet->id }}">
                                                            <img src="{{ asset('images\heart-true.svg') }}" alt="" class="heart-true">
                                                            <img src="{{ asset('images\heart-false.svg') }}" alt="" class="heart-false d-none">
                                                        </a>
                                                    </div>
                                                    <div class="col-12 col-xl-6 mt-3 mb-1r bw-ball">
                                                        <div class="fz-20xr mb-0d5r ff-fptbold favorite-title-in">{{$recipe->name}}</div>
                                                        <div class="mb-1r">
                                                            {!! implode(',', $recipe->products->pluck('name')->toArray()) !!}
                                                        </div>
                                                        <div class="mb-1r">
                                                            <span class="text-uppercase ff-fptdemi">Weight: </span><span>{{ \App\Traits\RecipeCalculator::recipeCalc($recipe->id, $pet->id)['weight'] }}gr</span>
                                                        </div>
                                                        <div class="mb-1r">
                                                            <span class="text-uppercase ff-fptdemi">Calories: </span><span>{{ \App\Traits\RecipeCalculator::recipeCalc($recipe->id, $pet->id)['kcal'] }}</span>
                                                        </div>
                                                        <div class="mb-1r">
                                                            <span class="text-uppercase ff-fptdemi">Price: </span><span>£{{ \App\Traits\RecipeCalculator::recipeCalc($recipe->id, $pet->id)['price'] }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $countItems++;
                                                $elmClassActive = '';
                                            @endphp
                                            @if((($countItems - 1) % 2 === 0) || (count($pet->favourites) === ($countItems - 1)))
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
