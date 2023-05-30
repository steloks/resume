@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Users')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{ route('admin.users.index') }}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>To all users</span>
            </a>
        </div>
    </div>
    <div class="row">
        <ul class="nav nav-tabs col-12 mb-1 px-1" role="tablist">
            <li class="nav-item">
                <a href="#tab-1" class="btn btn-df-tab mr-05 mb-1 active" id="tab-1-tab" data-toggle="tab"
                   aria-controls="tab-1" role="tab" aria-selected="true"><i class="bx bx-user"></i> Personal data</a>
            </li>
            <li class="nav-item">
                <a href="#tab-2" class="btn btn-df-tab mr-05 mb-1" id="tab-2-tab" data-toggle="tab"
                   aria-controls="tab-21" role="tab" aria-selected="true"><i class="bx bx-sun"></i> Roles</a>
            </li>
        </ul>
        <form action="{{ route('admin.users.store') }}" class="row" method="POST">
            @csrf
            <div class="col-12 mt-1 mb-1">
                <div class="row tab-content">
                    <div class="tab-pane active col-12 mb-3" id="tab-1" aria-labelledby="tab-1-tab" role="tabpanel">
                        <div class="row m-0">
                                <div class="col-12 col-lg-3 col-md-6 mb-05">
                                    <fieldset class="form-group">
                                        <label for="username">{{ __('User name') }}</label>
                                        <input type="text" class="form-control" id="name" name="username"
                                               value="{{ old('username') }}">
                                        @if($errors->first('username'))
                                            <span class="alert-danger">{{ $errors->first('username') }}</span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6 mb-05">
                                    <fieldset class="form-group">
                                        <label for="name">{{ __('First name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{ old('name') }}">
                                        @if($errors->first('name'))
                                            <span class="alert-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6 mb-05">
                                    <fieldset class="form-group">
                                        <label for="last_name">{{ __('Last name') }}</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               value="{{ old('last_name') }}">
                                        @if($errors->first('last_name'))
                                            <span class="alert-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6 mb-05">
                                    <fieldset class="form-group">
                                        <label for="password">{{ __('Password') }}<a href="javascript:void(0)" class="ml-1 js-generate-pass">Generate</a></label>
                                        <input type="text" class="form-control" id="password" name="password"
                                               value="{{ old('password') }}" data-size="32" data-character-set="a-z,A-Z,0-9,#">
                                        @if($errors->first('password'))
                                            <span class="alert-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6 mb-05">
                                    <fieldset class="form-group">
                                        <label for="email">{{ __("E-mail") }}</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                               value="{{ old('email') }}">
                                        @if($errors->first('email'))
                                            <span class="alert-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6 mb-05">
                                    <fieldset class="form-group">
                                        <label for="phone">{{ __('Phone number') }}</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               value="{{ old('phone') }}">
                                        @if($errors->first('phone'))
                                            <span class="alert-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6 mb-05">
                                    <fieldset class="form-group">
                                        <label for="company_name">{{ __('Company name') }}</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                               value="{{ old('company_name') }}">
                                    </fieldset>
                                </div>
                                <div class="col-12 col-lg-3 col-md-6 mb-05">
                                    <fieldset class="form-group w-100">
                                        <label for="status">{{ __('Status') }}</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="0">{{ __('Inactive') }}</option>
                                            <option value="1" selected>{{ __('Active') }}</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 mt-1 dtl-mtc edit-block">
                                    <button type="submit" id="id"
                                            class="btn btn-dark text-uppercase mr-1">{{ __('Save') }}</button>
                                    <a href="{{ route('admin.users.index') }}" id="id"
                                       class="btn btn-light text-uppercase">{{ __('Cancel') }}</a>
                                </div>
                        </div>
                    </div>
                    <div class="tab-pane col-12 mb-3" id="tab-2" aria-labelledby="tab-2-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-12 mt-1">
                                <div class="row">
                                        <div class="col-12 col-xl-6">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-1 dtl-mtc">
                                                    <h5>{{ __('Roles') }}</h5>
                                                </div>
                                                <div class="col-12 col-md-6 mb-1 dtr-mtc">
                                                    <button type="button" id="add-role"
                                                            class="btn btn-dark text-uppercase">
                                                        + {{ __('Add role') }}</button>
                                                </div>
                                                <div class="col-12 js-cloned-row-to-append">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <a href="javascript:void(0)" class="js-delete-row">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16" fill="currentColor" class="bi bi-x-lg"
                                                                     viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                          d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                                                    <path fill-rule="evenodd"
                                                                          d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="col-5">
                                                            <label for="role_ids">{{ __('Role') }}</label>
                                                            <select class="form-control" id="role_ids"
                                                                    name="role_ids[]">
                                                                @foreach($roles as $role)
                                                                    <option
                                                                        value="{{$role->id}}">{{ $role->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-5">
                                                            <label for="object_id">{{ __('Object') }}</label>
                                                            <select class="form-control" id="object_id"
                                                                    name="object_ids[]">
                                                                @foreach($objects as $object)
                                                                    <option
                                                                        value="{{$object->id}}">{{$object->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-6"></div>
{{--                                        <div class="col-12 mt-2 mb-2 dtl-mtc">--}}
{{--                                            <button type="submit" id="id"--}}
{{--                                                    class="btn btn-dark text-uppercase">{{ __('Save') }}</button>--}}
{{--                                        </div>--}}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row js-to-clone d-none">
            <div class="col-2">
                <a href="javascript:void(0)" class="js-delete-row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                         height="16" fill="currentColor" class="bi bi-x-lg"
                         viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                        <path fill-rule="evenodd"
                              d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                    </svg>
                </a>
            </div>
            <div class="col-5">
                <label for="role_ids">{{ __('Role') }}</label>
                <select class="form-control" id="role_ids"
                        name="role_ids[]">
                    @foreach($roles as $role)
                        <option
                            value="{{$role->id}}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-5">
                <label for="object_id">{{ __('Object') }}</label>
                <select class="form-control" id="object_id"
                        name="object_ids[]">
                    @foreach($objects as $object)
                        <option
                            value="{{$object->id}}">{{$object->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on('click', '.js-generate-pass', function () {
                    let field = $(this).parents().eq(1).find('#password');
                    field.val(randString(field));
                });

            $(document).on('click', '#add-role', function () {
                let clonedEl = $('.js-to-clone').first().clone();
                $(this).parents('form').find('.js-cloned-row-to-append').append(clonedEl.removeClass('d-none'))

            })

            $(document).on('click', '.js-delete-row', function () {
                $(this).parents().eq(1).remove()
            })

            function randString(id){
                let dataSet = $(id).data('character-set').split(',');
                let possible = '';
                if($.inArray('a-z', dataSet) >= 0){
                    possible += 'abcdefghijklmnopqrstuvwxyz';
                }
                if($.inArray('A-Z', dataSet) >= 0){
                    possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                }
                if($.inArray('0-9', dataSet) >= 0){
                    possible += '0123456789';
                }
                if($.inArray('#', dataSet) >= 0){
                    possible += '![]{}()%&*$#^<>~@|';
                }
                let text = '';
                for(let i=0; i < $(id).attr('data-size'); i++) {
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                }
                return text;
            }
        })
    </script>
@endsection

