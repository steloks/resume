@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - company data detail')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1 mb-2">
    <h4>Company Details</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-1">
        <h5>Company Details</h5>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Company name</label>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Address company</label>
              <input type="text" class="form-control" id="id" name="name" value="74 Manchester Road NEWCASTLE UPON TYNE NE95 7GJ">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Phone number</label>
              <input type="text" class="form-control" id="id" name="name" value="0123456789">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Website:</label>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">E-mail</label>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">VAT Registration Number:</label>
              <input type="text" class="form-control" id="id" name="name" value="1234567890">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Tax address company:</label>
              <input type="text" class="form-control" id="id" name="name" value="74 Manchester Road NEWCASTLE UPON TYNE NE95 7GJ">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Аccountable person:</label>
              <input type="text" class="form-control" id="id" name="name" value="Ivan Ivanov Ivanov">
            </fieldset>
          </div>
          <div class="col-12 mb-1">
            <label for="id">Logo</label>
            <div>
              <img src="{{asset('images/admin/company/1/logo/logo.jpg')}}" class="img-fluid w-max-250x" alt="Logo">
            </div>
          </div>
          <div class="col-12 mt-1 mb-1">
            <h5>Bank Details</h5>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Name bank:</label>
              <input type="text" class="form-control" id="id" name="name" value="Bank name">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">IBAN</label>
              <input type="text" class="form-control" id="id" name="name" value="GB11UK14329103131081-">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">BIC</label>
              <input type="text" class="form-control" id="id" name="name" value="123456789">
            </fieldset>
          </div>
          <div class="col-12 mt-2 dtl-mtc">
            <button type="button" id="2" class="btn btn-dark text-uppercase">Edit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 mt-1 mb-1">
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
        Administrator
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
</div>
@endsection
