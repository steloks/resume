@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Our philosophy')
@section('content')
    <div class="w-100 bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0 mb-3r">
                    <img class="dd-b-md-n w-100" src="{{ asset('images/our-philosophy/our-philosophy-top-banner.jpg') }}" alt="Pic">
                    <img class="dd-n-md-b w-100" src="{{ asset('images/our-philosophy/our-philosophy-top-banner-m.png') }}" alt="Pic">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-3r mt-2r df-rev ta-dl-mc">
                <div class="col-12 col-lg-6">
                    <img class="img-fluid" src="{{ asset('images/our-philosophy/pic-1.jpg') }}" alt="Pic">
                </div>
                <div class="col-12 col-lg-6 align-self-center lh-1d3">
                    <p class="fz-d36xr-m28xr ff-avtr mb-1r fw-700 lh-1d3 vbl-b">Food as expression of your love for your pet</p>
                    <p>One of the most important things in caring for a dog is to provide <strong>a complete and healthy food that will meet the needs of his body</strong> of protein, trace elements, fuel, vitamins, etc., necessary for growth, health, normal functioning of organs and systems, its activity and behavior.</p>
                    <p>Our constant coexistence with dogs and our many years of experience in researching their needs show that most of the problems with their fur, physical activity, behavior, stress and more are due to poor nutrition or poor quality of the unsuitable food for them.</p>
                    <p><strong>Making an adequate diet tailored to the individual needs of each dog helps many of these phenomena to be improved or to disappear completely.</strong> A dog can live for years without any of the necessary nutrition ingredients, but this will inevitably lead to serious health problems and even the worst, death.</p>
                </div>
            </div>
            <div class="row mb-3r ta-dl-mc">
                <div class="col-12 col-lg-6 align-self-center lh-1d3">
                    <p class="fz-d36xr-m28xr ff-avtr mb-1r fw-700 lh-1d3 vbl-dr">Are commercial foods the best thing for your pet?</p>
                    <p>There are many ways to feed your dog these days. People's love for our hairy family members and our desire to make them happy leads to many different foods, goods and services on the market, which are turned into a huge industry and a source of capitalizing serious profit. Turning pet care into such a money making machine unfortunately distorts and dehumanizes the essence of our shared coexistence and leaves a lasting, negative impact on the functions of the entire ecosystem and the environment.</p>
                    <p>Today, many kinds of businesses constantly invent and offer us dog’s nutrition mixes with more and more exotic ingredients, without practical benefits, whose purpose is simply to attract our attention in order to make a profit.</p>
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <img class="" src="{{ asset('images/icon/our-philosophy/q.png') }}" alt="Icon">
                        </div>
                        <div class="col-12 col-md-10">
                            <p class="clr-dred ff-fptmedium">Commercial foods that we can buy in stores and supermarkets are literally poisonous, in our opinion, because of their ingredients and cooking methods, which involve very high temperatures, transforming some chemicals into others that are toxic and harmful.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <img class="img-fluid" src="{{ asset('images/our-philosophy/pic-2.jpg') }}" alt="Pic">
                </div>
            </div>
        </div>
        <div class="container-fhd">
            <div class="row mt-2r">
                <div class="col-12">
                    <img class="img-fluid" src="{{ asset('images/our-philosophy/banner-middle.jpg') }}" alt="Pic">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="bg-omenus-2">
                        <div class="row py-2r">
                            <div class="col-12 my-3r container">
                                <div class="row">
                                    <div class="col-12 col-md-9 px-2r m-auto ta-dl-mc vbl-w">
                                        <div class="fz-d36xr-m28xr ff-avtr mb-1r fw-700 lh-1d3 clr-white">FRESHLY COOKED, HOMEMADE FOOD, QUICKLY AND ECOLOGICALY DELIVERED TO YOUR DOG!</div>
                                        <p class="clr-white lh-1d3 mb-1r">Freshly prepared, homemade food is the best way to feed your dog by providing everything necessary and delivering delicious, high quality meals, just like ours. This is the professional opinion of prominent veterinarians and our deep conviction stemming from many years of experience as professionals and as people who share good times with their beloved dogs throughout their lives.</p>
                                        <p class="clr-white lh-1d3 m-0">There is nothing more rewarding and pleasant than the satisfied smirk of your beloved friend with whom you shared your lunch. In today's world, with our fast-paced lifestyle, especially now, after the pandemic, when we have so much to catch up with, not many people can take the time to prepare healthy and delicious food for themselves and their furry friends.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-1r">
                <div id="of-video-w" class="col-12 position-relative">
                    <video id="of-video" class="img-fluid" poster="{{ asset('images/our-philosophy/video-poster-1.jpg') }}">
                        <source src="{{ asset('images/our-philosophy/video.mp4') }}" type="video/mp4">
                    </video>
                    <img id="of-video-play" class="vplay-icon" src="{{ asset('images/icon/our-philosophy/video-play.png') }}" alt="Icon">
                </div>
            </div>
            <div class="row py-2r">
                <div class="col-12 my-3r container">
                    <div class="row text-center">
                        <div class="col-12 col-md-9 px-2r m-auto">
                            <div class="mb-1r"><img class="" src="{{ asset('images/icon/our-philosophy/h.png') }}" alt="Icon"></div>
                            <div class="fz-d36xr-m28xr ff-avtr mb-1r fw-700 lh-1d3">Delivered with love from our kitchen to your doorstep</div>
                            <p class="lh-1d3">Our experienced and smiling delivery drivers take very seriously their role as an intermediary in shortening the time for food delivery from us to you, in the specified time slot. You can always share with them your feedback on the food quality or if you have specific requirements and recommendations.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3r">
                <div class="col-12 p-0 col-md-4">
                    <img class="img-fluid w-100" src="{{ asset('images/our-philosophy/s-1.jpg') }}" alt="Pic">
                </div>
                <div class="col-12 p-0 col-md-4">
                    <img class="img-fluid w-100" src="{{ asset('images/our-philosophy/s-2.jpg') }}" alt="Pic">
                </div>
                <div class="col-12 p-0 col-md-4">
                    <img class="img-fluid w-100" src="{{ asset('images/our-philosophy/s-3.jpg') }}" alt="Pic">
                </div>
            </div>
            <div class="row mb-3r py-2r mt-1r">
                <div class="col-12 position-relative">
                    <div class="text-center w-100 ba-1">
                        <div class="fz-d36xr-m28xr ff-avtr mb-1r fw-700 lh-1d3">Join our community of pet lovers!</div>
                        <p class="lh-1d3 mb-3 w-75 dd-b-md-n m-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                        <a class="btn btn-df-wine btn-sq-tb" href="#">join now</a>
                    </div>
                    <img class="img-fluid" src="{{ asset('images/our-philosophy/our-philosophy-bottom-banner.jpg') }}" alt="Pic">
                </div>
            </div>
        </div>
    </div>
@endsection
