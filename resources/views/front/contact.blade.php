@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'Contact')
@section('content')
<div class="w-100 bg-white bg-art">
  <div id="b-home-1" class="container-fluid">
    <div class="row py-3r">
      <div class="col-12 my-2r container">
        <div class="row">
          <div class="col-12 text-center">
            <h1 class="fz-36xr ff-avtr mb-1r fw-700 lh-1d3">Contact</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 container">
    <div class="row mt-2r mb-3r">
      <div class="col-12 col-xl-6 py-2r">
        <div class="row">
          <div class="col-12 col-md-2 text-center mb-1r">
            <img class="img-fluid" src="{{ asset('images/icon/contact/address.svg') }}" alt="Icon">
          </div>
          <div class="col-12 col-md-10 ta-dl-mc mb-1r align-self-center">
            <div class="fz-20xr ff-avtr mb-0d5r">Address</div>
            <div>160 Kemp House, City Road, London, EC1V 2NX</div>
          </div>
          <div class="col-12 col-md-2 text-center mb-1r">
            <img class="img-fluid" src="{{ asset('images/icon/contact/phone.svg') }}" alt="Icon">
          </div>
          <div class="col-12 col-md-10 ta-dl-mc mb-1r align-self-center">
            <div class="fz-20xr ff-avtr mb-0d5r">phone</div>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
          </div>
          <div class="col-12 col-md-2 text-center mb-1r">
            <img class="img-fluid" src="{{ asset('images/icon/contact/email.svg') }}" alt="Icon">
          </div>
          <div class="col-12 col-md-10 ta-dl-mc mb-1r align-self-center">
            <div class="fz-20xr ff-avtr mb-0d5r">email</div>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
          </div>
        </div>
      </div>
      <div class="col-12 col-xl-6 py-2r text-center">
        <div class="row m-0">
          <div class="col-12 brd-1x-c4 px-2r py-2r ">
            <div class="row">
              <div class="col-12 mb-1r">
                <img class="img-fluid" src="{{ asset('images/icon/contact/get-in-touch.png') }}" alt="Icon">
              </div>
              <div class="col-12 fz-26xr ff-fptdemi mb-1r">
                Get in touch with us
              </div>
              <div class="col-12 mb-3r">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              </div>
              <div class="col-12 mb-2r">
                <form name="" id="" class="row" action="{{route('contact.form')}}" method="POST">
                    @csrf
                  <div class="col-12 col-md-6 mb-3">
                    <input type="text" class="form-control brd-btm-only" id="" name="name" placeholder="Name">
                  </div>
                  <div class="col-12 col-md-6 mb-3">
                    <input type="text" class="form-control brd-btm-only" id="" name="email" placeholder="Email">
                  </div>
                  <div class="col-12 mb-3">
                    <textarea class="form-control brd-btm-only txt-a-nr w-100" id="" name="message" rows="7" placeholder="Message"></textarea>
                  </div>
                  <div class="mb-2 mt-2 ta-dl-mc">
                    <div class="form-check form-check-inline lh-19x">
                      <input class="form-check-input" type="checkbox" id="3" name="policy" value="option1">
                      <label class="form-check-label" for="3">I agree with the <a href="{{ url('privacy-policy') }}" class="df-blink">
                        <strong>Privacy policy</strong></a>
                      </label>
                    </div>
                  </div>
                    <div class="col-12">
                        <button type="submit" id="" class="btn btn-df-lbr btn-sq-lp w-100">SEND</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
