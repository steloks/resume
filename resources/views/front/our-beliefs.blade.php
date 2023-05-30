@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Our beliefs')
@section('content')
    <div class="w-100 bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0 mb-3r">
                    <img class="dd-b-md-n w-100" src="{{ asset('images/our-beliefs/our-beliefs-top-banner.jpg') }}" alt="Pic">
                    <img class="dd-n-md-b w-100" src="{{ asset('images/our-beliefs/our-beliefs-top-banner-m.png') }}" alt="Pic">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-3r ta-dl-mc df-rev">
                <div class="col-12 col-lg-6 mb-1r align-self-center lh-1d3">
                    <p class="fz-2r ff-avtr mb-1r fw-700 lh-1d3 vbl-g">Dogs are equal to human beings and we are responsible for how we take care of them and what we do to make their lives good, long and happy.</p>
                    <p>People receive a huge amount of love from their pets and it is only natural to respond with the same. It is normal and expe cted that if a person prefers good freshly prepared, healthy food, the same quality food will be available for the dog, because no one who really loves his four-legged friend feels good eating steak while he chews pellets.</p>
                </div>
                <div class="col-12 col-lg-6 mb-1r">
                    <img class="img-fluid" src="{{ asset('images/our-beliefs/pic-1.jpg') }}" alt="Pic">
                </div>
            </div>
            <div class="row mb-3r mt-2r ta-dl-mc">
                <div class="col-12 col-lg-6 mb-1r">
                    <img class="img-fluid" src="{{ asset('images/our-beliefs/pic-2.jpg') }}" alt="Pic">
                </div>
                <div class="col-12 col-lg-6 mb-1r align-self-center lh-1d3">
                    <p class="fz-2r ff-avtr mb-1r fw-700 lh-1d3 vbl-dr">Most of us, humans, adore dogs and, as in any love affair, we strive to turn them into a perfect fantasy that is in our minds. </p>
                    <p>We have been modifying them for thousands of years, changing their appearance, behavior and temperament according to our needs and whims. This deep bond, which makes us less lonely and so devotedly loved by other species, has brought to pets incredible evolutionary success. The species is distributed on all continents, in huge quantities. However, in the process, we, taking on the role of parents, have taken away their ability to cope with their survival without our care.</p>
                </div>
            </div>
            <div class="row mb-3r ta-dl-mc df-rev">
                <div class="col-12 col-lg-6 mb-1r align-self-center lh-1d3">
                    <p class="fz-2r ff-avtr mb-1r fw-700 lh-1d3 vbl-b">We choose their home, their activity, medical care and most of all their food.</p>
                    <p>Strangely enough, only in the nutrition, which is actually the most important and essential, we have not achieved high quality, as with all other dog care.</p>
                    <p>Perhaps this is because we ourselves have recently begun to reconsider our eating habits and change them in the direction of healthy eating of fresh and homemade food. A positive change, however, which should include everyone, because our dogs are members of our families.</p>
                </div>
                <div class="col-12 col-lg-6 mb-1r">
                    <img class="img-fluid" src="{{ asset('images/our-beliefs/pic-3.jpg') }}" alt="Pic">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div id="bg-omenus-1art" class="col-12 position-relative pt-2r pb-4r ta-dl-mc">
                    <div>
                        <div class="row py-2r">
                            <div class="col-12 my-3r container">
                                <div class="row">
                                    <div class="col-12 col-md-9 px-2r m-auto vbl-g">
                                        <div class="fz-2r ff-avtr mb-1r fw-700 lh-1d3">RESPONSIBILITY, LOVE AND PERSISTENCE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
