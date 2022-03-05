<div>
    <a 
      class="ckeck-out-btn"
      type="button"
      data-toggle="modal"
      data-target="#checkout_modal">
      Checkout
    </a>
    
    <div
      class="modal"
      id="checkout_modal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="checkout_modalTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" data-target="#checkout_modalTitle">Send Order
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
              >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <form action="{{route('checkout')}}" method="POST" class="auth-form">
          <input type="text" name="ids" hidden value="{{$p_filter}}"/>
          <input type="text" name="shipping" hidden value="{{$shipping}}"/>
          <input type="text" name="sub_total" hidden value="{{$total}}"/>
          <input type="text" name="total" hidden value="{{$total+$shipping}}"/>

      <div class="modal-body">
      <div class="row">
        <div class="col-sm-6">
        <div class="form-groupe">
          <input
            class="form-control"
            type="text"
            name="first_name"
            placeholder="Your First Name"
          />
        @error('first_name')
            <span class="text-danger">{{$message}} </span>
        @enderror
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-groupe">
          <input
            class="form-control"
            type="text"
            name="last_name"
            placeholder="Your Last Name"
          />
          @error('last_name')
            <span class="text-danger">{{$message}} </span>
        @enderror
        </div>
      </div>
        <div class="col-sm-6">
        <div class="form-groupe">
          <input
            class="form-control"
            type="phone"
            name="phone"
            placeholder="Your Phone"
          />
          @error('phone')
          <span class="text-danger">{{$message}} </span>
          @enderror
        </div>
      </div>
        <div class="col-sm-6">
        <div class="form-groupe">
          <input
            class="form-control"
            type="text"
            name="country"
            placeholder="Your Country"
          />
          @error('country')
          <span class="text-danger">{{$message}} </span>
          @enderror
        </div>
      </div>
        <div class="col-sm-6">
        <div class="form-groupe">
          <input
            class="form-control"
            type="text"
            name="city"
            placeholder="Your City"
          />
          @error('city')
          <span class="text-danger">{{$message}} </span>
          @enderror
        </div>
      </div>
        <div class="col-sm-6">
        <div class="form-groupe">
          <input
            class="form-control"
            type="text"
            name="province"
            placeholder="Your Province"
          />
          @error('province')
          <span class="text-danger">{{$message}} </span>
          @enderror
        </div>
          </div>
        <div class="col-sm-6">
        <div class="form-groupe">
          <div class="remember_me">
            <input
              type="checkbox"
              name="remember_me"
            />
            <span>Remeber me next time</span>
          </div>
        </div>
        </div>
      </div>
      </div>
          <div class="modal-footer">
            <button type="submet" class="add-to-cart">
              <i class="fas fa-shopping-cart"></i><span> Send the order</span>
            </button>
          </div>
              </form>
            </div>
      </div> 
    </div>
    </div>