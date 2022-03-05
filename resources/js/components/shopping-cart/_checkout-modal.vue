<template>
<div>
  <!-- <div v-if="loading">
      <is-loading></is-loading>
  </div> -->
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
          <form @submit.prevent="submit" action="" class="auth-form">
    
<div class="modal-body">
  <div class="row">
    <div class="col-sm-6">
    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.first_name"
        type="text"
        name="first_name"
        placeholder="Your First Name"
      />
      <div v-if="errors && errors.first_name" class="text-danger">
        {{ errors.first_name[0] }}
      </div>
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.last_name"
        type="text"
        name="last_name"
        placeholder="Your Last Name"
      />
      <div v-if="errors && errors.last_name" class="text-danger">
        {{ errors.last_name[0] }}
      </div>
    </div>
 </div>
    <div class="col-sm-6">
    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.phone"
        type="text"
        name="phone"
        placeholder="Your Phone"
      />
      <div v-if="errors && errors.phone" class="text-danger">
        {{ errors.phone[0] }}
      </div>
    </div>
 </div>
    <div class="col-sm-6">
    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.country"
        type="phone"
        name="country"
        placeholder="Your Country"
      />
      <div v-if="errors && errors.country" class="text-danger">
        {{ errors.country[0] }}
      </div>
    </div>
 </div>
    <div class="col-sm-6">
    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.city"
        type="text"
        name="city"
        placeholder="Your City"
      />
      <div v-if="errors && errors.city" class="text-danger">
        {{ errors.city[0] }}
      </div>
    </div>
 </div>
    <div class="col-sm-6">
    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.province"
        type="text"
        name="province"
        placeholder="Your Province"
      />
      <div v-if="errors && errors.province" class="text-danger">
        {{ errors.province[0] }}
      </div>
    </div>
     </div>
    <div class="col-sm-6">
    <div class="form-groupe">
      <div class="remember_me">
        <input
          type="checkbox"
          name="remember_me"
          v-model="fields.remember_me"
        />
        <span class="remember_me" >Remeber me next time</span>
      </div>
    </div>
    </div>
  </div>
</div>
      <div class="modal-footer">
        <button type="submet" class="add-to-cart" @click="loading = true">
          <i class="fas fa-shopping-cart"></i><span> Send the order</span>
        </button>
      </div>
          </form>
        </div>
      </div> 
    </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  props:["shipping","total","sub_total"],
  data() {
    return {
      fields: {shipping:this.shipping,total:this.total, subTotal:this.sub_total},
      errors: {},
      loading:false,
    };
  },
  methods: {
    submit() {
      this.errors = {};
      $('#wait-loading').show();
      axios
        .post("add-order", this.fields)
        .then((response) => {
          $('#wait-loading').hide();
          window.location.href = "thank-you/"+this.fields['first_name'];
        })
        .catch((error) => {
          $('#wait-loading').hide();
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
            $('#wait-loading').hide();
          }
        });
    },
  },
};
</script> 