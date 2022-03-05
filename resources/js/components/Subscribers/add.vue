<template>
<div>
<form class="subscribe-container" @submit.prevent="submit"  action="">
    <div class="form-group">
    <input id="email" type="text" v-model="fields.email" class="subscribe-input" name="email" placeholder="Your email"/>
     <div v-if="errors && errors.email" class="text-danger">
        {{ errors.email[0] }}
      </div>
    </div>
    <input type="submit" id="btn-submit" class="submit" value="subscribe">   
</form>
</div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      fields: {},
      errors: {},
    };
  },
  methods: {
    submit() {
      $('#wait-loading').show();
      this.errors = {};
      axios
        .post("subscribe", this.fields)
        .then((response) => {
          $('#wait-loading').hide();
           showMessage('Thank you for joining us',1);
        })
        .catch((error) => {
          $('#wait-loading').hide();
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
    },
  },
};
</script>