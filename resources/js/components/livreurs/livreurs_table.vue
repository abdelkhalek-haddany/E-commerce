<template>
  <div>
    {{livreurs}}
  <!-- <div v-if="loading">
      <is-loading></is-loading>
      </div>
  <div v-else>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>City</th>
            <th>Phone</th>
            <th>NIDN</th>
            <th>Register Date</th>
            <th>Items Delivered</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <template v-for="livreur in livreurs">
            <tr v-bind:key="livreur.id">
              <td>{{ livreur.name }}</td>
              <td>{{ livreur.city }}</td>
              <td>{{ livreur.phone }}</td>
              <td>{{ livreur.NIDN }}</td>
              <td>{{ livreur.created_at | formatDate }}</td>
              <td>{{ livreur.items_delivered}}</td>
              <td v-if="livreur.status==1">Active</td>
              <td v-else>Desactivate</td>
              <td><a class="btn btn-primary" href="">Edit</a>
                  <a class="btn btn-danger" href="">Delete</a>
              </td>
            </tr>
          </template>
        </tbody>
      </table>
      <router-link :to="{name:'create_livreur'}">
      </router-link>
    </div> -->
  </div>
</template>

<script>
export default {

  data: () => ({
    loading: true,
    livreurs: [],
    filter_livreurs:[],

  }),
  props: ['delivery_man'],
     mounted () {
        axios
        .get(gsheet_url)
        .then(response => (
          this.livreurs=parseData(response.data.feed.entry)
        ))
  },
  methods: {
    loadLivreurs() {
      axios.get("/api/livreurs").then((response) => {
        this.livreurs = response.data.livreurs;
        setTimeout(() => {
                this.loading = false;
              }, 500);
            });
          },
}
};
</script>