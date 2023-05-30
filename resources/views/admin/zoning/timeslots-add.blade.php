@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Regions - time slots add')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{route('admin.zoning.timeslots')}}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all time slots</span>
            </a>
            @if(isset($timeslot))
                <h4>Timeslot {{$timeslot->id}}</h4>
            @else
            <h4>New time slot</h4>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-12 col-md-8  mb-3">
                    <form class="row" method="POST" action="{{route('admin.zoning.timeslots.add')}}">
                        @csrf
                        @if(isset($timeslot))
                            <input type="hidden" class="form-control" id="timeslotId" name="timeslotId"
                                   value="{{$timeslot->id}}">
                            @endif
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="region_start_at">Start time</label>
                            <fieldset class="form-group">
                                <input type="text" class="form-control" id="region_start_at" name="start_at"
                                       value="{{$timeslot->start_at ?? ''}}">
                            </fieldset>
                            @error('region_start_at')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="region_end_at">End time</label>
                            <fieldset class="form-group">
                                <input type="text" class="form-control" id="region_end_at" name="end_at"
                                       value="{{$timeslot->end_at ?? ''}}">
                            </fieldset>
                            @error('region_end_at')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="citySelect">City</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="citySelect" id="citySelect">
                                    <option value="0">Select city</option>
                                    @foreach($cities as $city)
                                        <option
                                            {{((isset($timeslot) && ($timeslot->area->city->id == $city->id)) ? 'selected':'')}} value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">Area</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="area_id" id="regionSelect">
                                    @if(isset($timeslot))
                                        @foreach($timeslot->area->city->areas as $area)
                                            <option
                                                {{$timeslot->area->id == $area->id ? 'selected':'' }} value="{{$area->id}}">{{$area->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('area_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-12 mb-05">
                            <fieldset class="form-group">
                                <label for="name">Description</label>
                                <input type="text" class="form-control" id="name" name="description" value="{{$timeslot->description ?? ''}}" >
                            </fieldset>
                        </div>
                        @if(isset($timeslot))
                            @if(checkAccess('Time slot','create_edit'))
                                <div class="col-12 mt-3 dtl-mtc">
                                    <button type="button" class="btn btn-dark text-uppercase edit-df-js">Edit</button>
                                    <button type="submit" class="btn btn-dark text-uppercase d-none save-df-js">Save
                                    </button>
                                    <button type="button" class="btn btn-dark text-uppercase d-none cancel-df-js">Cancel
                                    </button>
                                </div>
                            @endif
                        @else
                            <div class="col-12 mt-3 dtl-mtc">
                                <button type="submit" class="btn btn-dark text-uppercase save-df-js">Save
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-12 col-md-4">
                    <div class="row">
                    </div>
                </div>
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

            $('#citySelect').change(function () {
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: "{{route("admin.zoning.regionByCity")}}",
                    data: {
                        'id': $('#citySelect').val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    beforeSend: function () {
                    },
                    success: function (response) {
                        $('#regionSelect').find('option').remove();
                        $.each(response.areas, function (key, value) {
                            $('#regionSelect').append('<option value="' + value.id + '">' + value.name + '</option>')
                        });
                    },
                    error: function (data) {

                    },
                    complete: function () {

                    }
                });
            })

        });
    </script>
@endsection
