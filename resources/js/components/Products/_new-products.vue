<template>
<div class="new-products">
    <div class="container">
        <div class="section-title">
            <h2 class="title">
                New Products
            </h2>
        </div>

        <div class="products">
            <div v-if="loading">Loading...</div>
            <div class="row">
                <div v-for="product in products" class="col-sm-6 col-lg-3" v-bind:key="product.id">
                     <div class="product-item">
                    <div class="item-header">
                        <div class="item-img">
                            <img class="img-fluid" :src="'/assets/images/'+product.id+'.jpg'" alt="item">
                        </div>
                    </div>
                    <div class="item-body">
                        <div class="row">
                    <div class="col-8">
                        <div class="item-rate">
                            <span class="star">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="star">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="star">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="star">
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="star">
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <div class="item-owner">
                            <i class="fas fa-user"></i>
                            <span class="owner-name">Eco Muroc</span>
                        </div>
                        <div class="item-title">{{product.title}}</div>
                        <div class="item-price">
                            {{product.price}}$
                        </div>
                    </div><div class="col-4">
                        <div class="operations">
                            <div class="cart item">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="wish item">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="info item">
                                <i class="fas fa-info"></i>
                            </div>
                        </div>
                    </div></div>

                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

  data() {
    return {
    loading: true,
    products: [],
 }},
    mounted() {
    this.loadProducts();
  },
  methods: {
    loadProducts() {
      axios.get("new_products").then((response) => {
        this.products = response.data.products;
          this.loading = false;
      });
    },
  },
  }
</script>