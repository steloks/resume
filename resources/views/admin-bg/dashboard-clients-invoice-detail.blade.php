@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Clients - invoice detail')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 col-md-6 mt-1 mb-2">
    <a href="#" class="brd-a-item mb-1">
      <i class="bx bx-arrow-back"></i> <span>To all invoices </span>
    </a>
    <h4>Invoice №92813524</h4>
  </div>
  <div class="col-12 col-md-6 mt-1 mb-2 dtr-mtc">
    <button type="button" id="2" class="btn btn-dark text-uppercase mb-1">Download</button>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-3">
        <div class="row">
          <div class="col-12 col-md-8">
            <div class="row">
              <div class="col-12 col-md-3 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Invoice №</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  12345678
                </div>
              </div>
              <div class="col-12 col-md-3 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Date of issue</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  22/10/2021
                </div>
              </div>
              <div class="col-12 col-md-3 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Order №</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  <a href="#">12345678</a>
                </div>
              </div>
              <div class="col-12 col-md-3 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Date order</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  <a href="#">22/10/2021</a>
                </div>
              </div>
              <div class="col-12 col-md-3 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Name client</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  <a href="#">Marina Mihailova</a>
                </div>
              </div>
              <div class="col-12 col-md-3 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Phone number</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  0123456789
                </div>
              </div>
              <div class="col-12 col-md-3 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>E-mail</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  mihaylova@sfcbg.com
                </div>
              </div>
              <div class="col-12 col-md-3 mb-05">
                <div class="mb-0d5 dtl-mtc text-uppercase">
                  <strong>Address</strong>
                </div>
                <div class="mb-1 dtl-mtc">
                  4 The Spinney, Hutton, Brentwood, CM13 1AS
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-1">
            <div class="mb-0d5 dtl-mtc text-uppercase">
              <strong>Status</strong>
            </div>
            <div class="mb-1 dtl-mtc">
              <span class="badge badge-success">Sent</span>
            </div>
          </div>
          <div class="col-12 col-md-3">
            <div class="row">
              <div class="col-12 col-md-6 mb-05 dtr-mtc">
                <strong>Created:</strong>
              </div>
              <div class="col-12 col-md-6 mb-05 dtl-mtc">
                14/10/2021
              </div>
              <div class="col-12 col-md-6 mb-05 dtr-mtc">
                <strong>Created by:</strong>
              </div>
              <div class="col-12 col-md-6 mb-05 dtl-mtc">
                Website
              </div>
              <div class="col-12 col-md-6 mb-05 dtr-mtc">
                <strong>Edited: </strong>
              </div>
              <div class="col-12 col-md-6 mb-05 dtl-mtc">
                22/10/2021
              </div>
              <div class="col-12 col-md-6 mb-05 dtr-mtc">
                <strong>Edited by:</strong>
              </div>
              <div class="col-12 col-md-6 mb-05 dtl-mtc">
                Ivan Ivanov
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 mt-1">
    Datatable JS
  </div>
</div>
@endsection