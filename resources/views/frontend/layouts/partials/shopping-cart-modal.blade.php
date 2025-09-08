  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header border-bottom">
          <div class="text-start">
              <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
              <small>Total Cart Products: <span class="minicart_counter" id="minicart_counter">0</span></small>
          </div>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
          <div>
              <!-- alert -->
              <div class="alert alert-danger p-2" role="alert">
                  You’ve got FREE delivery. Start
                  <a href="{{ route('cart') }}" class="alert-link">checkout now!</a>
              </div>
              <ul class="list-group list-group-flush minicart_holder" id="minicart_holder">
                  <!-- list group -->
              </ul>
              <!-- btn -->
              <div class="d-flex justify-content-between mt-4">
                  <a href="{{ route('home.index') }}" class="btn btn-primary">Continue Shopping</a>
                  <a href="{{ route('cart') }}" class="btn btn-dark">Goto Cart</a>
              </div>
          </div>
      </div>
  </div>
