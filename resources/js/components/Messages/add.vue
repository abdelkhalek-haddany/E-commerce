
<template>
  <form @submit.prevent="submit" action="" class="auth-form">
    <div class="form-group">
      <input
        type="text"
        class="form-control"
        name="name"
        id="name"
        placeholder="Your Name"
        v-model="fields.name"
      />
      <div v-if="errors && errors.name" class="text-danger">
        {{ errors.name[0] }}
      </div>
    </div>
    <div class="form-group">
      <input
        type="email"
        class="form-control"
        name="email"
        id="email"
        placeholder="Your Email"
        v-model="fields.email"
      />
      <div v-if="errors && errors.email" class="text-danger">
        {{ errors.email[0] }}
      </div>
    </div>
    <div class="form-group">
      <input
        type="subject"
        class="form-control"
        name="subject"
        id="subject"
        placeholder="Your Subject"
        v-model="fields.subject"
      />
      <div v-if="errors && errors.subject" class="text-danger">
        {{ errors.subject[0] }}
      </div>
    </div>
    <div class="form-group">
      <textarea
        class="form-control"
        id="message"
        name="message"
        rows="5"
        placeholder="Your Message"
        v-model="fields.message"
      ></textarea>
      <div v-if="errors && errors.message" class="text-danger">
        {{ errors.message[0] }}
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Send message</button>
  </form>
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
        .post("send-message", this.fields)
        .then((response) => {
                $('#wait-loading').hide();
                this.fields="";
                showMessage('Your message sended seccesefully',1);
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