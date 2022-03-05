<template>
  <div class="orders">
    <div class="page-header">
      <span class="icon">
        <i class="fas fa-bags-shopping"></i>
      </span>
      <h1 class="title">Orders</h1>
      <button class="add add-order btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Create New
      </button>
        <ul class="dropdown-menu text-left" aria-labelledby="dropdown">
            <li @click="popup"><span class="dropdown-item">Confirmed</span></li>
            <li><span class="dropdown-item">Delivered</span></li>
            <li><span class="dropdown-item">Delete</span></li>
        </ul>
    </div>
    <orders-stats></orders-stats>
    <orders-table></orders-table>
  </div>
</template>

<script>
export default {
  methods:{
    popup(){
    let popup_overlay = document.createElement('div');
    popup_overlay.className="popup-overlay";
    document.body.appendChild(popup_overlay);
    }
  }
}
</script>

