@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Regions - add')
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
            <h4>New area</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-12 col-md-8  mb-3">
                    <form class="row" method="POST" action="{{route('admin.zoning.regions.add')}}">
                        @csrf
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">Sity</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="city_id" id="name">
                                    <option value="">Select city</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <fieldset class="form-group">
                                <label for="name">Area</label>
                                <input type="text" class="form-control" id="name" name="name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <fieldset class="form-group">
                                <label for="name">{{__('Delivery Price')}}</label>
                                <input type="number" step="0.01" class="form-control" name="delivery_price" value="0">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">Object</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="kitchen_id" id="name">
                                    @foreach($objects as $object)
                                        <option value="{{$object->id}}">{{$object->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="name">Status</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="status" id="name">
                                    <option class="bg-clr-lgreen" value="1" selected>Active</option>
                                    <option class="bg-clr-lred" value="0">Inactive</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 mb-05">
                            <fieldset class="form-group">
                                <label for="name">Description</label>
                                <input type="text" class="form-control" id="name" name="description">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-12 mb-05">
                            <div class="row">
                                <div class="col-12 col-md-7 mb-1">
                                    <h5>District</h5>
                                </div>
                                <div class="col-12 col-md-5 mt-1 dtr-mtc">
                                    <button type="button" id="add_sub_area" class="btn btn-dark text-uppercase">+ Add
                                        district
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 mb-05">
                            <div>
                                <table class="sub_area_table table d-none">
                                    <thead>
                                    <th></th>
                                    <th>№</th>
                                    <th>{{__('Sub Area')}}</th>
                                    <th>{{__('Status')}}</th>
                                    </thead>
                                    <tbody id="appendTr">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 mt-1 dtl-mtc">
                            <button type="submit" id="button" class="btn btn-dark text-uppercase mb-1">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-4">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none">
        <table class="table">
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
            let counter = 0;
            $('#add_sub_area').click(function () {
                counter = counter + 1;
                $('.sub_area_table').removeClass('d-none')
                let clone = $('#rowAppend').clone()
                clone.find('.counter').html(counter);
                clone.removeAttr('id');
                $('#appendTr').append(clone)
            });

            $(document).on('click', '.removeTr', function () {
                $(this).parent().parent().remove();
            })

        })
    </script>
@endsection
