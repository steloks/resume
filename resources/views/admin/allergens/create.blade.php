@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - allergen add')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{ route('admin.allergens.index') }}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all allergens</span>
            </a>
            <h4>New allergen</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 mt-1 mb-1">
            <div class="row">
                <div class="col-12 mb-1">
                    <form class="row" action="{{route('admin.allergens.store')}}" method="POST">
                        @csrf
                        <div class="col-12 col-md-6 mb-05">
                            <label for="name">Select nomenclature</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="product_id" id="name">
                                    @if(isset($allergen))
                                        <option value="{{$allergen->product_id}}">{{$allergen->product->name}}</option>
                                    @else
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </fieldset>
                        </div>
                        @if(isset($allergen))
                            <input type="hidden" name="allergen_id" value="{{$allergen->id}}">
                        @endif
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="id">Description</label>
                                <input type="text" class="form-control" id="id" name="description" value="">
                            </fieldset>
                        </div>
                        <div class="col-12 mt-2 dtl-mtc">
                            <button type="submit" id="2" class="btn btn-dark text-uppercase">Save</button>
                            <a href="{{route('admin.allergens.index')}}">
                                <button type="button" id="2" class="btn btn-light text-uppercase">Cancel</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
