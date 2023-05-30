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
                <a href="#tab-1"
                   class="btn btn-df-tab mr-05 mb-1 {{ !empty($errors->first('password')) ? '' : 'active' }}"
                   id="tab-1-tab" data-toggle="tab"
                   aria-controls="tab-1" role="tab" aria-selected="true"><i class="bx bx-user"></i> Personal data</a>
            </li>
            <li class="nav-item">
                <a href="#tab-2"
                   class="btn btn-df-tab mr-05 mb-1 {{ !empty($errors->first('password')) ? 'active' : '' }}"
                   id="tab-2-tab" data-toggle="tab"
                   aria-controls="tab-2" role="tab" aria-selected="true"><i class="bx bx-sun"></i> Change password</a>
            </li>
            <li class="nav-item">
                <a href="#tab-3" class="btn btn-df-tab mr-05 mb-1" id="tab-3-tab" data-toggle="tab"
                   aria-controls="tab-3" role="tab" aria-selected="true"><i class="bx bx-sun"></i> Roles</a>
            </li>
            {{--            <li class="nav-item">--}}
            {{--                <a href="#tab-4" class="btn btn-df-tab mr-05 mb-1" id="tab-4-tab" data-toggle="tab"--}}
            {{--                   aria-controls="tab-4" role="tab" aria-selected="true"><i class="bx bx-key"></i> Profile Privileges</a>--}}
            {{--            </li>--}}
        </ul>
        <div class="col-12 mt-1 mb-1">
            <form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="row tab-content">
                    <div class="tab-pane {{ !empty($errors->first('password')) ? '' : 'active' }} col-12 mb-3"
                         id="tab-1" aria-labelledby="tab-1-tab" role="tabpanel">
                        <div class="row m-0">
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="username">{{ __('User name') }}</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                           value="{{ old('username', $user->username ?? '') }}">
                                    @if($errors->first('username'))
                                        <span class="alert-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="name">{{ __('First name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ old('name', $user->name ?? '') }}">
                                    @if($errors->first('name'))
                                        <span class="alert-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="last_name">{{ __('Last name') }}</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                           value="{{ old('last_name', $user->last_name ?? '') }}">
                                    @if($errors->first('last_name'))
                                        <span class="alert-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </fieldset>
                            </div>
                            {{--                            <div class="col-12 col-lg-3 col-md-6 mb-05">--}}
                            {{--                                <fieldset class="form-group">--}}
                            {{--                                    <label for="password">{{ __('Password') }}<a href="javascript:void(0)"--}}
                            {{--                                                                                 class="ml-1 js-generate-pass">Generate</a></label>--}}
                            {{--                                    <input type="text" class="form-control" id="password" name="password"--}}
                            {{--                                           value="{{ old('password') }}" data-size="32"--}}
                            {{--                                           data-character-set="a-z,A-Z,0-9,#">--}}
                            {{--                                    @if($errors->first('password'))--}}
                            {{--                                        <span class="alert-danger">{{ $errors->first('password') }}</span>--}}
                            {{--                                    @endif--}}
                            {{--                                </fieldset>--}}
                            {{--                            </div>--}}
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="email">{{ __("E-mail") }}</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                           value="{{ old('email', $user->email ?? '') }}">
                                    @if($errors->first('email'))
                                        <span class="alert-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </fieldset>
                            </div>
                            <div class="col-12 col-lg-3 col-md-6 mb-05">
                                <fieldset class="form-group">
                                    <label for="phone">{{ __('Phone number') }}</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
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
                                    <select class="form-control" id="status" name="status">
                                        <option
                                            value="0" {{ !empty($user->deleted_at) ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                        <option
                                            value="1" {{ empty($user->deleted_at) ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    </select>
                                </fieldset>
                            </div>
                            @if(checkAccess('Users','create_edit'))
                                <div class="col-12 mt-1 dtl-mtc edit-block">
                                    <button type="submit" id="id"
                                            class="btn btn-dark text-uppercase mr-1">{{ __('Save') }}</button>
                                    <a href="{{ route('admin.users.index') }}" id="id"
                                       class="btn btn-light text-uppercase">{{ __('Cancel') }}</a>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="tab-pane col-12 mb-2 {{ !empty($errors->first('password')) ? 'active' : '' }}"
                         id="tab-2"
                         aria-labelledby="tab-2-tab" role="tabpanel">
                        <div class="col-12 mt-1 mb-1">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-12 col-xl-4 col-lg-5 col-md-6 mb-05">
                                        <fieldset class="form-group">
                                            <label for="password">{{ __('Current password') }}</label>
                                            <input type="password" class="form-control" id="password"
                                                   name="password"
                                                   value="">
                                            @if($errors->first('password'))
                                                <span class="alert-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-xl-4 col-lg-5 col-md-6 mb-05">
                                        <fieldset class="form-group">
                                            <label for="new_password">{{ __('New password') }}
                                                <a href="javascript:void(0)"
                                                   class="ml-1 js-generate-pass">{{ __('Generate') }}</a>
                                                <span class="bx bx-show toggle-password"
                                                      style="cursor: pointer;"></span>
                                            </label>
                                            <input type="password" class="form-control" id="new_password"
                                                   name="new_password" data-size="32"
                                                   data-character-set="a-z,A-Z,0-9,#">
                                            @if($errors->first('new_password'))
                                                <span
                                                    class="alert-danger">{{ $errors->first('new_password') }}</span>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-xl-4 col-lg-5 col-md-6 mb-05">
                                        <fieldset class="form-group">
                                            <label
                                                for="confirm_new_password">{{ __('Repeat the new password') }}</label>
                                            <input type="password" class="form-control" id="confirm_new_password"
                                                   name="confirm_new_password">
                                            @if($errors->first('confirm_new_password'))
                                                <span
                                                    class="alert-danger">{{ $errors->first('confirm_new_password') }}</span>
                                            @endif
                                        </fieldset>
                                    </div>
                                    <div class="col-12 col-xl-4 col-lg-5 col-md-6 mt-2 dtl-mtc">
                                        <input type="submit" id="2" name="update_password" value="{{ __('Save') }}"
                                               class="btn btn-dark text-uppercase" style="border: 1px solid rgb(46 61 78);
                                                                                                        color: rgb(255 255 255);
                                                                                                        background: rgb(46 61 78);
                                                                                                        padding: 6px 20px;
                                                                                                        border-radius: 3px;">
                                        <a href="{{ route('admin.users.index') }}" id="2"
                                           class="btn btn-light text-uppercase">{{ __('Cancel') }}</a>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane col-12 mb-3" id="tab-3" aria-labelledby="tab-3-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-12 mt-1">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-1 dtl-mtc">
                                        <h5>{{ __('Roles') }}</h5>
                                    </div>
                                    <div class="col-12 col-md-6 mb-1 dtr-mtc">
                                        <button type="button" id="add-role"
                                                class="btn btn-dark text-uppercase">
                                            + {{ __('Add role') }}</button>
                                    </div>
                                    @foreach($user->objects()->get() as $userObject)
                                        <div
                                            class="col-12 js-cloned-row-to-append{{ $loop->last == true ? '' : $loop->iteration }}">
                                            <div class="row">
                                                <div class="col-1 align-self-center">
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
                                                <div class="col-6 col-md-6 col-lg-5 col-lx-4">
                                                    <label for="role_ids_{{$loop->iteration}}">{{ __('Role') }}</label>
                                                    <select class="form-control" id="role_ids_{{$loop->iteration}}"
                                                            name="role_ids[]">
                                                        @foreach($roles as $role)
                                                            <option
                                                                value="{{$role->id}}"
                                                                {{ ($userObject->pivot->role_id == $role->id) ? 'selected' : '' }}>{{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-5 col-md-6 col-lg-5 col-lx-4">
                                                    <label
                                                        for="object_id_{{$loop->iteration}}">{{ __('Object') }}</label>
                                                    <select class="form-control" id="object_id_{{$loop->iteration}}"
                                                            name="object_ids[]">
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
                    {{--                                    <div class="col-12 col-xl-4 col-lg-5 col-md-6 mb-05">--}}
                    {{--                                        Datatable JS--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-12 col-xl-4 col-lg-5 col-md-6 mt-2 dtl-mtc">--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="col-12 col-md-7">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </form>
        </div>
        <div class="row js-to-clone d-none">
            <div class="col-1 align-self-center">
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
            <div class="col-6 col-md-6 col-lg-5 col-lx-4">
                <label for="role_ids">{{ __('Role') }}</label>
                <select class="form-control" id="role_ids"
                        name="role_ids[]">
                    @foreach($roles as $role)
                        <option
                            value="{{$role->id}}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-md-6 col-lg-5 col-lx-4">
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
                let field = $(this).parents().eq(1).find('#new_password');
                console.log($(this).parents())
                console.log(field)
                field.val(randString(field));
            });

            $(document).on('click', '#add-role', function () {
                let clonedEl = $('.js-to-clone').first().clone();
                $(this).parents('form').find('.js-cloned-row-to-append').append(clonedEl.removeClass('d-none'))

            })

            $(document).on('click', '.js-delete-row', function () {
                $(this).parents().eq(1).remove()
            })

            $(document).on('click', '.toggle-password', function () {

                $(this).toggleClass("fa-eye fa-eye-slash");

                let input = $(this).parents().eq(1).find('#new_password');
                input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
            });

            function randString(id) {
                let dataSet = $(id).data('character-set').split(',');
                let possible = '';
                if ($.inArray('a-z', dataSet) >= 0) {
                    possible += 'abcdefghijklmnopqrstuvwxyz';
                }
                if ($.inArray('A-Z', dataSet) >= 0) {
                    possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                }
                if ($.inArray('0-9', dataSet) >= 0) {
                    possible += '0123456789';
                }
                if ($.inArray('#', dataSet) >= 0) {
                    possible += '![]{}()%&*$#^<>~@|';
                }
                let text = '';
                for (let i = 0; i < $(id).attr('data-size'); i++) {
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                }
                return text;
            }
        })
    </script>
@endsection

