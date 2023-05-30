@extends('layouts.frontLayout')
{{-- title --}}
@section('title', 'User - Pet Profile Diary')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">
@endsection

@section('content')
<div class="container my-3r">
    <div class="row mx-3pr">
        <div class="col-12 col-lg-3 mb-3r">
            @include('panels.front-user.sidebar-navigation')
        </div>
        <div class="col-12 col-lg-9 mb-3r">
            @include('panels.front-user.pet-profile-diary')
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset('vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
    <script src="{{asset('js/scripts/pages/client-dog-profile.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            let dataMonths = "{{ implode(', ' , $parsedDates) }}",
                dataMonthsArr = dataMonths.replace("[", "").replace("]", "").split(','),
            test = {!! json_encode(petWeightLvlShit($petHistoriesWeightLvl, $petHistories->where('key', 'weight')->pluck('value')->map(function ($a){
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
                    labels: {
                        show: true,
                        rotate: 0,
                        rotateAlways: false,
                        hideOverlappingLabels: false,
                        showDuplicates: true,
                        trim: true
                    }
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
