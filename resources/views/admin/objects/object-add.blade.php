@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Customers - object add')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{route('admin.objects')}}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>{{ __('To all objects') }}</span>
            </a>
            <h4>{{ __('New object') }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <form class="row" method="POST" action="{{route('admin.objects.add')}}">
                @csrf
                <div class="col-12 col-md-6 mb-3">
                    <div class="row">
                        @if(isset($object))
                            <input type="hidden" name="object_id" value="{{$object->id}}">
                        @endif
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="id">{{ __('Name *') }}</label>
                                <input type="text" class="form-control" id="id" name="name"
                                       value="{{isset($object) ? $object->name : ''}}">
                            </fieldset>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="id">{{ __('Number of menus for day *') }}</label>
                                <input type="text" class="form-control" id="id" name="menu_limit"
                                       value="{{isset($object) ? $object->menu_limit : ''}}">
                            </fieldset>
                            @error('menu_limit')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="id">{{ __('Prefix *') }}</label>
                                <input type="text" class="form-control" id="id" name="prefix"
                                       value="{{isset($object) ? $object->prefix : ''}}">
                            </fieldset>
                            @error('prefix')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="id">{{ __('City *') }}</label>
                                <select class="form-control" id="city_id" name="city_id">
                                    @foreach($cities as $city)
                                        <option
                                            value="{{$city->id}}" {{(isset($object) && ($object->city_id == $city->id)) ? 'selected' : ''}}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            @error('city_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <fieldset class="form-group">
                        <label for="id">{{ __('Description') }}</label>
                        <textarea class="form-control" id="id" rows="6"
                                  name="description">{{isset($object) ? $object->description : ''}}</textarea>
                    </fieldset>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-1 dtl-mtc">
                            <h5>{{ __('Areas') }}</h5>
                        </div>
                        @if(checkAccess('Objects','create_edit'))
                            <div class="col-12 col-md-6 mb-1 dtr-mtc">
                                <button type="button" id="add_sub_area"
                                        class="btn btn-dark text-uppercase">{{ __('+ Add area') }}
                                </button>
                            </div>
                        @endif
                        <div class="col-12 col-md-6 mb-1">
                            <table class="table area_table">
                                <thead>
                                <th></th>
                                <th>{{__('Area')}}</th>
                                </thead>
                                <tbody id="appendTr">
                                @if(isset($object))
                                    @foreach($object->areas as $area)
                                        <tr>
                                            <td>
                                                <button class="removeTr" type="button">X</button>
                                            </td>
                                            <td>
                                                <select class="areas-holder" name="area_ids[]">
                                                    @foreach($object->city->areas as $ar)
                                                        <option
                                                            value="{{$ar->id}}" {{($area->id == $ar->id ? 'selected':'')}}>{{$ar->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6"></div>
                @if(checkAccess('Objects','create_edit'))
                    <div class="col-12 mt-2 dtl-mtc">
                        <div class="col-12 mt-3 dtl-mtc">
                            <button type="button" class="btn btn-dark text-uppercase edit-df-js">Edit</button>
                            <button type="submit" class="btn btn-dark text-uppercase d-none save-df-js">Save
                            </button>
                            <button type="button" class="btn btn-dark text-uppercase d-none cancel-df-js">Cancel
                            </button>
                        </div>
                    </div>
                @endif

            </form>
        </div>
    </div>
    <div class="d-none">
        <table class="">
            <thead>
            </thead>
            <tbody>
            <tr id="rowAppend">
                <td>
                    <button class="removeTr" type="button">X</button>
                </td>
                <td>
                    <select class="areas-holder" name="area_ids[]">

                    </select>
                </td>
            </tr>
            </tbody>
        </table>
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

            $('#add_sub_area').click(function () {
                $('.sub_area_table').removeClass('d-none')
                let clone = $('#rowAppend').clone()
                clone.removeAttr('id');
                clone.addClass('removeAfterCityChange')
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: "{{route("admin.zoning.regionByCity")}}",
                    data: {
                        'id': $('#city_id').val(),
                        "_token": "{{ csrf_token() }}"
                    },
                    beforeSend: function () {
                    },
                    success: function (response) {
                        $.each(response.areas, function (key, value) {
                            clone.find('.areas-holder').append('<option value="' + value.id + '">' + value.name + '</option>')
                        });
                    },
                    error: function (data) {

                    },
                    complete: function () {

                    }
                });

                $('#appendTr').append(clone)
            });

            $('#city_id').change(function () {
                $('.removeAfterCityChange').remove();
            });

            $(document).on('click', '.removeTr', function () {
                $(this).parent().parent().remove();
            })
        })
    </script>
@endsection
