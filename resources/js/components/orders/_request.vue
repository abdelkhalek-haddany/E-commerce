<template>
<div>
    <a @click="show">
        <div class="wish item">
        <i class="fas fa-shopping-cart"></i> Request
        </div>
    </a>
    <modal :name="this.target">
      <div class="choose-product-modal" role="document">
        <div class="m-content">
          <div class="m-header">
            <h5 class="m-title">
              {{ title }}
            </h5>
            <button
              type="button"
              class="close"
              @click="hide"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="m-body">
              
              <div class="title">Request Content</div>
              <div class="row justify-content-center chooses" >
                

            </div>
        </div>
      </div> 
    </modal>
</div>
</template>

<script>
import axios from "axios";

export default {
    
 props: ["id"],
  data() {
  return {
      errors: {},
      fields: {quantity: 1 ,id: this.id, price: this.price},
      target:+this.title+this.id,
    };
  },
    mounted () {
    },
    methods:{
        show(){
        this.$modal.show(this.target)
        },
        hide(){
        this.$modal.hide(this.target)
        },
          submit() {
      this.errors = {};
      axios
        .post("/add-to-cart", this.fields)
        .then((response) => {
            window.location.href = "/shopping-cart";
        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
    },
    }
}
</script>










<div class="controller-sections text-center">
        <form action="" method="GET">
          <!-- delivery men -->
          <div class="control-sec 1">
            <select id="delivery-men" :model="fields.livreur_id" name="livreur_id">
              <option value="default" selected disabled>Delivery men</option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
            </select>
          </div>
          <!-- confirmation status -->
          <div class="control-sec">
            <select id="confirmation-status" class="conf" :model="fields.confirmation" name="confirmation">
              <option value="default" selected disabled>
                Confirmation status
              </option>
              <option value="1">Confirmed</option>
              <option value="0">Non Confirmed</option>
            </select>
          </div>
          <!-- delivery status -->
          <div class="control-sec">
            <select id="delivery-status" :model="fields.delivery" name="delivery">
              <option value="default" selected disabled>Delivery status</option>
              <option value="1">Delivred</option>
              <option value="0">Non Delivred</option>
            </select>
          </div>

          <!-- date controller -->
          <div class="control-sec">
            <div class="date">
              From<input id="from-date" type="date" :model="fields.from_date" name="from-date" />
            </div>
            <div class="date">
              To<input v-model="date" id="to-date" :model="fields.to_date"  type="date" name="to-date" />
            </div>
          </div>
          <!-- refresh controller -->
          <div class="control-sec">
            <button type="submit" class="sync">sync</button>
            <button class="reset">reset</button>
          </div>
           </form>
        </div>