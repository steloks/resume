@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Home page')
@section('content')
<div class="w-100 bg-white">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center p-0">
        <div id="carouselTopHome" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselTopHome" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselTopHome" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselTopHome" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{ asset('images/sliders/home/home-top-slide-1.jpg') }}" alt="First slide">
              <div class="carousel-caption fz-36xr fw-700">
                <p class="text-uppercase"><span class="ff-gvb fz-84xr">F</span>RESHLY COOKED, HOMEMADE </p>
                <p class="text-uppercase">FOOD, QUICKLY AND ECOLOGICALLY</p>
                <p class="text-uppercase">DELIVERED TO YOUR DOG!</p>
                <p class="m-0"><button type="button" id="" class="btn btn-df-lbr btn-sq-lp">More about our menus</button></p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('images/sliders/home/home-top-slide-2.jpg') }}" alt="Second slide">
              <div class="carousel-caption fz-36xr fw-700">
                <p class="text-uppercase"><span class="ff-gvb fz-84xr">F</span>RESHLY COOKED, HOMEMADE </p>
                <p class="text-uppercase">FOOD, QUICKLY AND ECOLOGICALLY</p>
                <p class="text-uppercase">DELIVERED TO YOUR DOG!</p>
                <p class="fz-18xr text-propercase fw-400 lh-24x">“As heterosexual couples say - Rocco was not planned! He is our gift from the universe. At least to understand what love is! We do not know how he was born, what he suffered before he was saved. From the moment we met and decided that he was part of the family, we accepted our child as an equal member of the family with his needs. We do not have established rules and training, we do not believe in that. Rocco is a citizen and a full-fledged being with his own character and individuality.”</p>
                <p class="fz-18xr fw-400 lh-2 text-uppercase ff-fptdemi">- Slav&Huben - fashion creatives and all time bohemians</p>
                <p class="m-0"><button type="button" id="" class="btn btn-df-lbr btn-sq-lp">More about our menus</button></p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('images/sliders/home/home-top-slide-3.jpg') }}" alt="Third slide">
              <div class="carousel-caption fz-36xr clr-black fw-700">
                <p class="text-uppercase"><span class="ff-gvb fz-84xr">F</span>RESHLY COOKED, HOMEMADE </p>
                <p class="text-uppercase">FOOD, QUICKLY AND ECOLOGICALLY</p>
                <p class="text-uppercase">DELIVERED TO YOUR DOG!</p>
                <p class="fz-18xr text-propercase fw-400 lh-24x">“I became wolfs wife .I was overwhelmed by snow and wind. I went downstairs and licked my heart.”</p>
                <p class="fz-18xr fw-400 lh-2 text-uppercase ff-fptdemi">- Vanchella- fine art artist and poetry addict</p>
                <p class="m-0"><button type="button" id="" class="btn btn-df-lbr btn-sq-lp">More about our menus</button></p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselTopHome" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselTopHome" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0">
    <div id="banner-home-1" class="row m-0">
      <div class="col-12 col-md-6"></div>
      <div class="col-12 col-md-6 banner-home-1 text-center lh-19x">
        <p class="fz-36xr ff-avtr mb-2r fw-700 lh-1d3">United by our great love for animals.</p>
        <p class="mb-2r">We believe that you feel the same love, concern and responsibility for your little friends, who have been members of our families for centuries and, like us, have been looking for the best for them for a long time. Therefore, we invite you to take advantage of our experience and to join us in making the life of our loved friends happy and healthy.</p>
        <p class="m-0"><button type="button" id="" class="btn btn-df-lbr btn-sq-lp">our philosophy</button></p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center py-2r my-2r">
        <div class="fz-36xr ff-avtr py-2r px-2r mx-3r fw-700 lh-1d3 brd-4bl">We will help you to show your pet your love by delivering daily freshly cooked, homemade food to your doorstep!</div>
      </div>
    </div>
    <div class="row mb-3r text-center">
      <div class="col-12 col-md-6 align-self-center lh-1d3">
        <p class="fz-36xr ff-avtr mb-1r fw-700 lh-1d3">Personalized approach</p>
        <p>The food we offer you will be unique and fully consistent with the condition, age, activity and characteristics of your dog, to provide him/her with all the necessary ingredients for a healthy, active, long and happy life.</p>
        <div class="row text-uppercase mt-1r">
          <div class="col-12 col-md-4 align-self-end">
            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/perfectly-portioned.png') }}" alt="Icon"></div>
            <div>Perfectly portioned</div>
          </div>
          <div class="col-12 col-md-4 align-self-end">
            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/rich-in-nutrition.png') }}" alt="Icon"></div>
            <div>Rich in nutrition</div>
          </div>
          <div class="col-12 col-md-4 align-self-end">
            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/personalized-menu.png') }}" alt="Icon"></div>
            <div>personalized menu</div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <img class="img-fluid" src="{{ asset('images/home/dog-sq-1.jpg') }}" alt="Pic">
      </div>
    </div>
    <div class="row mb-3r text-center">
      <div class="col-12 col-md-6">
        <img class="img-fluid" src="{{ asset('images/home/dog-sq-2.jpg') }}" alt="Pic">
      </div>
      <div class="col-12 col-md-6 align-self-center lh-1d3">
        <p class="fz-36xr ff-avtr mb-1r fw-700 lh-1d3">Fresh and quality food</p>
        <p>We will provide you with a short time cycle between your order and the delivery of your individual menu, which will guarantee the complete freshness and quality of the food prepared from excellent ingredients.</p>
        <div class="row text-uppercase mt-1r">
          <div class="col-12 col-md-4">
            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/preservatives-free.png') }}" alt="Icon"></div>
            <div>Preservatives free</div>
          </div>
          <div class="col-12 col-md-4">
            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/flavorings-free.png') }}" alt="Icon"></div>
            <div>Flavorings free</div>
          </div>
          <div class="col-12 col-md-4">
            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/fragrances-free.png') }}" alt="Icon"></div>
            <div>Fragrances free</div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-3r text-center">
      <div class="col-12 col-md-6 align-self-center lh-1d3">
        <p class="fz-36xr ff-avtr mb-1r fw-700 lh-1d3">Delivered with love daily from our kitchen to your doorstep</p>
        <p>We want to make sure that your pet receives the best quality food so his menu will be cooked and delivered to you daily.</p>
        <div class="row text-uppercase mt-1r">
          <div class="col-12 col-md-6">
            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/from-our-kitchen.png') }}" alt="Icon"></div>
            <div>just a few clicks from our kitchen to your pets’ bowl</div>
          </div>
          <div class="col-12 col-md-6">
            <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/guaranteed-fresh-ingredients.png') }}" alt="Icon"></div>
            <div>Guaranteed fresh ingredients</div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <img class="img-fluid" src="{{ asset('images/home/dog-sq-empty.jpg') }}" alt="Pic">
      </div>
    </div>
  </div>
  <div id="b-home-1" class="container-fluid">
    <div class="row py-3r">
      <div class="col-12 mb-3r container">
        <div class="row">
          <div class="col-12 text-center">
            <p>Our cooking process is purposefully designed to ensure the high quality and freshness of food by daily supply of fresh products in the exact quantities needed for the menus every day for specific customers. In our kitchens we do not store surpluses of products that will not leave them the same day in the form of menus pre-selected by our regular customers.</p>
          </div>
        </div>
      </div>
      <div class="col-12 container">
        <div class="row">
          <div class="col-12 text-center align-self-center lh-1d3">
            <div class="row mt-1r">
              <div class="col-12 col-md-4 align-self-end">
                <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/paw.png') }}" alt="Icon"></div>
                <div class="mb-1r text-uppercase">Create your pet profile</div>
                <div class="mb-1r">We'll ask you a few questions about your dog, and create their perfect plan. How active are they? How old are they? Do they have any allergies?</div>
              </div>
              <div class="col-12 col-md-4 align-self-end">
                <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/recommended-menus.png') }}" alt="Icon"></div>
                <div class="mb-1r text-uppercase">Pick from our recommended menus</div>
                <div class="mb-1r">We will recommend the perfect menus and portions for your dog based on their needs. You will be able to choose from a list of recommended menus and pick time and date for delivery.</div>
              </div>
              <div class="col-12 col-md-4 align-self-end">
                <div class="mb-1r mt-3"><img class="img-fluid" src="{{ asset('images/home/icon/daily-delivery.png') }}" alt="Icon"></div>
                <div class="mb-1r text-uppercase">Daily delivery</div>
                <div class="mb-1r">Your best friend’s food will be delivered daily to your door so he/she can enjoy his freshly cooked meals. Orders for the next day are accepted until 16:00 each day.</div>
              </div>
            </div>
          </div>
          <div class="col-12 py-2r text-center">
            <button type="button" id="" class="btn btn-df-lbr btn-sq-lp js-redirect-or-login" data-order-url="{{ route('order.index') }}">start now</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="b-home-2" class="container-fluid">
    <div class="row py-3r">
      <div class="col-12 mb-3r container">
        <div class="row">
          <div class="col-12 text-center clr-white">
            <p class="fz-36xr ff-avtr mb-1r fw-700 lh-1d3">See the happy animals enjoying our homemade food</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="b-home-3" class="container-fluid">
    <div class="row py-3r">
      <div class="col-12 text-center container py-5r">
        <div id="carouselBottomHome" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-3">
                  <img class="img-fluid" src="{{ asset('images/home/sq-black.jpg') }}" alt="Icon">
                </div>
                <div class="col-3">
                  <img class="img-fluid" src="{{ asset('images/home/sq-grey.jpg') }}" alt="Icon">
                </div>
                <div class="col-3">
                  <img class="img-fluid" src="{{ asset('images/home/sq-black.jpg') }}" alt="Icon">
                </div>
                <div class="col-3">
                  <img class="img-fluid" src="{{ asset('images/home/sq-grey.jpg') }}" alt="Icon">
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-3">
                  <img class="img-fluid" src="{{ asset('images/home/sq-black.jpg') }}" alt="Icon">
                </div>
                <div class="col-3">
                  <img class="img-fluid" src="{{ asset('images/home/sq-grey.jpg') }}" alt="Icon">
                </div>
                <div class="col-3">
                  <img class="img-fluid" src="{{ asset('images/home/sq-black.jpg') }}" alt="Icon">
                </div>
                <div class="col-3">
                  <img class="img-fluid" src="{{ asset('images/home/sq-grey.jpg') }}" alt="Icon">
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselBottomHome" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselBottomHome" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="container mb-3r">
    <div class="row py-3r">
      <div class="col-12 fz-36xr ff-avtr mb-2r fw-700 text-center">
        Donate
      </div>
      <div class="col-12">
        <div class="row">
          <div class="col-12 col-md-4 ta-dright-mc mb-1r">
            <img class="img-fluid" src="{{ asset('images/home/donate-1.png') }}" alt="Icon">
          </div>
          <div class="col-12 col-md-4 text-center mb-1r">
            <img class="img-fluid" src="{{ asset('images/home/donate-2.png') }}" alt="Icon">
          </div>
          <div class="col-12 col-md-4 ta-dleft-mc mb-1r">
            <img class="img-fluid" src="{{ asset('images/home/donate-3.png') }}" alt="Icon">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
{{-- <script type="application/javascript" src="{{ 'js/pet.js' }}"></script> --}}
@endsection
