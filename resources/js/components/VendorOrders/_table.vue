<template>
  <div>
    <div v-if="loading">
      <is-loading></is-loading>
    </div>
    <div v-else>
      
       
        <div class="orders-table">
      <table class="table display nowrap table-striped table-bordered scroll-horizontal">
        <thead>
          <tr>
            <th class="selected"><input v-model="selectAll" type="checkbox" name="check"></th>
            <th>Date</th>
            <th>Client</th>
            <th>Product</th>
            <th>Price</th>
            <th>Size</th>
            <th>Color</th>
            <th>Phone</th>
            <th>Address</th>
            <!-- <th>City</th> -->
            <th>Confirmation</th>
            <th>Delivery</th>
            <th>Delivery man</th>
            <!-- <th>Actions</th> -->
          </tr>
        </thead>
        <tbody>
          <template v-for="order in orders">
            <tr v-bind:key="order.order.id" :class="'status'+order.order.confirmation+order.order.delivery">
              <td class="selected"><input v-model="selected" :value="order.order.id" number type="checkbox" name="check"></td>
              <td>
                  <time-ago :refresh="60" :datetime="order.order.created_at | formatDate" locale="en" tooltip></time-ago>
              </td>
              <td>{{ order.order.last_name}} {{order.order.first_name}}</td>
                <td>
                  <div v-for="item in order.items" :key="item.id">{{item.product[0].title}}</div>
                </td>
                <td>
                  <div v-for="item in order.items" :key="item.id">{{item.product[0].price}}$</div>
                </td>
                <td>
                  <div  v-for="item in order.items" :key="item.id">{{item.item.size}}</div>
                </td>
                <td class="colors">
                  <div v-for="item in order.items" :key="item.id"  :style="'background-color:'+item.item.color"></div>
                </td>
              <td>{{ order.order.phone }}</td>
              <td>{{ order.order.country }}/{{ order.order.city }}/{{ order.order.province }}</td>

              <td v-if="order.order.confirmation == 1">
                <span class="yes">Confirmed</span>
              </td>
              <td v-else><span class="non">Not Confirmed</span></td>

              <td v-if="order.order.delivery == 1">
                <span class="yes">Delivered</span>
              </td>
              <td v-else><span class="non">Not Delivered</span></td>

              <td>{{ order.order.livreur_id }}</td>

              </tr>
          </template>
        </tbody>
      </table>
        </div>
    </div>
  </div>
</template>

<script>
export default {
 
  data: () => ({
    selected: [],
    loading: true,
    orders: [],
    fields:[],
    order_items: [],
    date: new Date().toISOString().slice(0, 10),
    errors: {},
  }),
  mounted() {
    this.loadOrders();
  },

  methods: {
    loadOrders() {
       this.loading = true;
      axios.get("/shop/api/orders").then((response) => {
        this.orders = response.data.orders;
        this.order_items = response.data.order_items;
          this.loading = false;
      })
      .catch(error => {
        this.loading = false;
        showMessage('There are no order',0);
      });
      this.loading = false;
    },
  },
  
  computed: {
        selectAll: {
            get: function () {
                return this.orders ? this.selected.length == this.orders.length : false;
            },
            set: function (value) {
                var selected = [];

                if (value) {
                    this.orders.forEach(function (order) {
                        selected.push(order.order.id);
                    });
                }

                this.selected = selected;
            }
        },
    }
};
</script>
