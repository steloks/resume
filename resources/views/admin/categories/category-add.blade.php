@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Store - category new')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{route('admin.categories')}}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all categories</span>
            </a>
            <h4>{{isset($category)?$category->name:'New category'}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-12 mb-3">
                    <form class="row" method="POST" action="{{route('admin.categories.add')}}">
                        @csrf
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="1">Prefix</label>
                                <input type="text" class="form-control" id="1" name="prefix"
                                       value="{{isset($category) ?$category->prefix:'' }}">
                            </fieldset>
                            @error('prefix')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @if(isset($category))
                            <input type="hidden" class="form-control" name="category_id" value="{{$category->id}}">
                        @endif
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="2">Name category</label>
                                <input type="text" class="form-control" id="2" name="name"
                                       value="{{isset($category) ?$category->name:'' }}">
                            </fieldset>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="3">Description</label>
                                <textarea id="3" name="description" class="form-control" rows="20"
                                          cols="7">{{isset($category) ? $category->description : '' }}</textarea>
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="percentage_type">Percentage type</label>
                                <input type="checkbox" class="form-control" id="percentage_type" name="percentage_type" {{(isset($category) && ($category->percentage_type == 1)) ? 'checked' : '' }}
                                       value="1">
                            </fieldset>
                        </div>
                        @if(checkAccess('Categories','create_edit'))
                            <div class="col-12 mt-1 dtl-mtc">
                                <button type="button" class="btn btn-dark text-uppercase edit-df-js">Edit</button>
                                <button type="submit" class="btn btn-dark text-uppercase d-none save-df-js">Save
                                </button>
                                <button type="button" class="btn btn-dark text-uppercase d-none cancel-df-js">Cancel
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-12 col-md-4 form-group">
                    <div class="row">
                        <div class="col-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(!empty($category))
        <div class="col-12 col-md-4">
            <div class="row">
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Created: {{parseDate($category->created_at)}}</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">

                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Created by: {{$category->created_by}}</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">

                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Edited: {{parseDate($category->updated_at)}}</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">

                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Edited by:{{$category->updated_by}}</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">
                </div>
            </div>
        </div>
    @endif
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
