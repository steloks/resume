@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Blog')
@section('content')
<div class="w-100 bg-white bg-marble">
  <div class="container-fluid">
    <div class="row py-3r">
      <div class="col-12 my-1r container">
        <div class="row">
          <div class="col-12 text-center">
            <p class="fz-36xr ff-avtr mb-1r fw-700 lh-1d3">Blog</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="pt-1r pb-3r container-fluid">
      <div class="row">
        <div class="col-12 container">
          <div class="row pt-2r pb-3r">
            <div class="col-12 col-md-6 col-xl-4 mb-3r">
              <div class="row h-100">
                <div class="col-12 mb-3">
                  <img class="d-block w-100" src="{{ asset('images/blog/1/pic-1.jpg') }}" alt="Pic">
                </div>
                <div class="col-12 mb-3">
                  17.10.2021
                </div>
                <div class="col-12 mb-3 fz-26xr ff-fptdemi">
                  Golden Retrievers
                </div>
                <div class="col-12 mb-3">
                  Intelligent, friendly, fun loving. Three characteristics that describe one of the most popular breeds, the Golden Retriever. They are full of personality.
                </div>
                <div class="col-12">
                  <a class="btn btn-df-lbr btn-sq-tb nav-link df-blink w-max-content" href="#">read more</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4 mb-3r">
              <div class="row h-100">
                <div class="col-12 mb-3">
                  <img class="d-block w-100" src="{{ asset('images/blog/2/pic-1.jpg') }}" alt="Pic">
                </div>
                <div class="col-12 mb-3">
                  23.09.2021
                </div>
                <div class="col-12 mb-3 fz-26xr ff-fptdemi">
                  French Bulldogs
                </div>
                <div class="col-12 mb-3">
                  It may be called the French Bulldog but some of this breed's ancestry stems from the UK. During the Industrial Revolution of the 18th Century, the livelihood.
                </div>
                <div class="col-12">
                  <a class="btn btn-df-lbr btn-sq-tb nav-link df-blink w-max-content" href="#">read more</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4 mb-3r">
              <div class="row h-100">
                <div class="col-12 mb-3">
                  <img class="d-block w-100" src="{{ asset('images/blog/3/pic-1.jpg') }}" alt="Pic">
                </div>
                <div class="col-12 mb-3">
                  08.10.2021
                </div>
                <div class="col-12 mb-3 fz-26xr ff-fptdemi">
                  How to feed your dog well and impact the planet less
                </div>
                <div class="col-12 mb-3">
                  The climate crisis has led many of us to make changes to our lifestyle in order..
                </div>
                <div class="col-12">
                  <a class="btn btn-df-lbr btn-sq-tb nav-link df-blink w-max-content" href="#">read more</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4 mb-3r">
              <div class="row h-100">
                <div class="col-12 mb-3">
                  <img class="d-block w-100" src="{{ asset('images/blog/3/pic-1.jpg') }}" alt="Pic">
                </div>
                <div class="col-12 mb-3">
                  08.10.2021
                </div>
                <div class="col-12 mb-3 fz-26xr ff-fptdemi">
                  How to feed your dog well and impact the planet less
                </div>
                <div class="col-12 mb-3">
                  The climate crisis has led many of us to make changes to our lifestyle in order..
                </div>
                <div class="col-12">
                  <a class="btn btn-df-lbr btn-sq-tb nav-link df-blink w-max-content" href="#">read more</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4 mb-3r">
              <div class="row h-100">
                <div class="col-12 mb-3">
                  <img class="d-block w-100" src="{{ asset('images/blog/1/pic-1.jpg') }}" alt="Pic">
                </div>
                <div class="col-12 mb-3">
                  17.10.2021
                </div>
                <div class="col-12 mb-3 fz-26xr ff-fptdemi">
                  Golden Retrievers
                </div>
                <div class="col-12 mb-3">
                  Intelligent, friendly, fun loving. Three characteristics that describe one of the most popular breeds, the Golden Retriever. They are full of personality.
                </div>
                <div class="col-12">
                  <a class="btn btn-df-lbr btn-sq-tb nav-link df-blink w-max-content" href="#">read more</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4 mb-3r">
              <div class="row h-100">
                <div class="col-12 mb-3">
                  <img class="d-block w-100" src="{{ asset('images/blog/2/pic-1.jpg') }}" alt="Pic">
                </div>
                <div class="col-12 mb-3">
                  23.09.2021
                </div>
                <div class="col-12 mb-3 fz-26xr ff-fptdemi">
                  French Bulldogs
                </div>
                <div class="col-12 mb-3">
                  It may be called the French Bulldog but some of this breed's ancestry stems from the UK. During the Industrial Revolution of the 18th Century, the livelihood.
                </div>
                <div class="col-12">
                  <a class="btn btn-df-lbr btn-sq-tb nav-link df-blink w-max-content" href="#">read more</a>
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