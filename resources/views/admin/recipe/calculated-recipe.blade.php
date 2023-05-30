@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Recipe - calculated')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{route('admin.recipes.calculated.list')}}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>{{ __('To all calculated recipes') }}</span>
            </a>
            <h4>{{$orderRecipe->recipe->name}}</h4>
            <div>Меню №: {{$orderRecipe->order->id}}-{{$orderRecipe->id}}</div>
        </div>
    </div>
    <div class="row mt-1">
        <ul class="nav nav-tabs col-12 mb-1 px-1" role="tablist">
            <li class="nav-item">
                <a href="#tab-1" class="btn btn-df-tab mr-05 mb-1 active" id="tab-1-tab" data-toggle="tab"
                   aria-controls="tab-1" role="tab" aria-selected="true"><i class="bx bx-shopping-bag"></i> {{ __('Details order and recipe') }}</a>
            </li>
            <li class="nav-item">
                <a href="#tab-2" class="btn btn-df-tab mr-05 mb-1" id="tab-2-tab" data-toggle="tab"
                   aria-controls="tab-2" role="tab" aria-selected="true"><i class="bx bx-sun"></i> {{ __('Pet profile data') }}</a>
            </li>
            <li class="nav-item">
                <a href="#tab-3" class="btn btn-df-tab mr-05 mb-1" id="tab-3-tab" data-toggle="tab"
                   aria-controls="tab-3" role="tab" aria-selected="true"><i class="bx bx-calculator"></i> {{ __('Menu calculation') }}</a>
            </li>
        </ul>
        <div class="col-12 mt-1 mb-1">
            <div class="row tab-content">
                <div class="tab-pane active col-12 mb-3" id="tab-1" aria-labelledby="tab-1-tab" role="tabpanel">
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Menu')}} №</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{$orderRecipe->order->id}}-{{$orderRecipe->id}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Menu name')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{$orderRecipe->recipe->name}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Delivery date')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{parseDate($orderRecipe->date)}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Grams')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{$orderRecipe->grams.'grams'}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Price')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        £{{parseNumber($orderRecipe->price)}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Order')}} №</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {!!parseEditRoute('orders',$orderRecipe->order->id,$orderRecipe->order->id)!!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Order date')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{parseDate($orderRecipe->order->created_at)}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Client')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {!!parseEditRoute('clients',$orderRecipe->order->client->id,$orderRecipe->order->name)!!}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Pet')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {!!parseEditRoute('clients-pets',$orderRecipe->pet->id,$orderRecipe->pet->name)!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="col-12">--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-12 col-md-3 col-lg-2 mb-05">--}}
                        {{--                                    <div class="mb-0d5 dtl-mtc text-uppercase">--}}
                        {{--                                        <strong>Рецепта №</strong>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="mb-1 dtl-mtc">--}}
                        {{--                                        1--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-12 col-md-3 col-lg-2 mb-05">--}}
                        {{--                                    <div class="mb-0d5 dtl-mtc text-uppercase">--}}
                        {{--                                        <strong>Име рецепта</strong>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="mb-1 dtl-mtc">--}}
                        {{--                                        <a href="#">Chicken & liver with brown rice</a>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="tab-pane col-12 mb-3" id="tab-2" aria-labelledby="tab-2-tab" role="tabpanel">
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Weight')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{$orderRecipe->pet->weight}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Age')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{dateToYearsAndMonths($orderRecipe->pet->date_of_birth)}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Physical condition')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{$orderRecipe->pet->weightPercentage->name}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Activity')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{$orderRecipe->pet->acivityPercentage->name}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2 mb-05">
                                    <div class="mb-0d5 dtl-mtc text-uppercase">
                                        <strong>{{__('Neutered')}}</strong>
                                    </div>
                                    <div class="mb-1 dtl-mtc">
                                        {{empty($orderRecipe->pet->neuteredPercentage->neutered) ? __('No') : __('Yes')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane col-12 mb-3" id="tab-3" aria-labelledby="tab-3-tab" role="tabpanel">
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="row mb-2">
                                <div class="col-12 mb-1">
                                    <h5>{{ __('Calculated total menu weight') }}</h5>
                                </div>
                                <div class="col-12 mb-1">
                                    <table class="table">
                                        <thead>
                                        <th>{{__('Breed')}}</th>
                                        <th>{{__('Age')}}</th>
                                        <th>{{__('Weight')}}</th>
                                        <th>{{__('Percentage')}}%</th>
                                        <th>{{__('Grams norm. menu')}}</th>
                                        <th>{{__('Physical conditon')}}</th>
                                        <th>{{__('Activity')}}</th>
                                        <th>{{__('Neutered')}}</th>
                                        <th>{{__('Menu weight')}}</th>
                                        </thead>
                                        <tbody>
                                        <td>{{$orderRecipe->pet->breed->name}}</td>
                                        <td>{{dateToYearsAndMonths($orderRecipe->pet->date_of_birth)}}</td>
                                        <td>{{$orderRecipe->pet->weight}}</td>
                                        <td>{{$calcRecipe['kgPercentage']}}</td>
                                        <td>{{parseNumber($calcRecipe['idkHowToCallThisShit'])}}</td>
                                        <td>{{$orderRecipe->pet->weightPercentage->percentage}}</td>
                                        <td>{{$orderRecipe->pet->acivityPercentage->percentage}}</td>
                                        <td>{{$orderRecipe->pet->neuteredPercentage->percentage}}</td>
                                        <td>{{parseNumber($calcRecipe['weight']/1000)}}</td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-12 mb-1">
                                    <h5>{{ __('Calculated products, total grams and price of the menu') }}</h5>
                                </div>
                                <div class="col-12 mb-1">
                                    <table class="table">
                                        <thead>
                                        <th>{{__('Prefix')}}</th>
                                        <th>{{__('Code')}}</th>
                                        <th>{{__('Product name')}}</th>
                                        <th>{{__('Percentage')}}%</th>
                                        <th>{{__('Weight')}}</th>
                                        <th>{{__('Price')}}</th>
                                        <th>{{__('kCal/100gr')}}</th>
                                        <th>{{__('kCal/1gr')}}</th>
                                        <th>{{__('Total Product cKal')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($calcRecipe['products'] as $product)
                                            <tr>
                                                <td>{{$product['prefix']}}</td>
                                                <td>{{$product['code']}}</td>
                                                <td>{{$product['name']}}</td>
                                                <td>{{$product['percentage']}}</td>
                                                <td>{{parseNumber($product['weight']*1000)}}</td>
                                                <td>{{parseNumber($product['price'])}}</td>
                                                <td>{{$product['kcal']}}</td>
                                                <td>{{$product['kcal']/100}}</td>
                                                <td>{{parseNumber($product['kcalByWeight'])}}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>{{__('Total')}}:</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{parseNumber($calcRecipe['totalPercentage'])}}%</td>
                                            <td>{{parseNumber($calcRecipe['weight']) . __('g.')}}</td>
                                            <td>{!! parsePrice($calcRecipe['totalProductsPrice']) !!}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{parseNumber($calcRecipe['kcal']) . __('kcal') }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12 mb-1">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-0d5 dtl-mtc text-uppercase">
                                            <strong>{{ __('Supplement %') }}</strong>
                                        </div>
                                        <div class="col-12 col-md-6 mb-0d5 dtl-mtc">
                                            <strong>{{$calcRecipe['supplement']}} %</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-0d5 dtl-mtc text-uppercase">
                                            <strong>{{ __('Fixed allowance /£/') }}</strong>
                                        </div>
                                        <div class="col-12 col-md-6 mb-0d5 dtl-mtc">
                                            <strong>{!! parsePrice($calcRecipe['hard_supplement']) !!}</strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-0d5 dtl-mtc text-uppercase">
                                            <strong>{{ __('Price menu') }}</strong>
                                        </div>
                                        <div class="col-12 col-md-6 mb-0d5 dtl-mtc">
                                            <strong>{!! parsePrice($calcRecipe['hard_supplement']) !!}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
