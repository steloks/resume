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
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 mt-1 mb-1">
            <div class="row">
                <div class="col-12 mb-1">
                    <form class="row" action="{{route('admin.allergens.update', ['id'=> $allergen->id])}}" method="POST">
                        @csrf
                        <div class="col-12 col-md-6 mb-05">
                            <label for="name">Select nomenclature</label>
                            <fieldset class="form-group">
                                <select class="form-control" name="product_id" id="name">
                                    @foreach($products as $product)
                                        <option
                                            value="{{$product->id}}" {{ $allergen->product_id == $product->id ? 'selected' : '' }}>{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="id">Description</label>
                                <input type="text" class="form-control" id="id" name="description"
                                       value="{{ old('description', $allergen->description ?? '') }}">
                            </fieldset>
                        </div>
                        <div class="col-12 mt-2 dtl-mtc">
                            <button type="submit" id="2" class="btn btn-dark text-uppercase">Save</button>
                            <a href="{{route('admin.allergens.index')}}" id="2" class="btn btn-light text-uppercase">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
