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
    <h4>Данни на фирмата</h4>
  </div>
</div>
<div class="row">
  <div class="col-12 col-md-8 mt-1 mb-1">
    <div class="row">
      <div class="col-12 mb-1">
        <h5>Данни на фирмата</h5>
      </div>
      <div class="col-12 mb-3">
        <div class="row">
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Име на фирмата</label>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Адрес на фирмата</label>
              <input type="text" class="form-control" id="id" name="name" value="74 Manchester Road NEWCASTLE UPON TYNE NE95 7GJ">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Телефон</label>
              <input type="text" class="form-control" id="id" name="name" value="0123456789">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Уеб сайт:</label>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Имейл адрес</label>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Идент. №:</label>
              <input type="text" class="form-control" id="id" name="name" value="1234567890">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Данъчен адрес на фирмата:</label>
              <input type="text" class="form-control" id="id" name="name" value="74 Manchester Road NEWCASTLE UPON TYNE NE95 7GJ">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">МОЛ:</label>
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
            <h5>Данни за банка</h5>
          </div>
          <div class="col-12 col-md-6 mb-05">
            <fieldset class="form-group">
              <label for="id">Име на банката:</label>
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
            <button type="button" id="2" class="btn btn-dark text-uppercase">Редактирай</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 mt-1 mb-1">
    <div class="row">
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Създадено на:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        14/10/2021
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Създадено от:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        Администратор
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Редактирано на:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        22/10/2021
      </div>
      <div class="col-12 col-md-6 dtr-mtc">
        <strong>Редактирано от:</strong>
      </div>
      <div class="col-12 col-md-6 dtl-mtc mb-05">
        Иван Иванов
      </div>
    </div>
  </div>
</div>
@endsection
