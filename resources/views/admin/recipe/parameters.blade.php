@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Recipes - parameter')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <h4>{{ __('Recipe parameters') }}</h4>
        </div>
    </div>
    <div class="row">
        <ul class="nav nav-tabs col-12 mb-1 px-1" role="tablist">
            <li class="nav-item">
                <a href="#tab-1" class="btn btn-df-tab mr-05 mb-1 active" id="tab-1-tab" data-toggle="tab"
                   aria-controls="tab-1" role="tab" aria-selected="true"><i class="bx bx-slider"></i> {{ __('Input parameters') }}</a>
            </li>
            <li class="nav-item">
                <a href="#tab-2" class="btn btn-df-tab mr-05 mb-1" id="tab-2-tab" data-toggle="tab"
                   aria-controls="tab-2" role="tab" aria-selected="true"><i class="bx bx-hive"></i> {{ __('Percentage of nutrients') }}</a>
            </li>
            <li class="nav-item">
                <a href="#tab-3" class="btn btn-df-tab mr-05 mb-1" id="tab-3-tab" data-toggle="tab"
                   aria-controls="tab-3" role="tab" aria-selected="true"><i class="bx bx-pound"></i> {{ __('Allowance') }}</a>
            </li>
        </ul>
        <div class="col-12 mt-1 mb-1">
            <div class="row tab-content">
                <div class="tab-pane active col-12 mb-3" id="tab-1" aria-labelledby="tab-1-tab" role="tabpanel">
                    <form class="row" method="POST" action="{{route('admin.recipe.parameters.percentages.edit')}}">
                        @csrf
                        <div class="col-12 col-lg-6 mb-2">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-1">
                                    <h5>{{ __('Breeds and percentage') }}</h5>
                                </div>
                                <div class="col-12 col-md-6 mb-1">
{{--                                    <button type="button" id="button" class="btn btn-dark text-uppercase">{{ __('+ Add') }}--}}
{{--                                    </button>--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-1">
                                    <table>
                                        <thead>
                                        <th>{{__('Breed')}}</th>
                                        <th>{{__('KG. (From-To)')}}</th>
                                        <th>{{__('Percentage')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($dogKillogramPercentages as $dogKillogramPercentage)
                                            <tr>
                                                <td>{{$dogKillogramPercentage->name}}</td>
                                                <td>
                                                    <span class="d-flex">
                                                        <input type="number" step="0.01" class="form-control"
                                                               name="min_age[{{$dogKillogramPercentage->id}}]"
                                                               value="{{$dogKillogramPercentage->min_age}}">
                                                        -
                                                        <input type="number" step="0.01" class="form-control"
                                                               name="max_age[{{$dogKillogramPercentage->id}}]"
                                                               value="{{$dogKillogramPercentage->max_age}}">
                                                    </span>

                                                    {{--                                                    {{$dogKillogramPercentage->min_age . '-' .$dogKillogramPercentage->max_age}}--}}
                                                </td>
                                                <td><input type="number" step="0.01"
                                                           class="form-control"
                                                           name="dog_kg_percentage[{{$dogKillogramPercentage->id}}]"
                                                           value="{{$dogKillogramPercentage->percentage}}"></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-2">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-1">
                                    <h5>{{ __('Neutering') }}</h5>
                                </div>
                                <div class="col-12 col-md-6 mb-1">
{{--                                    <button type="button" id="button" class="btn btn-dark text-uppercase">{{ __('+ Add') }}--}}
{{--                                    </button>--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-1">
                                    <table>
                                        <thead>
                                        <th>{{__('Neutered')}}</th>
                                        <th>{{__('Percentage')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($dogNeuteredPercentages as $dogNeuteredPercentage)
                                            <tr>
                                                <td>{{$dogNeuteredPercentage->neutered == 1 ? 'Yes':'No'}}</td>
                                                <td><input type="number"
                                                           class="form-control"
                                                           name="dog_neutered_percentage[{{$dogNeuteredPercentage->id}}]"
                                                           step="0.01" max="100"
                                                           value="{{$dogNeuteredPercentage->percentage }}"></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-2">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-1">
                                    <h5>{{ __('Weight level') }}</h5>
                                </div>
                                <div class="col-12 col-md-6 mb-1">
{{--                                    <button type="button" id="button" class="btn btn-dark text-uppercase">{{ __('+ Add') }}--}}
{{--                                    </button>--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-1">
                                    <table>
                                        <thead>
                                        <th>{{__('Physical Condition')}}</th>
                                        <th>{{__('Percentage')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($dogWeightLvlPercentages as $dogWeightLvlPercentage)
                                            <tr>
                                                <td>{{$dogWeightLvlPercentage->name }}</td>
                                                <td><input type="number"
                                                           class="form-control"
                                                           name="dog_weight_lvl_percentage[{{$dogWeightLvlPercentage->id}}]"
                                                           step="0.01" max="100"
                                                           value="{{$dogWeightLvlPercentage->percentage }}"></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-2">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-1">
                                    <h5>{{ __('Activity level') }}</h5>
                                </div>
                                <div class="col-12 col-md-6 mb-1">
{{--                                    <button type="button" id="button" class="btn btn-dark text-uppercase">{{ __('+ Add') }}--}}
{{--                                    </button>--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-1">
                                    <table>
                                        <thead>
                                        <th>{{__('Activity')}}</th>
                                        <th>{{__('Percentage')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($dogActivityPercentages as $dogActivityPercentage)
                                            <tr>
                                                <td>{{$dogActivityPercentage->name }}</td>
                                                <td><input type="number"
                                                           class="form-control"
                                                           name="dog_activity_percentage[{{$dogActivityPercentage->id}}]"
                                                           step="0.01" max="100"
                                                           value="{{$dogActivityPercentage->percentage }}"></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @if(checkAccess('Recipe parameters','create_edit'))
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
                <div class="tab-pane col-12 mb-3" id="tab-2" aria-labelledby="tab-2-tab" role="tabpanel">
                    <form class="row" method="POST" action="{{route('admin.recipe.parameters.edit')}}">
                        @csrf
                        <div class="col-12 mb-2">
                            <div class="row">
                                <div class="col-12 col-lg-4 mb-1">
                                    <fieldset class="form-group">
                                        <label for="id">{{ __('Additive - egg') }}</label>
                                        <input type="text" disabled class="form-control" id="id" value="Яйце">
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-4 mb-1">
                                    <fieldset class="form-group">
                                        <label for="id">{{ __('Gram') }}</label>
                                        <input type="number" class="form-control" id="id" name="edd_weight"
                                               value="{{Cache::get('eggWeight') ?? 0}}">
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        @foreach($recipeParameters as $recipeType)
                            <div class="col-12 col-lg-4 mb-2">
                                <div class="row">
                                    <h5>{{$recipeType->name}}</h5>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-1">
                                        <table>
                                            <thead>
                                            <th>{{__('Code')}}</th>
                                            <th>{{__('Category')}}</th>
                                            <th>{{__('Percentage') . '%'}} </th>
                                            </thead>
                                            <tbody>
                                            @foreach($recipeType->recipeParameters as $recipeParams)
                                                <tr>
                                                    <td>{{$recipeParams->category->prefix}}</td>
                                                    <td>{{$recipeParams->category->name}}</td>
                                                    <td><input type="number" max="100"
                                                               class="form-control"
                                                               name="recipeParams[{{$recipeType->id}}][{{$recipeParams->category_id}}]"
                                                               value="{{$recipeParams->percentage}}"></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if(checkAccess('Recipe parameters','create_edit'))
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
                <div class="tab-pane col-12 mb-3" id="tab-3" aria-labelledby="tab-3-tab" role="tabpanel">
                    <form class="row" action="{{route('admin.recipe.parameters.supplements.edit')}}" method="POST">
                        @csrf
                        <div class="col-12 mb-1">
                            <div class="row">
                                <div class="col-12 col-lg-4 mb-1">
                                    <fieldset class="form-group">
                                        <label for="id">{{ __('Supplement %') }}</label>
                                        <input type="number" class="form-control" id="id" name="supplement"
                                               value="{{$supplements['supplement']}}">
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-4 mb-1">
                                    <fieldset class="form-group">
                                        <label for="id">{{ __('Fixed allowance /£') }}</label>
                                        <input type="number" class="form-control" id="id" name="hard_supplement"
                                               value="{{$supplements['hard_supplement']}}">
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        @if(checkAccess('Recipe parameters','create_edit'))
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
            })

            $(document).on('click', '.cancel-df-js', function () {
                $(this).parent().find('.save-df-js').addClass('d-none')
                $(this).parent().find('.cancel-df-js').addClass('d-none')
                $(this).parent().find('.edit-df-js').removeClass('d-none')
                $(this).parents('.row').find('.edit-js-details').removeClass('d-none')
            })
        });
    </script>
@endsection

