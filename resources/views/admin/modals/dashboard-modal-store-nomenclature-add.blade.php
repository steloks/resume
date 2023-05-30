<div class="modal fade" id="shibanmodal" tabindex="-1" aria-labelledby="dashboard-modal-store-nomenclature-add"
     aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered dashboard-modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content py-2 px-1">
            <div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Add to objects</h4>
                <p class="text-center mb-2">Select objects</p>
                <form class="row" action="{{route(('admin.products.attach.to.objects'))}}" method="POST">
                    @csrf
                    <div class="col-12 mb-1">
                        <ul class="list-unstyled mb-0">
                            @foreach($objects as $object)
                                <li class="d-inline-block mr-2 mb-1">
                                    <fieldset>
                                        <div class="checkbox">
                                            <input type="checkbox" class="checkbox-input" name="objects[]" id="checkbox{{$object->id}}"
                                                   value="{{$object->id}}">
                                            <label for="checkbox{{$object->id}}">{{$object->name}}</label>
                                        </div>
                                    </fieldset>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" id="10" class="btn btn-dark text-uppercase">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
