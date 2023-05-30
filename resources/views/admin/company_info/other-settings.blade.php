@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - others detail')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <h4>Other settings</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 mt-1 mb-1">
            <div class="row">
                <div class="col-12 mb-1">
                    <h5>Данни на фирмата</h5>
                </div>
                <form method="POST" action="{{route('admin.company-info.other.settings.store')}}">
                    @csrf
                    <div class="col-12 mb-1">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-05">
                                <label for="name">Currency</label>
                                <fieldset class="form-group">
                                    <select class="form-control" name="currency" id="name">
                                        <option value="GBP">GBP</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-6 mb-05">
                                <label for="name">Time zone</label>
                                <fieldset class="form-group">
                                    <select class="form-control" name="timezone" id="name">
                                        @foreach($timezones as $key => $timezone)
                                            <option
                                                {{$companyInfo->timezone == $key ? 'selected' : ''}} value="{{$key}}">{{$timezone}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-6 mb-05">
                                <label for="name">Date format</label>
                                <fieldset class="form-group">
                                    <select class="form-control" name="date_format" id="name">
                                        @foreach($dates as $date)
                                        <option {{$companyInfo->date_format == $date ? 'selected' : ''}} value="{{$date}}">{{$date}}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-md-6 mb-05">
                                <label for="name">Unit of measure</label>
                                <fieldset class="form-group">
                                    <select class="form-control" name="unit_of_measure" id="name">
                                        <option {{$companyInfo->unit_of_measure == "g" ? 'selected' : ''}} value="g">
                                            gram
                                        </option>
                                        <option {{$companyInfo->unit_of_measure == "ml" ? 'selected' : ''}} value="ml">
                                            ml
                                        </option>
                                        <option {{$companyInfo->unit_of_measure == "ct" ? 'selected' : ''}} value="ct">
                                            count
                                        </option>
                                    </select>
                                </fieldset>
                            </div>
                            @if(checkAccess('Other settings','create_edit'))
                                <div class="col-12 mt-2 dtl-mtc">
                                    <button type="button" class="btn btn-dark text-uppercase edit-df-js">Edit</button>
                                    <button type="submit" class="btn btn-dark text-uppercase d-none save-df-js">Save
                                    </button>
                                    <button type="button" class="btn btn-dark text-uppercase d-none cancel-df-js">Cancel
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-4 mt-1 mb-1">
            <div class="row">
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.edit-df-js', function () {
                $(this).addClass('d-none')
                $(this).parent().find('.save-df-js').removeClass('d-none')
                $(this).parent().find('.cancel-df-js').removeClass('d-none')
                $(this).parents('.row').find('.edit-js-details').addClass('d-none')
            })

            $(document).on('click', '.cancel-df-js', function () {
                $(this).parent().find('.save-df-js').addClass('d-none')
                $(this).parent().find('.cancel-df-js').addClass('d-none')
                $(this).parent().find('.edit-df-js').removeClass('d-none')
                $(this).parents('.row').find('.edit-js-details').removeClass('d-none')
            })
        })
    </script>
@endsection
