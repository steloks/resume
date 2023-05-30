<div class="row">
    <div class="col-12 col-lg-6 mt-1 mb-1">
        <div class="row">
            <div class="col-12 mt-1 mb-1">
                <h5>Set global Privileges all modules</h5>
            </div>
            <div class="col-12 mt-1 mb-1">
                <table class="table">
                    <thead>
                    <th>{{__('Show Module')}}</th>
                    <th>{{__('Module')}}</th>
                    <th>{{__('Create/Edit')}}</th>
                    <th>{{__('View')}}</th>
                    <th>{{__('Delete')}}</th>
                    </thead>
                    <tbody>
                    @foreach($modules as $module)
                        <tr>
                            <td>
                                <input type="hidden" name="show_module[{{$module->id}}]" value="0">
                                <input type="checkbox" value="1"
                                       {{optional(optional($role->modules->firstWhere('id',$module->id))->pivot)->show_module ? 'checked' : ''}}
                                       name="show_module[{{$module->id}}]">
                            </td>
                            <td>
                                {{ __($module->name) }}
                            </td>
                            <td>
                                <input type="hidden" name="create_edit[{{$module->id}}]" value="0">
                                <input type="checkbox" value="1" class="create_edit"
                                       {{optional(optional($role->modules->firstWhere('id',$module->id))->pivot)->create_edit ? 'checked' : ''}}
                                       name="create_edit[{{$module->id}}]">
                            </td>
                            <td>
                                <input type="hidden" name="view[{{$module->id}}]" value="0">
                                <input type="checkbox" value="1" class="view"
                                       {{optional(optional($role->modules->firstWhere('id',$module->id))->pivot)->view ? 'checked' : ''}}
                                       name="view[{{$module->id}}]">
                            </td>
                            <td>
                                <input type="hidden" name="delete[{{$module->id}}]" value="0">
                                <input type="checkbox" value="1" class="delete"
                                       {{optional(optional($role->modules->firstWhere('id',$module->id))->pivot)->delete ? 'checked' : ''}}
                                       name="delete[{{$module->id}}]">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
