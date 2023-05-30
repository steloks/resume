<div class="modal fade df-modal" id="dfUserOrderDetails" tabindex="-1" aria-labelledby="dfUserOrderDetailsLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" data-bs-toggle="modal"
                        data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2r text-center">
                    <h2 class="ff-fptdemi">Order details</h2>
                </div>
                <div class="mb-2r text-center">
                    <div>Please kindly note that ordering food for the next day is possible until 16:00 pm and delivery
                        will be made in the time interval from: 7:00 am to 11:00 am.
                    </div>
                </div>
                <form>
                    <div class="mb-3 flatpickr-wrapper-pw">
                        <label class="form-label w-100" for="1">Date for delivery:</label>
                        <input class="datepicker form-control w-100" id="order_menu_date" name="order_menu_date">
                    </div>
                    <div class="row mb-2r mx-0 timeslots-holder">
                        <div class="col-12 mb-1r">
                            <strong>Time slot:</strong>
                        </div>
                        <div class="col-12 mb-1r">
                            Choose the time slot which will be most suitable for you.
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="button" id="addMenuToCart" data-recipeId=""  data-bs-toggle="modal"
                                data-bs-dismiss="modal" class="btn btn-df-lbr btn-sq-lp w-100">Add to cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
