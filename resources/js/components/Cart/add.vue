<template>
  <form @submit.prevent="submit" action="" class="auth-form">
    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.first_name"
        type="text"
        name="first_name"
        placeholder="Your First Name"
      />
      <div v-if="errors && errors.first_name" class="text-danger">
        {{ errors.first_name[0] }}
      </div>
    </div>

    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.last_name"
        type="text"
        name="last_name"
        placeholder="Your Last Name"
      />
      <div v-if="errors && errors.last_name" class="text-danger">
        {{ errors.last_name[0] }}
      </div>
    </div>

    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.phone"
        type="phone"
        name="phone"
        placeholder="Your Phone"
      />
      <div v-if="errors && errors.phone" class="text-danger">
        {{ errors.phone[0] }}
      </div>
    </div>

    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.country"
        type="phone"
        name="country"
        placeholder="Your Country"
      />
      <div v-if="errors && errors.country" class="text-danger">
        {{ errors.country[0] }}
      </div>
    </div>

    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.city"
        type="text"
        name="city"
        placeholder="Your City"
      />
      <div v-if="errors && errors.city" class="text-danger">
        {{ errors.city[0] }}
      </div>
    </div>

    <div class="form-groupe">
      <input
        class="form-control"
        v-model="fields.province"
        type="text"
        name="province"
        placeholder="Your Province"
      />
      <div v-if="errors && errors.province" class="text-danger">
        {{ errors.province[0] }}
      </div>
    </div>
    <div class="form-groupe">
      <div class="remember_me">
        <input
          type="checkbox"
          name="remember_me"
          v-model="fields.remember_me"
        />
        <span>Remeber me next time</span>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
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
      this.errors = {};
      axios
        .post("add-cart", this.fields)
        .then((response) => {
          alert("Your cart added successfuly!");
        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
    },
  },
};
</script> 