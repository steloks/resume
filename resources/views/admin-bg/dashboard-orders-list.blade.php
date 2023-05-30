@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Cookhouse - orders list')
{{-- vendor style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
<div class="row">
  <div class="col-12 mt-1">
    <h4>Orders</h4>
  </div>
</div>

<div class="row py-1">
  <div class="col-12 col-sm-6 col-lg-6">
  </div>
  <div class="col-12 col-sm-6 col-lg-6">
    <div class="row">
      <div class="col-12 col-md-6">
        <label for="1">Status order</label>
        <fieldset class="form-group">
          <select class="form-control" name="1" id="1">
            <option value="">Completed</option>
          </select>
        </fieldset>
      </div>
      <div class="col-12 col-md-6">
        <label for="2">Order №</label>
        <fieldset class="form-group position-relative has-icon-left">
          <input type="text" id="2" name="2" class="form-control"">
        </fieldset>
      </div>
    </div>
  </div>
</div>

<div class="row py-1">
  <div class="col-12 col-sm-6 col-lg-2">
    <label for="3">Area</label>
    <fieldset class="form-group">
      <select class="form-control" name="3" id="3">
        <option value="">CM13</option>
      </select>
    </fieldset>
  </div>
  <div class="col-12 col-sm-6 col-lg-2">
    <label for="4">District</label>
    <fieldset class="form-group">
      <select class="form-control" name="4" id="4">
        <option value="">Hutton central</option>
      </select>
    </fieldset>
  </div>
  <div class="col-12 col-sm-6 col-lg-2">
    <label for="5">Object</label>
    <fieldset class="form-group">
      <select class="form-control" name="5" id="5">
        <option value="">Kitchen 1</option>
      </select>
    </fieldset>
  </div>
  <div class="col-12 col-sm-6 col-lg-6">
    <div class="row">
      <div class="col-12 col-md-6">
        <label for="dt1">Date order</label>
        <fieldset class="form-group position-relative has-icon-left">
          <input type="text" id="dt1" name="dt1" class="form-control pickadate format-picker" placeholder="Select Date" value="12/09/2021">
          <div class="form-control-position">
            <i class='bx bx-calendar'></i>
          </div>
        </fieldset>
      </div>
      <div class="col-12 col-md-6">
        <label for="dt2" class="md-n"></label>
        <fieldset class="form-group position-relative has-icon-left">
          <input type="text" id="dt2" name="dt2" class="form-control pickadate format-picker" placeholder="Select Date" value="30/09/2021">
          <div class="form-control-position">
            <i class='bx bx-calendar'></i>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 mt-1 mb-3">
    Datatable JS
  </div>
</div>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pickers/dateTime/pick-datetime.js')}}"></script>
@endsection