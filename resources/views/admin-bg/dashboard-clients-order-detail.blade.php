@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Clients - order detail')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 col-md-6 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all orders</span>
    </a>
    <h4>Order №92813524</h4>
  </div>
  <div class="col-12 col-md-6 mt-1 mb-2 dtr-mtc">
    <button type="button" id="2" class="btn btn-dark text-uppercase mb-1">Edit</button>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <div class="row mb-2">
          <div class="col-12 col-md-3 col-lg-2 mb-05">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>Number</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              14/10/2021
            </div>
          </div>
          <div class="col-12 col-md-3 col-lg-2 mb-05">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>Date order</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              22/10/2021
            </div>
          </div>
          <div class="col-12 col-md-3 col-lg-2 mb-05">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>Client</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              <a href="#">Marina Mihailova</a>
            </div>
          </div>
          <div class="col-12 col-md-3 col-lg-2 mb-05">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>Invoice</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              <a href="#">1234567</a>
            </div>
          </div>
          <div class="col-12 col-md-3 col-lg-2 mb-05">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>Object</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              Kitchen 1
            </div>
          </div>
          <div class="col-12 col-md-3 col-lg-2 mb-05">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>Status order</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              Completed
            </div>
          </div>
          <div class="col-12 col-md-3 col-lg-2 mb-05">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>Area</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              CM13
            </div>
          </div>
          <div class="col-12 col-md-3 col-lg-2 mb-05">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>District</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              Hutton Central
            </div>
          </div>
          <div class="col-12 col-md-3 col-lg-2 mb-05">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>PC Address</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              <a href="#">CM13 1AS</a>
            </div>
          </div>
          <div class="col-12 col-md-3 col-lg-2 mb-05">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>Address</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              4 The Spinney, Hutton, Brentwood, CM13 1AS
            </div>
          </div>
          <div class="col-12 col-md-3 col-lg-2 mb-05">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>Phone number</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              0123456789
            </div>
          </div>
          <div class="col-12 mt-1 mb-1">
            <h5>Order Summary</h5>
          </div>
          <div class="col-12 mt-1 mb-1">
            Datatable JS
          </div>
        </div>
        <div class="row mt-1">
          <div class="col-12 mt-1 mb-0d5">
            <h5 class="d-inline-block pr-1">Track your order for menu</h5><span>24/10/2021</span>
          </div>
          <div class="col-12 mb-1">
            92813524-01
          </div>
          <div class="col-12 mt-1">
            <div class="row">
              <div class="col-12 col-md-2 mb-1 text-center">
                <div class="badge badge-dark crl-40x mb-1">1</div>
                <div><strong>Ordered</strong></div>
                <div>12:30pm 23/10/2021</div>
              </div>
              <div class="col-12 col-md-2 mb-1 text-center">
                <div class="badge badge-dark crl-40x mb-1">2</div>
                <div><strong>Preparing</strong></div>
                <div>6:30am 23/10/2021</div>
              </div>
              <div class="col-12 col-md-2 mb-1 text-center">
                <div class="badge badge-lgrey crl-40x mb-1">3</div>
                <div>Completed</div>
                <div>7:00am 23/10/2021</div>
              </div>
              <div class="col-12 col-md-2 mb-1 text-center">
                <div class="badge badge-lgrey crl-40x mb-1">4</div>
                <div>Courier taken</div>
                <div>7:30am. 23/10/2021</div>
              </div>
              <div class="col-12 col-md-2 mb-1 text-center">
                <div class="badge badge-lgrey crl-40x mb-1">5</div>
                <div>Delivered</div>
                <div>8:30am, 23/10/2021</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-8 mb-1 mt-3">
            <h5 class="mb-0d5">Comment</h5>
            <div class="dtl-mtc">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </div>
          </div>
          <div class="col-12 col-md-4 mb-1 mt-3">
            <div class="row">
              <div class="col-12 col-md-6 dtr-mtc">
                <strong>Created:</strong>
              </div>
              <div class="col-12 col-md-6 dtl-mtc mb-05">
                14/10/2021
              </div>
              <div class="col-12 col-md-6 dtr-mtc">
                <strong>Created by:</strong>
              </div>
              <div class="col-12 col-md-6 dtl-mtc mb-05">
                Website
              </div>
              <div class="col-12 col-md-6 dtr-mtc">
                <strong>Edited: </strong>
              </div>
              <div class="col-12 col-md-6 dtl-mtc mb-05">
                22/10/2021
              </div>
              <div class="col-12 col-md-6 dtr-mtc">
                <strong>Edited by:</strong>
              </div>
              <div class="col-12 col-md-6 dtl-mtc mb-05">
                Ivan Ivanov
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection