@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Recipes - add recipe')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{route('admin.recipes')}}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>{{ __('To all recipes') }}</span>
            </a>
            @if(isset($recipe))
                <h4>{{__('Recipe')}}: {{$recipe->id}}</h4>
            @else
                <h4>{{ __('New recipe') }}</h4>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 mt-1 mb-1">
            <form id="form1" class="row" method="POST" action="{{route('admin.recipe.add')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md-6 mb-05">
                    <fieldset class="form-group">
                        <label for="id">{{ __('Name menu') }}</label>
                        <input type="text" class="form-control" id="id" name="name" value="{{$recipe->name ?? ''}}">
                    </fieldset>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @if(isset($recipe))
                    <input name="recipeId" type="hidden" value="{{$recipe->id}}">
                @endif
                <div class="col-12 col-md-6 mb-05">
                    <fieldset class="form-group">
                        <label for="id">{{ __('Age') }}</label>
                        <select class="form-control" id="recipeType" name="recipe_type_id">
                            @foreach($recipeTypes as $recipeType)
                                <option value="{{$recipeType->id}}"
                                @if(isset($recipe)){{$recipe->recipe_type_id == $recipeType->id ? 'selected':'' }}@endif>{{$recipeType->name}}</option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 mb-05">
                    <fieldset class="form-group">
                        <label for="3">{{ __('Description') }}</label>
                        <textarea id="3" name="description" class="form-control" rows="8"
                                  cols="7">{{$recipe->description ?? ''}}</textarea>
                    </fieldset>
                </div>
                <div class="col-12 col-xl-6 mb-05 mw-600x">
                    <fieldset class="form-group">
                        <label for="media">{{__('Image')}}</label>
                        <input type="file" class="form-control" id="media" name="image"
                               onchange="inputPicPreview('media', 'dfa-recipe-img-preview')">
                    </fieldset>
                    @if(isset($recipe))
                        <img id="dfa-recipe-img-preview" style="width: 281px; height: 368px;"
                             src="{{asset('storage/recipes/'.$recipe->id.'/'.$recipe->image.'')}}">
                    @endif
                </div>
                <div class="col-12 mt-3 mb-05">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-1">
                            <h5>{{ __('Products to the recipe') }}</h5>
                        </div>
                        @if(checkAccess('Recipes','create_edit'))
                            <div class="col-12 col-md-6 mb-1">
                                <button type="button" id="addProduct"
                                        class="btn btn-dark text-uppercase">{{ __('+ Add product') }}
                                </button>
                            </div>
                        @endif

                        <div class="col-12">
                            <table class="dfa-table text-center table">
                                <thead>
                                <th></th>
                                <th>{{__('Code')}}</th>
                                <th>{{__('Product')}}</th>
                                <th>{{__('Percentage')}}</th>
                                </thead>
                                <tbody class="productsHolder">
                                @if(isset($recipe->products))
                                    @foreach($recipe->products as $p)
                                        <tr>
                                            <td class="removeRow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                                    <path fill-rule="evenodd"
                                                          d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                                </svg>
                                            </td>
                                            <td class="productCategory">{{$p->prefix}}</td>
                                            <td>
                                                <select class="productSelect form-control" name="product_ids[]">
                                                    <option selected value="0">{{__('Select Product')}}</option>
                                                    @foreach($products as $product)
                                                        <option
                                                            class="productOption {{($product->category)->percentage_type == 1 ? 'special' : ''}}"
                                                            data-category_id="{{$product->category->id}}"
                                                            value="{{$product->id}}" {{$p->id == $product->id ? 'selected' : ''}}>{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input class="productPercentage form-control" type="number" min="0" max="100"
                                                       input-categoryId="{{$p->category_id}}"
                                                       name="product_percentage[]" step="0.01"
                                                       value="{{$p->pivot->percentage}}">
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr class="productRow">
                                    <td class="removeRow cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                            <path fill-rule="evenodd"
                                                  d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                        </svg
                                        >
                                    </td>
                                    <td class="productCategory"></td>
                                    <td>
                                        <select class="productSelect form-control" name="product_ids[]">
                                            <option selected value="0">{{__('Select Product')}}</option>
                                            @foreach($products as $product)
                                                <option
                                                    class="productOption {{$product->category->percentage_type == 1 ? 'special' : ''}}"
                                                    data-category_id="{{$product->category->id}}"
                                                    value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="productPercentage" type="number" min="0" max="100"
                                               disabled name="product_percentage[]" step="0.01" value="0">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            @error('product_ids')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                @if(isset($recipe))
                    @if(checkAccess('Recipes','create_edit'))
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
                        <button type="submit" class="btn btn-dark text-uppercase  save-df-js">Save
                        </button>
                    </div>
                @endif

            </form>
        </div>
        <div class="col-12 col-md-4 mt-1 mb-1">
            <div class="row">
                @if(isset($recipe))
                    <div class="col-12 col-md-6 dtr-mtc">
                        <strong>Created:</strong>
                    </div>
                    <div class="col-12 col-md-6 dtl-mtc mb-05">
                        {{$recipe->created_at}}
                    </div>
                    <div class="col-12 col-md-6 dtr-mtc">
                        <strong>Created by:</strong>
                    </div>
                    <div class="col-12 col-md-6 dtl-mtc mb-05">
                        {{$recipe->created_by}}
                    </div>
                    <div class="col-12 col-md-6 dtr-mtc">
                        <strong>Edited:</strong>
                    </div>
                    <div class="col-12 col-md-6 dtl-mtc mb-05">
                        {{$recipe->updated_at}}
                    </div>
                    <div class="col-12 col-md-6 dtr-mtc">
                        <strong>Edited by:</strong>
                    </div>
                    <div class="col-12 col-md-6 dtl-mtc mb-05">
                        {{$recipe->updated_by}}
                    </div>
            </div>
            @endif
        </div>
    </div>
    {{--    <script>--}}
    {{--        document.addEventListener("DOMContentLoaded", function (event) {--}}
    {{--            //$('#form1 :input').prop('disabled', true);--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection

@section('page-scripts')
    <script>
        $(document).ready(function () {
            let recipeTypeId = $('#recipeType').val();
            recipeTypeParams(recipeTypeId);
            let data = [];

            $(document).on('click', '.removeRow', function () {
                $(this).parent().remove();
            })

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

            $(document).on('change', '.productSelect', function () {
                let input = $(this).parent().parent().find('.productPercentage');
                if (parseInt($(this).val()) !== 0) {
                    if ($(this).find('option:selected').hasClass('special')) {
                        input.val(data[$(this).find('option:selected').attr('data-category_id')]);
                        input.prop('readonly', 'readonly');
                        input.prop('disabled', false);
                    } else {
                        input.prop('disabled', false);
                        input.prop('readonly', '');
                        input.attr('input-categoryId', $(this).find('option:selected').attr('data-category_id'))
                    }
                } else {
                    input.prop('disabled', true);
                    input.prop('readonly', '');
                    input.removeAttr('input-categoryId');
                }
            });

            $('#addProduct').click(function () {
                let row = $('.productRow');
                if ((parseInt(row.find('.productSelect').val()) == 0)) {
                    alert('Please select product and percentage');
                } else {
                    let clone = row.clone()
                    row.removeClass('productRow');
                    clone.find('.productPercentage').val(0).prop('disabled', true);
                    $('.productsHolder').append(clone);
                }
            })

            $('#recipeType').change(function () {
                data = [];
                recipeTypeId = $('#recipeType').val();
                recipeTypeParams(recipeTypeId);
                $('.productPercentage').val('');
            })

            $(document).on('input', '.productPercentage', function () {
                let changedInput = $(this);
                let max = data[changedInput.attr('input-categoryId')];
                // console.log(max);
                let percentage = 0;
                let inputs = $('input[input-categoryId="' + $(this).attr('input-categoryId') + '"]')
                if (inputs.length === 1) {
                    if (changedInput.val() > max) {
                        changedInput.val(max)
                    }
                } else {
                    inputs.each(function () {
                        if (!changedInput.is($(this))) {
                            if ($(this).val().length === 0) {
                                $(this).val(0)
                            }
                            percentage = percentage + parseFloat($(this).val())
                        }
                    })
                    let limit = max - percentage;
                    if (parseFloat(changedInput.val()) > limit) {
                        changedInput.val(limit)
                    }
                }
            })

            function recipeTypeParams(id) {
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: "{{route("admin.recipe.parameters.by.type")}}",
                    data: {
                        'recipeTypeId': id,
                        "_token": "{{ csrf_token() }}"
                    },
                    beforeSend: function () {
                    },
                    success: function (response) {
                        $.each(response.recipeTypePercentages, function (index, value) {
                            data[value.category_id] = value.percentage;
                        });
                        // response.recipeTypePercentages
                        // console.log(data);
                    },
                    error: function (data) {
                    },
                    complete: function () {
                    }
                });
            }
        })
    </script>
@endsection
