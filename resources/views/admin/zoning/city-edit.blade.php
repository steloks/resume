@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Regions - cities edit')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{route('admin.zoning.cities')}}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all cities</span>
            </a>
            <h4>Brentwood</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-12 col-md-8  mb-3">
                    <form class="row" action="{{route('admin.zoning.city.edit')}}" method="POST">
                        @csrf
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$city->name}}">
                            </fieldset>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="name">Description</label>
                                <input type="text" class="form-control" id="name" name="description"
                                       value="{{$city->description}}">
                            </fieldset>
                        </div>
                        <input type="hidden" name="city_id" value="{{$city->id}}">
                        {{--                                                <div class="col-12 mb-1">--}}
                        {{--                                                    <div class="row">--}}
                        {{--                                                        <div class="col-12 col-md-7 mb-1">--}}
                        {{--                                                            <h5>Areas and districts</h5>--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div class="col-12 col-md-5 mt-1 dtr-mtc">--}}
                        {{--                                                            <button type="button" id="name" class="btn btn-dark text-uppercase">+ Add areas--}}
                        {{--                                                            </button>--}}
                        {{--                                                        </div>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </div>--}}
                        @if($city->areas->count())
                            <div class="col-12 col-md-12 mb-05">
                                <table class="table">
                                    <thead>
                                    <th></th>
                                    <th>№</th>
                                    <th>{{__('Area')}}</th>
                                    <th>{{__('Status')}}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($city->areas as $area)
                                        <tr id="rowAppend">
                                            <td>
                                                <button class="removeTr d-none" type="button">X</button>
                                            </td>
                                            <td class="counter">{{ $loop->iteration }}</td>
                                            <td><input type="text" name="sub_area_name[{{$area->id}}]"
                                                       value="{{$area->name}}"></td>
                                            <td>
                                                <select name="sub_area_status[{{$area->id}}]">
                                                    <option value="1" {{$area->status == 1 ? 'selected' : ''}}>{{__('Active')}}</option>
                                                    <option value="0" {{$area->status == 0 ? 'selected' : ''}}>{{__('Inactive')}}</option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @if(checkAccess('Cities','create_edit'))
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
                <div class="col-12 col-md-4">
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
                $(this).parents('.row').find('.removeTr').removeClass('d-none')
            })

            $(document).on('click', '.cancel-df-js', function () {
                $(this).parent().find('.save-df-js').addClass('d-none')
                $(this).parent().find('.cancel-df-js').addClass('d-none')
                $(this).parent().find('.edit-df-js').removeClass('d-none')
                $(this).parents('.row').find('.edit-js-details').removeClass('d-none')
                $(this).parents('.row').find('.removeTr').addClass('d-none')
            })
        });
    </script>
@endsection
