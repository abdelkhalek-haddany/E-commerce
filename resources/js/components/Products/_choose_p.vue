<template>
<div>
    <a @click="show">
        <div class="wish item">
        <i class="fas fa-shopping-cart"></i>
        </div>
    </a>
    <modal :name="this.target">
      <div class="choose-product-modal" role="document">
        <div class="m-content">
          <div class="m-header">
            <h5 class="m-title">
              {{ product.title }}
            </h5>
            <button
              type="button"
              class="close"
              @click="hide"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form @submit.prevent="submit" action="">
            <input type="text" name="id" hidden :value="product.id"/>
            <div class="m-body">
              <div class="p-image">
                <!-- <img v-for="image in product.AllImages" :key="image" :src="$image" :alt="product.title" /> -->
              </div>
              <div class="title">Choose</div>
              <div class="row justify-content-center chooses" >
                
                <div v-if="colors" class="col-4">
                  <div class="product-colors">
                    <select name="color" v-model="fields.color">
                      <option desibled selected >Color</option>
                      <option v-for="color in product.colors" :key="color" :bind="color" class="color" :style="{ backgroundColor: color }">{{color}}</option>
                    </select>
                  </div>
                </div>

                <div v-if="sizes" class="col-4">
                  <div class="product-sizes">
                    <select name="size" v-model="fields.size">
                      <option desibled selected >Size</option>
                      <option v-for="size in product.sizes" :key="size" :v-bind="size" class="size" >{{size}}</option>
                    </select>
                  </div>
                </div>

                <div class="col-3">
                  <div class="product-quantity">
                    <input type="number" name="quantity" v-model="fields.quantity" min="1" max="50">
                  </div>
                </div>
              </div>
            </div>
            <div class="m-footer">
              <div class="row d-flex justify-content-center">
                <div class="col-8">
                   <button type="submet" class="add-to-cart">
                <i class="fas fa-shopping-cart"></i><span> Add To Cart</span>
              </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div> 
    </modal>
</div>
</template>

<script>
import axios from "axios";

export default {
    
 props: ["product"],
  data() {
    return {
      errors: {},
      fields: {quantity: 1 ,id: this.product.id, color: 'Color', size: 'Size', price: this.product.price},
      target:this.product.title+this.product.id,
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
