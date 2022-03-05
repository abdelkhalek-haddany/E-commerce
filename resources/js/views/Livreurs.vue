<template>
<div>
  <div class="page-header">
      <span class="icon">
        <i class="fas fa-person-carry"></i>
      </span>
      <h1 class="title">Livreurs</h1>
            <a class="add add-livreurs btn btn-primary">Add livreur</a>
    </div>
  <livreurs-statistics></livreurs-statistics>
  <livreurs-table></livreurs-table>
  </div>
</template>
<script>
import livreurs_table from '../../components/dashboard/livreurs/livreurs_table.vue';
export default {
  components: { livreurs_table },};
</script>