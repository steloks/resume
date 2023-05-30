@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Client - dogs profiles')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors\css\vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors\css\tables\datatable\dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendors\css\tables\datatable\responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <h4>{{ __('Pets profile') }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <div class="row">
                <div class="filters col-6">
                    <label for="breed_id">{{__('Breed')}}</label>
                    <select id="breed_id" class="filter form-control" name="breed_id">
                        <option value="">{{ __('All') }}</option>
                        @foreach($breeds as $breed)
                            <option value="{{$breed->id}}">{{$breed->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filters col-6">
                    <label for="status">{{__('Status')}}</label>
                    <select id="status" class="filter form-control" name="status">
                        <option value="">{{ __('All') }}</option>
                        <option value="0">{{ __('Active') }}</option>
                        <option value="1">{{ __('Inactive') }}</option>
                    </select>
                </div>
            </div>
            <div class="dataTables_scroll">
                <table class="table w-100 js-datatable-ajax" id="client_pets"
                       data-datatable_request_url="{{ route('admin.clients-pets.gridDataClientPets') }}"
                >
                    <thead>
                    <tr>
                        <th>{{ __('Id') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Breed') }}</th>
                        <th>{{ __('Age') }}</th>
                        <th>{{ __('Gender') }}</th>
                        <th>{{ __('Owner') }}</th>
                        <th>{{ __('Status') }}</th>
                    </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    @include('admin._partials.datatable')
    <script type="text/javascript">
        $(document).ready(function () {

            setTimeout(function () {
                $('#client_pets').find('tbody').find('a').each(function (k, v) {
                    $(this).prop('target', '_blank')
                })
            }, 3500)

        })
    </script>
@endsection
