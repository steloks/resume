@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Our menus')
@section('content')
    <div class="w-100 bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0 mb-3r">
                    <img class="w-100 dd-b-md-n" src="{{ asset('images/our-menus/our-menus-top-banner.jpg') }}" alt="Pic">
                    <img class="w-100 dd-n-md-b" src="{{ asset('images/our-menus/our-menus-top-banner-m.png') }}" alt="Pic">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-3r mt-2r df-rev text-center">
                <div class="col-12 col-lg-6 mb-1r align-self-center lh-1d3">
                    <p class="fz-2r ff-avtr mb-1r fw-700 lh-1d3">Personalized approach</p>
                    <p>The food we offer you will be unique and fully consistent with the condition, age, activity and characteristics of your dog, to provide him/her with all the necessary ingredients for a healthy, active, long and happy life.</p>
                    <div class="row text-uppercase mt-1r">
                        <div class="col-12 col-md-4 align-self-end">
                            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/perfectly-portioned.png') }}" alt="Icon"></div>
                            <div class="ff-fptdemi ls-1x">Perfectly portioned</div>
                        </div>
                        <div class="col-12 col-md-4 align-self-end">
                            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/rich-in-nutrition.png') }}" alt="Icon"></div>
                            <div class="ff-fptdemi ls-1x">Rich in nutrition</div>
                        </div>
                        <div class="col-12 col-md-4 align-self-end">
                            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/personalized-menu.png') }}" alt="Icon"></div>
                            <div class="ff-fptdemi ls-1x">personalized menu</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-1r">
                    <img class="img-fluid" src="{{ asset('images/our-menus/personalized-approach.jpg') }}" alt="Pic">
                </div>
            </div>
            <div class="row mb-3r text-center">
                <div class="col-12 col-lg-6 mb-1r">
                    <img class="img-fluid" src="{{ asset('images/our-menus/fresh-and-quality-food.jpg') }}" alt="Pic">
                </div>
                <div class="col-12 col-lg-6 align-self-center mb-1r lh-1d3">
                    <p class="fz-2r ff-avtr mb-1r fw-700 lh-1d3">Fresh and quality food</p>
                    <p>We will provide you with a short time cycle between your order and the delivery of your individual menu, which will guarantee the complete freshness and quality of the food prepared from excellent ingredients.</p>
                    <div class="row text-uppercase mt-1r">
                        <div class="col-12 col-md-4">
                            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/preservatives-free.png') }}" alt="Icon"></div>
                            <div class="ff-fptdemi ls-1x">Preservatives free</div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/flavorings-free.png') }}" alt="Icon"></div>
                            <div class="ff-fptdemi ls-1x">Flavorings free</div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/fragrances-free.png') }}" alt="Icon"></div>
                            <div class="ff-fptdemi ls-1x">Fragrances free</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2r mb-3r">
                <div class="col-12 py-2r fz-2r ff-avtr fw-700 lh-1d3 text-center">
                    Ingredients
                </div>
                <div class="col-12 col-md-6 py-2r">
                    <div class="row">
                        <div class="col-12 col-md-2 text-center mb-1r">
                            <img class="img-fluid" src="{{ asset('images/icon/our-menus/chicken.png') }}" alt="Icon">
                        </div>
                        <div class="col-12 col-md-10 ta-dl-mc mb-1r align-self-center">
                            <div class="fz-20xr ff-avtr mb-0d5r">Chicken</div>
                            <div>We are working with trusted suppliers: Supplier 1, Supplier 2, Supplier 3 and so on...</div>
                        </div>
                        <div class="col-12 col-md-2 text-center mb-1r">
                            <img class="img-fluid" src="{{ asset('images/icon/our-menus/fish.png') }}" alt="Icon">
                        </div>
                        <div class="col-12 col-md-10 ta-dl-mc mb-1r align-self-center">
                            <div class="fz-20xr ff-avtr mb-0d5r">fish</div>
                            <div>We are working with trusted suppliers: Supplier 1, Supplier 2, Supplier 3 and so on...</div>
                        </div>
                        <div class="col-12 col-md-2 text-center mb-1r">
                            <img class="img-fluid" src="{{ asset('images/icon/our-menus/eggs.png') }}" alt="Icon">
                        </div>
                        <div class="col-12 col-md-10 ta-dl-mc mb-1r align-self-center">
                            <div class="fz-20xr ff-avtr mb-0d5r">eggs</div>
                            <div>We are working with trusted suppliers: Supplier 1, Supplier 2, Supplier 3 and so on...</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-2r">
                    <div class="row">
                        <div class="col-12 col-md-2 text-center mb-1r">
                            <img class="img-fluid" src="{{ asset('images/icon/our-menus/beef.png') }}" alt="Icon">
                        </div>
                        <div class="col-12 col-md-10 ta-dl-mc mb-1r align-self-center">
                            <div class="fz-20xr ff-avtr mb-0d5r">Beef</div>
                            <div>We are working with trusted suppliers: Supplier 1, Supplier 2, Supplier 3 and so on...</div>
                        </div>
                        <div class="col-12 col-md-2 text-center mb-1r">
                            <img class="img-fluid" src="{{ asset('images/icon/our-menus/vegetables.png') }}" alt="Icon">
                        </div>
                        <div class="col-12 col-md-10 ta-dl-mc mb-1r align-self-center">
                            <div class="fz-20xr ff-avtr mb-0d5r">vegetables</div>
                            <div>We are working with trusted suppliers: Supplier 1, Supplier 2, Supplier 3 and so on...</div>
                        </div>
                        <div class="col-12 col-md-2 text-center mb-1r">
                            <img class="img-fluid" src="{{ asset('images/icon/our-menus/by-products.png') }}" alt="Icon">
                        </div>
                        <div class="col-12 col-md-10 ta-dl-mc mb-1r align-self-center">
                            <div class="fz-20xr ff-avtr mb-0d5r">By-products</div>
                            <div>We are working with trusted suppliers: Supplier 1, Supplier 2, Supplier 3 and so on...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bg-omenus-2art" class="container-fluid position-relative py-2r">
            <div class="row py-3r">
                <div class="col-12 mb-3r container">
                    <div class="row">
                        <div class="col-12 text-center">
                        </div>
                    </div>
                </div>
                <div class="col-12 container">
                    <div class="row">
                        <div class="col-12 text-center align-self-center lh-1d3">
                            <div class="row mt-1r">
                                <div class="col-12 col-md-4 align-self-end">
                                    <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/paw.png') }}" alt="Icon"></div>
                                    <div class="mb-1r text-uppercase ff-fptdemi ls-1x">Create your pet profile</div>
                                    <div class="mb-1r">We'll ask you a few questions about your dog, and create their perfect plan. How active are they? How old are they? Do they have any allergies?</div>
                                </div>
                                <div class="col-12 col-md-4 align-self-end">
                                    <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/recommended-menus.png') }}" alt="Icon"></div>
                                    <div class="mb-1r text-uppercase ff-fptdemi ls-1x">Pick from our recommended menus</div>
                                    <div class="mb-1r">We will recommend the perfect menus and portions for your dog based on their needs. You will be able to choose from a list of recommended menus and pick time and date for delivery.</div>
                                </div>
                                <div class="col-12 col-md-4 align-self-end">
                                    <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/daily-delivery.png') }}" alt="Icon"></div>
                                    <div class="mb-1r text-uppercase ff-fptdemi ls-1x">Daily delivery</div>
                                    <div class="mb-1r">Your best friend’s food will be delivered daily to your door so he/she can enjoy his freshly cooked meals. Orders for the next day are accepted until 16:00 each day.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 py-2r text-center zix-1">
                            <button type="button" id="" class="btn btn-df-lbr btn-sq-lp js-redirect-or-login" data-order-url="{{ route('order.index') }}">start now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 container">
            <div class="row">
                <div class="col-12 text-center py-2r my-2r">
                    <div class="py-2r px-2r hbf-1 brd-4bl">
                        <div class="py-1r">
                            <img class="img-fluid" src="{{ asset('images/icon/our-menus/dog-h.png') }}" alt="Icon">
                        </div>
                        <div class="fz-2r ff-avtr py-1r fw-700 lh-1d3">
                            How to choose the best meal plan for your pet?
                        </div>
                        <div class="mb-1r fz-16xr lh-1d3">To choose the best menu for your dog, trust our experts, who will offer you several customized options, based on the information you have shared in your dog's profile. Our experts have <strong>many years of experience in properly feeding pets with freshly prepared, homemade food.</strong> In the process of research and work we have come to the important conclusion that it is very good for dogs to have one day of fasting a week and this significantly improves their overall condition..</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bg-omenus-1" class="container-fluid">
            <div class="row py-1r">
                <div class="col-12 my-2r container">
                    <div class="row">
                        <div class="col-12 col-md-6 py-2r px-2r">
                            <img class="img-fluid" src="{{ asset('images/our-menus/dog-1.png') }}" alt="Pic">
                        </div>
                        <div class="col-12 col-md-6 py-2r px-2r align-self-center">
                            <div class="fz-2r ff-avtr mb-1r fw-700 lh-1d3">Chani’s favorite menu</div>
                            <div class="mb-2r">Channy is a baby princess! Her taste for the world is delicious!</div>
                            <div class="mb-2r">
                                <div class="mb-0d5r">
                                    <span class="w-60x d-inline-block">Age:</span>
                                    <span><strong>8 month old Princess</strong></span>
                                </div>
                                <div class="mb-0d5r">
                                    <span class="w-60x d-inline-block">Gender:</span>
                                    <span><strong>Female</strong></span>
                                </div>
                                <div>
                                    <span class="w-60x d-inline-block">Weight:</span>
                                    <span><strong>2.500 kg</strong></span>
                                </div>
                            </div>
                            <div class="mb-1r">Channy’s perfect-match menu includes:</div>
                            <div class="text-uppercase">
              <span class="text-center d-inline-block mr-1r mb-0d5r">
                <img class="img-fluid mb-0d5r" src="{{ asset('images/icon/our-menus/veal.png') }}" alt="Icon"><br>
                <span class="ff-fptdemi ls-1x">veal</span>
              </span>
                                <span class="text-center d-inline-block mr-1r mb-0d5r">
                <img class="img-fluid mb-0d5r" src="{{ asset('images/icon/our-menus/pumpkin.png') }}" alt="Icon"><br>
                <span class="ff-fptdemi ls-1x">pumpkin</span>
              </span>
                                <span class="text-center d-inline-block mr-1r mb-0d5r">
                <img class="img-fluid mb-0d5r" src="{{ asset('images/icon/our-menus/pasta.png') }}" alt="Icon"><br>
                <span class="ff-fptdemi ls-1x">pasta</span>
              </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bg-omenus-2" class="container-fluid">
            <div class="row py-1r">
                <div class="col-12 my-2r container">
                    <div class="row df-rev-lg">
                        <div class="col-12 col-md-6 py-2r px-2r align-self-center">
                            <div class="fz-2r ff-avtr mb-1r fw-700 lh-1d3">Derek’s favorite menu</div>
                            <div class="mb-2r">Derek is a very active dog and his father takes his to a long walks every day.</div>
                            <div class="mb-2r">
                                <div class="mb-0d5r">
                                    <span class="w-60x d-inline-block">Age:</span>
                                    <span><strong>One-year-old Alf</strong></span>
                                </div>
                                <div class="mb-0d5r">
                                    <span class="w-60x d-inline-block">Gender:</span>
                                    <span><strong>Male</strong></span>
                                </div>
                                <div>
                                    <span class="w-60x d-inline-block">Weight:</span>
                                    <span><strong>32kg</strong></span>
                                </div>
                            </div>
                            <div class="mb-1r">Derek’s perfect-match menu includes:</div>
                            <div class="text-uppercase">
              <span class="text-center d-inline-block mr-1r mb-0d5r">
                <img class="img-fluid mb-0d5r" src="{{ asset('images/icon/our-menus/liver.png') }}" alt="Icon"><br>
                <span class="ff-fptdemi ls-1x">liver</span>
              </span>
                                <span class="text-center d-inline-block mr-1r mb-0d5r">
                <img class="img-fluid mb-0d5r" src="{{ asset('images/icon/our-menus/eggs-bw.png') }}" alt="Icon"><br>
                <span class="ff-fptdemi ls-1x">eggs</span>
              </span>
                                <span class="text-center d-inline-block mr-1r mb-0d5r">
                <img class="img-fluid mb-0d5r" src="{{ asset('images/icon/our-menus/broccoli.png') }}" alt="Icon"><br>
                <span class="ff-fptdemi ls-1x">broccoli</span>
              </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 py-2r px-2r">
                            <img class="img-fluid" src="{{ asset('images/our-menus/dog-2.png') }}" alt="Pic">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bg-omenus-3" class="container-fluid">
            <div class="row py-1r">
                <div class="col-12 my-2r container">
                    <div class="row">
                        <div class="col-12 col-md-6 py-2r px-2r">
                            <img class="img-fluid" src="{{ asset('images/our-menus/dog-3.png') }}" alt="Pic">
                        </div>
                        <div class="col-12 col-md-6 py-2r px-2r align-self-center">
                            <div class="fz-2r ff-avtr mb-1r fw-700 lh-1d3">Esme’s favorite menu</div>
                            <div class="mb-2r">Esme is a very active dog and his father takes his to a long walks every day.</div>
                            <div class="mb-2r">
                                <div class="mb-0d5r">
                                    <span class="w-60x d-inline-block">Age:</span>
                                    <span><strong>3 years</strong></span>
                                </div>
                                <div class="mb-0d5r">
                                    <span class="w-60x d-inline-block">Gender:</span>
                                    <span><strong>Male</strong></span>
                                </div>
                                <div>
                                    <span class="w-60x d-inline-block">Weight:</span>
                                    <span><strong>23kg</strong></span>
                                </div>
                            </div>
                            <div class="mb-1r">Esme’s perfect-match menu includes:</div>
                            <div>
              <span class="text-center d-inline-block mr-1r mb-0d5r">
                <img class="img-fluid" src="{{ asset('images/icon/our-menus/paw.png') }}" alt="Icon"><br>
                <span class="ff-fptdemi ls-1x">Ingredient 1</span>
              </span>
                                <span class="text-center d-inline-block mr-1r mb-0d5r">
                <img class="img-fluid" src="{{ asset('images/icon/our-menus/paw.png') }}" alt="Icon"><br>
                <span class="ff-fptdemi ls-1x">Ingredient 2</span>
              </span>
                                <span class="text-center d-inline-block mr-1r mb-0d5r">
                <img class="img-fluid" src="{{ asset('images/icon/our-menus/paw.png') }}" alt="Icon"><br>
                <span class="ff-fptdemi ls-1x">Ingredient 3</span>
              </span>
                                <span class="text-center d-inline-block mr-1r mb-0d5r">
                <img class="img-fluid" src="{{ asset('images/icon/our-menus/paw.png') }}" alt="Icon"><br>
                <span class="ff-fptdemi ls-1x">Ingredient 4</span>
              </span>
                                <span class="text-center d-inline-block mr-1r mb-0d5r">
                <img class="img-fluid" src="{{ asset('images/icon/our-menus/paw.png') }}" alt="Icon"><br>
                <span class="ff-fptdemi ls-1x">Ingredient 5</span>
              </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
