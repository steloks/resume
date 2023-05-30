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
                <i class="bx bx-arrow-back"></i> <span>To all roles</span>
            </a>
            <h4>{{ $role->name }}</h4>
            <div>ID: {{ $role->id }}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-6 mb-3">
            <div class="row">
                <div class="col-12 mb-1">
                   <div class="row">
                       <div class="col-6 col-md-6 mb-05">
                           <fieldset class="form-group">
                               <label for="name">Role name</label>
                               <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}"
                                      disabled>
                           </fieldset>
                       </div>
                       <div class="col-6 col-md-6 mb-05">
                           <fieldset class="form-group">
                               <label for="status">{{ __('Status') }}</label>
                               <select class="form-control" id="status" name="status" disabled>
                                   <option value="0" {{ empty($role->deleted_at) ? 'selected' : '' }}>{{ __('Active') }}</option>
                                   <option value="1" {{ !empty($role->deleted_at) ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                               </select>
                           </fieldset>
                       </div>
                       <div class="col-12 mb-05">
                           <fieldset class="form-group">
                               <label for="description">{{ __('Description') }}</label>
                               <textarea class="form-control" id="description" rows="6" name="description" disabled>{!! old('name', $role->description ?? '') !!}</textarea>
                           </fieldset>
                       </div>
                   </div>
                    <div class="col-12 col-xl-6">
                        <div class="row">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 dtl-mtc">
                                <h5>{{ __('Users') }}</h5>
                            </div>
                            <div class="row">
                                @foreach($usersWithRole as $userWithRole)
                                    @foreach($userWithRole->objects as $userWithRoleObject)
                                        <div class="col-12 mb-2 js-to-clone-{{ $loop->index }}">
                                           <div class="row">
                                               <div class="col-6">
                                                   <label for="user_id">{{ __('User') }}</label>
                                                   <select class="form-control" id="user_id" name="user_ids[]" disabled>
                                                       @foreach($users as $user)
                                                           <option
                                                               value="{{$user->id}}" {{ $userWithRole->id == $user->id ? 'selected' : '' }}>{{$user->name . $user->last_name}}</option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                               <div class="col-6">
                                                   <label for="object_id">{{ __('Object') }}</label>
                                                   <select class="form-control" id="object_id" name="object_ids[]"
                                                           disabled>
                                                       @foreach($objects as $object)
                                                           <option
                                                               value="{{$object->id}}" {{ $userWithRoleObject->id == $object->id ? 'selected' : '' }}>{{$object->name}}</option>
                                                       @endforeach
                                                   </select>
                                               </div>
                                           </div>
                                        </div>
                                        <br>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if(checkAccess('Roles','create_edit'))
                        <div class="col-12 mt-2 dtl-mtc">
                            <a href="{{ route('admin.roles.edit.view', ['id' => $role->id]) }}" id="2"
                               class="btn btn-light text-uppercase">{{ __('Edit') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 mt-1 mb-1">
            <div class="row">
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Created:</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">
                    {{ parseDate($role->created_at) }}
                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Created by:</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">
                    {{ $role->created_by ?? __('Website') }}
                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Edited:</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">
                    {{ parseDate($role->updated_at) }}
                </div>
                <div class="col-12 col-md-6 dtr-mtc">
                    <strong>Edited by:</strong>
                </div>
                <div class="col-12 col-md-6 dtl-mtc mb-05">
                    {{ $role->updated_by }}
                </div>
            </div>
        </div>
    </div>
@endsection
