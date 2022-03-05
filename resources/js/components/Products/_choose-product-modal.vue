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
              {{ title }}
            </h5>
            <button type="button" class="close" @click="hide">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="submit" action="">
            <input type="text" name="id" hidden :value="id" />
            <div class="m-body">
              <div class="p-image">
                <img
                  v-for="image in images.split(',')"
                  :key="image"
                  :src="'/uploads/products/' + image"
                  :alt="title"
                />
              </div>
              <div class="title">Choose</div>
              <div class="row justify-content-center chooses">
                <div v-if="colors" class="col-4">
                  <div class="product-colors">
                    <div class="colors d-flex">
                      <label
                        v-for="color in colors.split(',')"
                        :key="color"
                        :for="color"
                        :style="'background-color:' + color"
                      >
                        <input
                          type="radio"
                          v-model="fields.color"
                          :value="color"
                          :id="color"
                        />
                      </label>
                    </div>
                  </div>
                </div>

                <div v-if="sizes" class="col-4">
                  <div class="product-sizes">
                    <div class="sizes d-flex">
                      <label
                        v-for="size in sizes.split(',')"
                        :key="size"
                        :for="size"
                        >{{ size }}
                        <input
                          type="radio"
                          v-model="fields.size"
                          :value="size"
                          :id="size"
                        />
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="product-quantity">
                    <input
                      type="number"
                      name="quantity"
                      v-model="fields.quantity"
                      min="1"
                      max="50"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="m-footer">
              <div class="row d-flex justify-content-center">
                <div class="col-8">
                  <button type="submet" class="add-to-cart">
                    <i class="fas fa-shopping-cart"></i
                    ><span> Add To Cart</span>
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
  props: ["id", "title", "images", "colors", "sizes", "price"],
  data() {
    return {
      errors: {},
      fields: { quantity: 1, id: this.id, price: this.price },
      target: this.title + this.id,
    };
  },
  mounted() {},
  methods: {
    show() {
      this.$modal.show(this.target);
    },
    hide() {
      this.$modal.hide(this.target);
    },
    submit() {
      $("#wait-loading").show();
      this.errors = {};
      axios
        .post("/add-to-cart", this.fields)
        .then((response) => {
          window.location.href = "/shopping-cart";
          $("#wait-loading").hide();
        })
        .catch((error) => {
          $("#wait-loading").hide();
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
    },
  },
};
</script>
