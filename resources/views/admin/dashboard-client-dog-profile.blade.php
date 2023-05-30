@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Client - dog profile')
{{-- vendor style --}}
@section('page-styles')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">
<!-- END: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i><span class="ml-05">To all pets</span>
    </a>
    <h4>Charlie</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-3">
    <div class="row">
      <div class="col-12 col-md-4">
        <div class="row">
          <div class="col-12 col-md-6 mb-1 dtl-mtc">
            <img src="{{asset('images/pet/1/pet1.png')}}" class="img-fluid max-wh-125x" alt="Pet pic" />
          </div>
          <div class="col-12 col-md-6 text-center mb-1">
            <div><strong>Charlie</strong></div>
            <div>Golden Retriever</div>
            <div class="mt-1"><span class="badge badge-light-success">Active</span></div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-8">
        <div class="row">
          <div class="col-12">
            <div class="row dmb1-mmb0">
              <div class="col-12 col-md-2 text-center mb-1">
                <div class="text-uppercase">Date of birth:</div>
                <div><strong>Golden Retriever</strong></div>
              </div>
              <div class="col-12 col-md-2 text-center mb-1">
                <div class="text-uppercase">Age:</div>
                <div><strong>3 years and 5 days</strong></div>
              </div>
              <div class="col-12 col-md-2 text-center mb-1">
                <div class="text-uppercase">Gender:</div>
                <div><strong>Female</strong></div>
              </div>
              <div class="col-12 col-md-2 text-center mb-1">
                <div class="text-uppercase">Activity level:</div>
                <div><strong>Normal</strong></div>
              </div>
              <div class="col-12 col-md-3 text-center mb-1">
                <div class="text-uppercase">Unusual behavior</div>
                <div><strong>No</strong></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="row dmb1-mmb0">
              <div class="col-12 col-md-2 text-center mb-1">
                <div class="text-uppercase">Weight:</div>
                <div><strong>23kg</strong></div>
              </div>
              <div class="col-12 col-md-2 text-center mb-1">
                <div class="text-uppercase">Weight level:</div>
                <div><strong>Healthy</strong></div>
              </div>
              <div class="col-12 col-md-2 text-center mb-1">
                <div class="text-uppercase">Neutering:</div>
                <div><strong>Yes</strong></div>
              </div>
              <div class="col-12 col-md-2 text-center mb-1">
                <div class="text-uppercase">Diases:</div>
                <div><strong>No</strong></div>
              </div>
              <div class="col-12 col-md-3 text-center mb-1">
                <div class="text-uppercase">Allergens:</div>
                <div><strong>Allergen 1, Allergen 2, Allergen 3, Allergen 4</strong></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-7 mb-3">
    <div class="">
      <div class="row">
        <div class="col-12 dog-weight-summary">
          <div class="mb-0">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="">Change in weight level</h5>
            </div>
            <div class="card-body p-0">
              <div id="dog-weight-summary-chart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-5 mb-3">
    <div class="row mb-2">
      <div class="col-12 col-md-6 dtr-mtc">
        <div><strong>Owner:</strong></div>
        <div><a href="">Marina Mihaylova</a></div>
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
      </div>
    </div>
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
        <strong>Edited:</strong>
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
  <div class="col-12 mt-1 mb-1">
    <h5 class="">Diary</h5>
  </div>
  <div class="col-12 mb-1">
    Datatable JS
  </div>
</div>
@endsection

@section('vendor-scripts')
<script src="{{asset('vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
@endsection

@section('page-scripts')
<script src="{{asset('js/scripts/pages/client-dog-profile.js')}}"></script>
@endsection