@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Regions - edit')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{route('admin.zoning.regions')}}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all areas</span>
            </a>
            <h4>{{$area->name}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-12 col-md-8  mb-3">
                    <form class="row" method="POST" action="{{route('admin.zoning.regions.edit')}}">
                        @csrf
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">City</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="city_id" id="name">
                                    @foreach($cities as $city)
                                        <option
                                            value="{{$city->id}}" {{$city->id == $area->city_id ? 'selected' : ''}}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <input type="hidden" name="area_id" value="{{$area->id}}">
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <fieldset class="form-group">
                                <label for="name">Area</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$area->name}}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <fieldset class="form-group">
                                <label for="name">{{__('Delivery Price')}}</label>
                                <input type="number" step="0.01" class="form-control" name="delivery_price"
                                       value="{{$area->delivery_price}}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">Object</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="kitchen_id" id="name">
                                    @foreach($objects as $object)
                                        <option
                                            value="{{$object->id}}" {{(isset($area) && $area->objects->count() && ($area->objects->first()->id == $object->id)) ? 'selected' : ''}}>
                                            {{$object->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">Status</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="status" id="name">
                                    <option class="bg-clr-lgreen" value="1" {{ $area->status == 1 ? 'selected' : ''}}>
                                        Active
                                    </option>
                                    <option class="bg-clr-lred" value="0" {{ $area->status == 0 ? 'selected' : ''}}>
                                        Inactive
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 mb-05">
                            <fieldset class="form-group">
                                <label for="name">Description</label>
                                <input type="text" class="form-control" id="name" name="description"
                                       value="{{$area->description}}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-12 mb-05">
                            <div class="row">
                                <div class="col-12 col-md-7 mb-1">
                                    <h5>Districts</h5>
                                </div>
                                <div class="col-12 col-md-5 mt-1 dtr-mtc">
                                    <button type="button" id="add_sub_area" class="btn btn-dark text-uppercase">+ Add
                                        districts
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 mb-05">
                            <table class="sub_area_table table">
                                <thead>
                                <th></th>
                                <th>№</th>
                                <th>{{__('Sub Area')}}</th>
                                <th>{{__('Status')}}</th>
                                </thead>
                                <tbody id="appendTr">
                                @if($area->subAreas->count())
                                    @php($br=1)
                                    @foreach($area->subAreas as $subArea)
                                        <tr>
                                            <td>
                                                <button class="removeTr btn" type="button"
                                                        data-subArea-id="{{$subArea->id}}">X
                                                </button>
                                            </td>
                                            <td>{{$br}}</td>
                                            <td><input type="text" name="sub_area_name[]"  class="form-control"value="{{$subArea->name}}">
                                            </td>
                                            <td>
                                                <select name="sub_area_status[]" class="form-control">
                                                    <option
                                                        value="1" {{ $subArea->status == 1 ? 'selected' : ''}}>{{__('Active')}}</option>
                                                    <option
                                                        value="0" {{ $subArea->status == 0 ? 'selected' : ''}}>{{__('Inactive')}}</option>
                                                </select>
                                            </td>
                                        </tr>
                                        @php($br++)
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        @if(checkAccess('Areas','create_edit'))
                            <div class="col-12 mt-1 dtl-mtc">
                                <button type="submit" id="button" class="btn btn-dark text-uppercase mb-1">Save</button>
                                {{--                            <button type="button" id="button" class="btn btn-light text-uppercase mb-1">Cancel</button>--}}
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-12 col-md-4">
                    <div class="row">
                        <div class="col-12 col-md-4 mt-1 mb-1">
                            <div class="row">
                                @if(isset($area))
                                    <div class="col-12 col-md-6 dtr-mtc">
                                        <strong>Created: {{parseDate($area->created_at)}}</strong>
                                    </div>
                                    <div class="col-12 col-md-6 dtl-mtc mb-05">

                                    </div>
                                    <div class="col-12 col-md-6 dtr-mtc">
                                        <strong>Created by: {{$area->created_by}}</strong>
                                    </div>
                                    <div class="col-12 col-md-6 dtl-mtc mb-05">

                                    </div>
                                    <div class="col-12 col-md-6 dtr-mtc">
                                        <strong>Edited: {{parseDate($area->updated_at)}}</strong>
                                    </div>
                                    <div class="col-12 col-md-6 dtl-mtc mb-05">

                                    </div>
                                    <div class="col-12 col-md-6 dtr-mtc">
                                        <strong>Edited by:{{$area->updated_by}}</strong>
                                    </div>
                                    <div class="col-12 col-md-6 dtl-mtc mb-05">
                                    </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none">
        <table class="">
            <thead>
            </thead>
            <tbody>
            <tr id="rowAppend">
                <td>
                    <button class="removeTr btn" type="button">X</button>
                </td>
                <td class="counter"></td>
                <td><input type="text" class="form-control" name="sub_area_name[]" value=""></td>
                <td>
                    <select name="sub_area_status[]" class="form-control">
                        <option value="1">{{__('Active')}}</option>
                        <option value="0">{{__('Inactive')}}</option>
                    </select>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection
@include('admin.modals.dashboard-modal-store-nomenclature-add')
@section('page-scripts')
    <script>
        $(document).ready(function () {
            console.log('as');

            // let counter = 0;
            $('#add_sub_area').click(function () {
                // counter = counter + 1;
                $('.sub_area_table').removeClass('d-none')
                let clone = $('#rowAppend').clone()
                // clone.find('.counter').html(counter);
                clone.removeAttr('id');
                $('#appendTr').append(clone)
            });

            $(document).on('click', '.removeTr', function () {
                // console.log($(this).attr('data-subArea-id'))
                let button = $(this);
                let attr = button.attr('data-subArea-id');
                if (typeof attr !== 'undefined' && attr !== false) {
                    $.ajax({
                        dataType: "json",
                        type: "POST",
                        url: "{{route("admin.zoning.subarea.delete")}}",
                        data: {
                            'id': attr,
                            "_token": "{{ csrf_token() }}"
                        },
                        beforeSend: function () {
                        },
                        success: function () {
                            button.parent().parent().remove();
                        },
                        error: function (data) {

                        },
                        complete: function () {

                        }
                    });
                } else {
                    console.log('asd')
                    button.parent().parent().remove();
                }
            })
        })
    </script>
@endsection
