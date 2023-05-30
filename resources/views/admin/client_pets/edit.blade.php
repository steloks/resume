@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Client - dog profile')
{{-- vendor style --}}
@section('page-styles')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{ route('admin.clients-pets.index') }}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i><span class="ml-05">To all pets</span>
            </a>
            <h4>{{ $pet->name }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-1 dtl-mtc">
                            @if(\Illuminate\Support\Str::contains(request()->getHost(),['ebilling', 'cloud', 'dogfood', 'testdogfood']))
                            <img src="{{ asset(\Illuminate\Support\Str::after($pet->image, '/home/ebilling/testdogfood.ebilling.cloud/public')) }}"
                                     style="border-radius: 50%" class="img-fluid max-wh-125x" alt="{{ $pet->name }}"/>
                            @else
                                <img src="{{ asset(\Illuminate\Support\Str::after($pet->image, '\\public\\')) }}"
                                     style="border-radius: 50%" class="img-fluid max-wh-125x" alt="{{ $pet->name }}"/>
                            @endif
                        </div>
                        <div class="col-12 col-md-6 text-center mb-1">
                            <div><strong>{{ $pet->name }}</strong></div>
                            <div>{{ $pet->breed->name }}</div>
                            <div class="mt-1"><span
                                    class="badge {{ !empty($pet->deleted_at) ? 'badge-light-danger' : 'badge-light-success' }}">{{ !empty($pet->deleted_at) ? __('Inactive') : __('Active') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="row dmb1-mmb0">
                                <div class="col-12 col-md-4 col-lg-2 text-center mb-1">
                                    <div class="text-uppercase">Date of birth:</div>
                                    <div><strong>{{ parseDate($pet->date_of_birth) }}</strong></div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-2 text-center mb-1">
                                    <div class="text-uppercase">Age:</div>
                                    <div><strong>{{ dateToYearsAndMonths($pet->date_of_birth) }}</strong></div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-2 text-center mb-1">
                                    <div class="text-uppercase">Gender:</div>
                                    <div><strong>{{ $pet->gender }}</strong></div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-2 text-center mb-1">
                                    <div class="text-uppercase">Activity level:</div>
                                    <div><strong>{{ \App\Models\Pet::$activityLvl[$pet->activity_lvl] }}</strong></div>
                                </div>
                                <div class="col-12 col-md-3 text-center mb-1">
                                    <div class="text-uppercase">Unusual behavior</div>
                                    <div><strong>{{ !empty($pet->unusual_behavior) ? __('Yes') : __('No') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row dmb1-mmb0">
                                <div class="col-12 col-md-4 col-lg-2 text-center mb-1">
                                    <div class="text-uppercase">Weight:</div>
                                    <div><strong>{{ $pet->weight }}</strong></div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-2 text-center mb-1">
                                    <div class="text-uppercase">Weight level:</div>
                                    <div><strong>{{ \App\Models\Pet::$weightLvl[$pet->weight_lvl] }}</strong></div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-2 text-center mb-1">
                                    <div class="text-uppercase">Neutering:</div>
                                    <div><strong>{{ !empty($pet->neutered) ? __('Yes') : __('No') }}</strong></div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-2 text-center mb-1">
                                    <div class="text-uppercase">Disease:</div>
                                    <div><strong>{{ !empty($pet->disease) ? __('Yes') : __('No') }}</strong></div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-3 text-center mb-1">
                                    <div class="text-uppercase">Allergens:</div>
                                    <div><strong>{{ implode(',', $pet->getPetAllergens($pet->product_allergens->pluck('product_id')->toArray())) }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7 mb-3">
            <div class="">
                <div class="row">
                    <div class="col-12 dog-weight-summary">
                        <div class="mb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="">Change in weight level</h5>
                            </div>
                            <div class="card-body p-0">
                                <div id="dog-weight-summary-chart-detail"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 mb-3">
            <div class="row mb-2">
                <div class="col-12 col-md-6 dtr-mtc">
                    <div><strong>Owner:</strong></div>
                    <div><a href="">{{ $pet->owner->name }}</a></div>
                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Created:</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">
                    {{ parseDate($pet->created_at) }}
                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Created by:</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">
                    {{ $pet->created_by ?? __('Website') }}
                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Edited:</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">
                    {{ parseDate($pet->updated_at) }}
                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Edited by:</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">
                    {{ $pet->updated_by }}
                </div>
            </div>
        </div>
        <div class="col-12 mt-1 mb-1">
            <h5 class="">Diary</h5>
        </div>
        <div class="col-12 mb-1">
            @include('panels.front-user.pet-profile-diary-history', ['noChunk' => 1])
        </div>
    </div>
@endsection

@section('vendor-scripts')
    <script src="{{asset('vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
@endsection

@section('page-scripts')
    <script src="{{asset('js/scripts/pages/client-dog-profile.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            let dataMonths = "{{ implode(', ' , $parsedDates) }}",
                dataMonthsArr = dataMonths.replace("[", "").replace("]", "").split(','),
                test = {!! json_encode(petWeightLvlShit($petHistoriesWeightLvl,$petHistories->where('key', 'weight')->pluck('value')->map(function ($a){
                                            return str_replace(',', '.', $a);
                                        })->toArray())) !!},
                parsedTest = parsePff(test);
            let $light_green = "#ebfffc";
            let $green = '#009774';

            let dogWeightChartOptions = {
                chart: {
                    height: 480,
                    type: 'area',
                    toolbar: {
                        show: false,
                    },
                },
                colors: [$green, $green],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        inverseColors: false,
                        shade: 'light',
                        type: "vertical",
                        gradientToColors: [$light_green, $green],
                        opacityFrom: 0.7,
                        opacityTo: 0.55,
                        stops: [0, 80, 100]
                    }
                },
                series: [{
                    name: 'Weight',
                    data: parsedTest
                }],
                legend: {
                    offsetY: 8
                },
                xaxis: {
                    type: 'date',
                    categories: dataMonthsArr,
                },
                tooltip: {
                    x: {
                        format: 'm/y'
                    },
                }
            }
            let dogWeightChart = new ApexCharts(
                document.querySelector("#dog-weight-summary-chart-detail"),
                dogWeightChartOptions
            );
            dogWeightChart.render();
        })

        function parsePff(toParse) {
            let pff = [];
            $(toParse).each(function (k, v) {
                pff.push(v.data)
            })

            return pff;
        }
    </script>
@endsection
