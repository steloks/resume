@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Store - nomenclature add')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{route('admin.products')}}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all Nomenclatures</span>
            </a>
            @if(isset($product))
            <div>Code: {{$product->prefix}}</div>
            @else
            <h4>New nomenclature</h4>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-12 col-md-8  mb-3">
                    <form class="row" method="POST" action="{{route('admin.products.add')}}">
                        @csrf
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <fieldset class="form-group">
                                <label for="1">Name</label>
                                <input type="text" class="form-control" id="1" name="name"
                                       value="{{isset($product) ?$product->name:''}}">
                            </fieldset>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @if(isset($product))
                            <input type="hidden" value="{{$product->id}}" name="product_id">
                        @endif
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <fieldset class="form-group">
                                <label for="2">Kcal/100gr.</label>
                                <input type="number" class="form-control" id="2" name="kcal" step=".01"
                                       value="{{isset($product) ?$product->kcal:''}}">
                            </fieldset>
                        </div>
                        @error('kcal')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="3">Category</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="category_id" id="3">
                                    <option value="">Select category</option>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{$category->id}}" {{(isset($product) && ($product->category_id == $category->id)) ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        @error('prefix')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="4">Unit</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="unit_of_measure" id="4">
                                    <option value="">Select unit</option>
                                    <option
                                        value="ct" {{(isset($product)  && $product->unit_of_measure == 'u') ?'selected':''}}>
                                        count
                                    </option>
                                    <option
                                        value="g" {{(isset($product)  && $product->unit_of_measure == 'g') ?'selected':''}}>
                                        grams
                                    </option>
                                    <option
                                        value="ml" {{(isset($product)  && $product->unit_of_measure == 'ml') ?'selected':''}}>
                                        ml
                                    </option>
                                </select>
                            </fieldset>
                        </div>
                        @error('unit_of_measure')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <label for="5">Expiration date</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="days_until_exp" id="5">
                                    <option value="">Select number of days</option>
                                    @for($i = 1;$i<=20;$i++)
                                        <option
                                            value="{{$i}}" {{(isset($product)  && $product->days_until_exp == $i) ?'selected':''}}>{{$i}}</option>
                                    @endfor
                                </select>
                            </fieldset>
                        </div>
                        @error('days_until_exp')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <fieldset class="form-group">
                                <label for="6">Delivery price (1000 gr. / 1 num.)</label>
                                <input type="number" class="form-control" id="6" name="buy_price" placeholder="£" step=".01"
                                       value="{{isset($product) ?$product->buy_price:''}}">
                            </fieldset>
                        </div>
                        @error('buy_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12 col-md-4 col-lg-3 mb-05">
                            <fieldset class="form-group">
                                <label for="7">Sale price (1000 gr. / 1 num.) </label>
                                <input type="number" class="form-control" id="7" name="sell_price" placeholder="£" step=".01"
                                       value="{{isset($product) ?$product->sell_price:''}}">
                            </fieldset>
                        </div>
                        @error('sell_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12 col-md-6 col-lg-9 mb-05">
                            <ul class="list-unstyled mb-0">
                                @foreach($objects as $object)
                                <li class="d-inline-block mr-2 mb-1">
                                    <fieldset>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox{{$object->id}}" name="objects[]" {{(isset($product) && in_array($object->id,$product->objects)) ? 'checked':''}} value="{{$object->id}}">
                                            <label for="checkbox{{$object->id}}">{{$object->name}}</label>
                                        </div>
                                    </fieldset>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-9 mb-05">
                            <fieldset class="form-group">
                                <label for="8">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                       value="{{isset($product) ?$product->description:''}}">
                            </fieldset>
                        </div>
                        @if(isset($product))
                            @if(checkAccess('Nomenclatures','create_edit'))
                                <div class="col-12 mt-1 dtl-mtc">
                                    <button type="button" class="btn btn-dark text-uppercase edit-df-js">Edit</button>
                                    <button type="submit" class="btn btn-dark text-uppercase d-none save-df-js">Save
                                    </button>
                                    <button type="button" class="btn btn-dark text-uppercase d-none cancel-df-js">Cancel
                                    </button>
                                </div>
                            @endif
                        @else
                            <div class="col-12 mt-1 dtl-mtc">
                                <button type="submit" id="9" class="btn btn-dark text-uppercase mb-1">Save
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
                @if(isset($product))
                    <div class="col-12 col-md-4">
                        <div class="row">
                            <div class="col-12 col-md-6 dtr-mtc">
                                <strong>Created: {{$product->created_at}}</strong>
                            </div>
                            <div class="col-12 col-md-6 dtl-mtc mb-05">

                            </div>
                            <div class="col-12 col-md-6 dtr-mtc">
                                <strong>Created by: {{$product->created_by}}</strong>
                            </div>
                            <div class="col-12 col-md-6 dtl-mtc mb-05">

                            </div>
                            <div class="col-12 col-md-6 dtr-mtc">
                                <strong>Edited: {{$product->updated_at}}</strong>
                            </div>
                            <div class="col-12 col-md-6 dtl-mtc mb-05">

                            </div>
                            <div class="col-12 col-md-6 dtr-mtc">
                                <strong>Edited by:{{$product->updated_by}}</strong>
                            </div>
                            <div class="col-12 col-md-6 dtl-mtc mb-05">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script type="text/javascript">
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
