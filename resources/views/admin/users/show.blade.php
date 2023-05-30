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
            {{--            <li class="nav-item">--}}
            {{--                <a href="#tab-4" class="btn btn-df-tab mr-05 mb-1" id="tab-4-tab" data-toggle="tab"--}}
            {{--                   aria-controls="tab-4" role="tab" aria-selected="true"><i class="bx bx-key"></i> Profile Privileges</a>--}}
            {{--            </li>--}}
        </ul>
        <form action="{{ route('admin.users.update', ['id' => $user->id]) }}" class="row" method="POST">
            @csrf
            <div class="col-12 mt-1 mb-1">
                <div class="row tab-content">
                    <div class="tab-pane active col-12 mb-3" id="tab-1" aria-labelledby="tab-1-tab" role="tabpanel">
                        <div class="row m-0">
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="username">{{ __('User name') }}</label>
                                    <input type="text" class="form-control" id="name" name="username" disabled
                                           value="{{ old('username', $user->username ?? '') }}">
                                    @if($errors->first('username'))
                                        <span class="alert-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="name">{{ __('First name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" disabled
                                           value="{{ old('name', $user->name ?? '') }}">
                                    @if($errors->first('name'))
                                        <span class="alert-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="last_name">{{ __('Last name') }}</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" disabled
                                           value="{{ old('last_name', $user->last_name ?? '') }}">
                                    @if($errors->first('last_name'))
                                        <span class="alert-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="password">{{ __('Password') }}<a href="javascript:void(0)"
                                                                                 class="ml-1 js-generate-pass disabled">Generate</a></label>
                                    <input type="text" class="form-control" id="password" name="password" disabled
                                           value="{{ old('password') }}" data-size="32"
                                           data-character-set="a-z,A-Z,0-9,#">
                                    @if($errors->first('password'))
                                        <span class="alert-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="email">{{ __("E-mail") }}</label>
                                    <input type="text" class="form-control" id="email" name="email" disabled
                                           value="{{ old('email', $user->email ?? '') }}">
                                    @if($errors->first('email'))
                                        <span class="alert-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="phone">{{ __('Phone number') }}</label>
                                    <input type="text" class="form-control" id="phone" name="phone" disabled
                                           value="{{ old('phone', $user->phone ?? '') }}">
                                    @if($errors->first('phone'))
                                        <span class="alert-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="company_name">{{ __('Company name') }}</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                           value="{{ old('company_name', $user->company_name ?? '') }}">
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group w-100">
                                    <label for="status">{{ __('Status') }}</label>
                                    <select class="form-control" id="status" name="status" disabled>
                                        <option
                                            value="0" {{ !empty($user->deleted_at) ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                        <option
                                            value="1" {{ empty($user->deleted_at) ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 mt-1 dtl-mtc edit-block">
                                <a href="{{ route('admin.users.edit.view', ['id' => $user->id]) }}" id="id"
                                   class="btn btn-dark text-uppercase mr-1">{{ __('Edit') }}</a>
                                <a href="{{ route('admin.users.index') }}" id="id"
                                   class="btn btn-light text-uppercase">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane col-12 mb-3" id="tab-2" aria-labelledby="tab-2-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-12 mt-1">
                                <div class="row">
                                    <div class="col-12 col-md-12 mb-1 dtl-mtc">
                                        <h5>{{ __('Roles') }}</h5>
                                    </div>
                                    <div class="col-12 col-md-12 mb-1 dtr-mtc">
{{--                                        <button type="button" id="add-role" disabled--}}
{{--                                                class="btn btn-dark text-uppercase">--}}
{{--                                            + {{ __('Add role') }}</button>--}}
{{--                                    </div>--}}
                                    @foreach($user->objects()->get() as $key=>  $userObject)
                                    <div class="col-12 js-cloned-row-to-append">
                                            <div class="row">
                                                <div class="col-1 align-self-center">
                                                    <a href="javascript:void(0)" class="js-delete-row disabled">
                                                       {{ '№' . $loop->iteration }}
                                                    </a>
                                                </div>
                                                <div class="col-6 col-md-6 col-lg-5 col-lx-4">
                                                    <label for="role_ids">{{ __('Role') }}</label>
                                                    <select class="form-control" id="role_ids"
                                                            name="role_ids[]" disabled>
                                                        @foreach($roles as $role)
                                                            <option
                                                                value="{{$role->id}}"
                                                                {{ ($userObject->pivot->role_id == $role->id) ? 'selected' : '' }}>{{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-5 col-md-5 col-lg-5 col-lx-4">
                                                    <label for="object_id">{{ __('Object') }}</label>
                                                    <select class="form-control" id="object_id"
                                                            name="object_ids[]" disabled>
                                                        @foreach($objects as $object)
                                                            <option
                                                                value="{{$object->id}}"
                                                                {{ ($userObject->pivot->object_id == $object->id) ? 'selected' : '' }}>{{ $object->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12 col-xl-6"></div>
                            {{--                                        <div class="col-12 mt-2 mb-2 dtl-mtc">--}}
                            {{--                                            <button type="submit" id="id"--}}
                            {{--                                                    class="btn btn-dark text-uppercase">{{ __('Save') }}</button>--}}
                            {{--                                        </div>--}}
                        </div>
                    </div>
                    {{--                    <div class="tab-pane col-12 mb-3" id="tab-4" aria-labelledby="tab-4-tab" role="tabpanel">--}}
                    {{--                        <div class="row">--}}
                    {{--                            <div class="col-12 col-md-5 mb-3">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-12 mb-05">--}}
                    {{--                                        Datatable JS--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-12 mt-2 dtl-mtc">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="col-12 col-md-7">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </form>
    </div>
@endsection

