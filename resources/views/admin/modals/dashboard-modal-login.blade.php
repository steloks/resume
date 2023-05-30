<div class="modal fade" id="dashboard-modal-store-nomenclature-add" tabindex="-1" aria-labelledby="dashboard-modal-store-nomenclature-add" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered dashboard-modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content py-2 px-1">
      <div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="bx bx-x"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="brand-logo text-center">
          <img src="{{asset('images/logo/logo.png')}}" class="logo image-fluid" alt="">
        </div>
        <h2 class="text-center mb-3">Log in</h2>
        <form class="row">
          <div class="col-12 mb-1">
            <fieldset class="form-group">
              <input type="text" class="form-control" id="login-email" name="login-email" placeholder="Email">
            </fieldset>
          </div>
          <div class="col-12 mb-1">
            <fieldset class="form-group">
              <input type="password" class="form-control" id="login-password" name="login-password" placeholder="Password">
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-1">
            <fieldset>
              <div class="checkbox">
                <input type="checkbox" class="checkbox-input" id="checkbox1">
                <label for="checkbox1">Remember me</label>
              </div>
            </fieldset>
          </div>
          <div class="col-12 col-md-6 mb-1 dtr-mtl">
            <a href="#">Forgot your password?</a>
          </div>
          <div class="col-12 text-center mt-1">
            <button type="button" id="login" class="btn btn-dark text-uppercase w-100">Log in</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>