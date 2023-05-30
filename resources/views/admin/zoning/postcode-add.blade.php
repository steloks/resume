@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Regions - postal code addresses add')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row d-flex">
        <div class="col-12 mt-1 mb-2">
            <a href="{{route('admin.zoning.postcodes')}}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all PC Addresses</span>
            </a>
            <h4>{{isset($postcode) ? $postcode->postcode : 'New PC Addresses'}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-12 col-md-8  mb-3">
                    <form class="row" method="POST" action="{{route('admin.zoning.postcode.add')}}">
                        @csrf
                        @if(isset($postcode))
                            <input type="hidden" name="postcode_id" value="{{$postcode->id}}">
                        @endif
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <fieldset class="form-group">
                                <label for="name">PC Addresses</label>
                                <input type="text" class="form-control" id="name" name="postcode"
                                       value="{{isset($postcode) ? $postcode->postcode:''}}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">Area</label>
                            <fieldset class="form-group">
                                <select class="form-control areaOption" name="area_id" id="name">
                                    <option value="">Select area</option>
                                    @foreach($areas as $area)
                                        <option value="{{$area->id}}"
                                            {{(isset($postcode)&&($postcode->area_id == $area->id)) ? 'selected':''}}>{{$area->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">District</label>
                            <fieldset class="form-group">
                                <select class="form-control subAreasHolder" name="sub_area_id" id="name">
                                    <option class="copy-option" value="0">Select Sub Area</option>
                                    @if(isset($subAreas))
                                        @foreach($subAreas as $subArea)
                                            <option
                                                value="{{$subArea->id}}" {{(isset($postcode) && ($postcode->sub_area_id == $subArea->id)) ? 'selected':''}}>{{$subArea->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">Status</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="status" id="name">

                                    <option class="bg-clr-lgreen"
                                            value="1" {{(isset($postcode) && ($postcode->status == 1)) ? 'selected':''}} {{!isset($postcode) ? 'selected':''}}>
                                        Active
                                    </option>
                                    <option class="bg-clr-lred"
                                            value="0" {{(isset($postcode) && ($postcode->status == 0)) ? 'selected':''}}>
                                        Inactive
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        @if(checkAccess('PC Addresses','create_edit'))
                            <div class="col-12 mt-3 dtl-mtc">
                                <button type="button" class="btn btn-dark text-uppercase edit-df-js">Edit</button>
                                <button type="submit" class="btn btn-dark text-uppercase d-none save-df-js">Save
                                </button>
                                <button type="button" class="btn btn-dark text-uppercase d-none cancel-df-js">Cancel
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-12 col-md-5 mb-3">
{{--                    <div class="row mb-2">--}}
{{--                        <div class="col-12 col-md-6 dtr-mtc">--}}
{{--                            <div><strong>Owner:</strong></div>--}}
{{--                            <div><a href="">test 11</a></div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-md-6 dtr-mtc">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row">
                        <div class="col-12 col-md-6 dtr-mtc">
                            <strong>Created:</strong>
                        </div>
                        <div class="col-12 col-md-6 dtl-mtc mb-05">
                            {{ parseDate($postcode->created_at) }}
                        </div>
                        <div class="col-12 col-md-6 dtr-mtc">
                            <strong>Created by:</strong>
                        </div>
                        <div class="col-12 col-md-6 dtl-mtc mb-05">
                            {{ $postcode->created_by ?? __('Website') }}
                        </div>
                        <div class="col-12 col-md-6 dtr-mtc">
                            <strong>Edited:</strong>
                        </div>
                        <div class="col-12 col-md-6 dtl-mtc mb-05">
                            {{ parseDate($postcode->updated_at) }}
                        </div>
                        <div class="col-12 col-md-6 dtr-mtc">
                            <strong>Edited by:</strong>
                        </div>
                        <div class="col-12 col-md-6 dtl-mtc mb-05">
                            {{ $postcode->updated_by }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    @include('admin._partials.datatable')
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
        });
    </script>
@endsection
