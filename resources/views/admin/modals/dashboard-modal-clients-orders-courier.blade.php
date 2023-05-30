<div class="modal fade" id="dashboard-modal-clients-orders-courier" tabindex="-1"
     aria-labelledby="dashboard-modal-clients-orders-courier" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered dashboard-modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content py-2 px-1">
            <div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h2 class="text-center mb-3">Choose a courier for the selected orders</h2>
                <form class="row">
                    <div class="col-6 mb-2 fw-600 text-uppercase">
                        Name courier:
                    </div>
                    <div class="col-6 mb-2">
                        <fieldset class="form-group">
                            <select class="form-control" id="courierSelect" name="courierId">
                                @foreach($couriers as $courier)
                                    <option value="{{$courier->id}}">{{$courier->name . ' ' . $courier->last_name}}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-12 text-center mt-1">
                        <button type="button" id="id" class="btn btn-dark text-uppercase assign-courier" data-dismiss="modal">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
