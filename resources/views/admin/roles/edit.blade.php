@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Settings - role edit')
{{-- vendor style --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12 mt-1 mb-2">
            <a href="{{ route('admin.roles.index') }}" class="brd-a-item mb-1">
                <i class="bx bx-arrow-back"></i> <span>{{ __('To all roles') }}</span>
            </a>
            <h4>{{ __('New role') }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-1 mb-1">
            <form action="{{ route('admin.roles.update', ['id' => $role->id]) }}" class="row" method="POST">
                @csrf
                <div class="col-12 col-xl-6 mb-3">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name', $role->name ?? '') }}">
                            </fieldset>
                        </div>
                        <div class="col-12 col-md-6 mb-05">
                            <fieldset class="form-group">
                                <label for="status">{{ __('Status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="0" selected>{{ __('Active') }}</option>
                                    <option value="1">{{ __('Inactive') }}</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12 mb-05">
                            <fieldset class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea class="form-control" id="description" rows="6"
                                          name="description">{!! old('name', $role->description ?? '') !!}</textarea>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="row">
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-1 dtl-mtc">
                            <h5>{{ __('Users') }}</h5>
                        </div>
                        <div class="col-12 col-md-6 mb-1 dtr-mtc">
                            <button type="button" id="add-user" class="btn btn-dark text-uppercase">
                                + {{ __('Add user') }}</button>
                        </div>
                        <div class="col-12 col-md-6 mb-1">
                            @foreach($usersWithRole as $userWithRole)
                                @foreach($userWithRole->objects as $userWithRoleObject)
                                    <div class="row js-to-clone-{{ $loop->index }}">
                                        <div class="col-md-2">
                                            <a href="javascript:void(0)" class="js-delete-row">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                                    <path fill-rule="evenodd"
                                                          d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="user_id">{{ __('User') }}</label>
                                            <select class="form-control" id="user_id" name="user_ids[]">
                                                @foreach($users as $user)
                                                    <option
                                                        value="{{$user->id}}" {{ $userWithRole->id == $user->id ? 'selected' : '' }}>{{$user->name . $user->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="object_id">{{ __('Object') }}</label>
                                            <select class="form-control" id="object_id" name="object_ids[]">
                                                @foreach($objects as $object)
                                                    <option
                                                        value="{{$object->id}}" {{ $userWithRoleObject->id == $object->id ? 'selected' : '' }}>{{$object->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                            <div class="row js-to-clone d-none">
                                <div class="col-md-2">
                                    <a href="javascript:void(0)" class="js-delete-row">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                                            <path fill-rule="evenodd"
                                                  d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <label for="user_id">{{ __('User') }}</label>
                                    <select class="form-control" id="user_id" name="user_ids[]" disabled>
                                        @foreach($users as $user)
                                            <option
                                                value="{{$user->id}}" {{ $loop->iteration == 1 ? 'selected' : '' }}>{{$user->name . $user->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="object_id">{{ __('Object') }}</label>
                                    <select class="form-control" id="object_id" name="object_ids[]" disabled>
                                        @foreach($objects as $object)
                                            <option
                                                value="{{$object->id}}" {{ $loop->iteration == 1 ? 'selected' : '' }}>{{$object->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                </div>
                <div class="col-12">
                    @include('admin.roles.global-perms')
                </div>
                <div class="col-12">
                    @include('admin.roles.modules-perms')
                </div>
                @if(checkAccess('Roles','create_edit'))
                    <div class="col-12 mt-2 mb-2 dtl-mtc">
                        <button type="submit" id="id" class="btn btn-dark text-uppercase">{{ __('Save') }}</button>
                        <a href="{{ route('admin.roles.index') }}" id="2"
                           class="btn btn-light text-uppercase">{{ __('Cancel') }}</a>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on('click', '#add-user', function () {
                let el = $('.js-to-clone'),
                    clonedEl = el.first().clone();

                clonedEl.removeClass('d-none')
                clonedEl.find('select').removeAttr('disabled')

                el.parent().append(clonedEl)

            })

            $(document).on('click', '.js-delete-row', function () {
                $(this).parent().parent().remove()
            })

            $(document).on('change', '#globalView', function () {
                if ($(this).is(':checked')) {
                    $('.view').prop('checked', true)
                } else {
                    $('.view').prop('checked', false)
                }
            })

            $(document).on('change', '#globalCreateEdit', function () {
                if ($(this).is(':checked')) {
                    $('.create_edit').prop('checked', true)
                } else {
                    $('.create_edit').prop('checked', false)
                }
            })

            $(document).on('change', '#globalDelete', function () {
                if ($(this).is(':checked')) {
                    $('.delete').prop('checked', true)
                } else {
                    $('.delete').prop('checked', false)
                }
            })

        })
    </script>
@endsection
