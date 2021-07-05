<template>
  <h1>Add organisations</h1>

  <br>
  <br>
  <br>

  <form @submit.prevent="createOrganisation" class="">
    <label>
      Slug
      <input type="text" v-model="organisation.slug">
    </label>
    <br>
    <br>
    <label>
      Name
      <input type="text" v-model="organisation.name">
    </label>
    <br>
    <br>
    <label>
      Email
      <input type="email" v-model="organisation.email">
    </label>
    <br>
    <br>
    <label>
      Tel
      <input type="tel" v-model="organisation.tel">
    </label>
    <br>
    <br>
    <label>
      Address
      <input type="text" v-model="organisation.address">
    </label>
    <br>
    <br>
    <label>
      Type
      <input type="text" v-model="organisation.type">
    </label>
    <br>
    <br>
    <button type="submit">Enregistrer</button>
  </form>
</template>

<script>
// import {api} from "@/api/config";

import {api} from "@/api/config";

export default {
  name: 'Add',
  data() {
    return {
      organisation: {
        slug: '',
        name: '',
        email: '',
        tel: '',
        address: '',
        type: ''
      }
    }
  },
  methods: {
    async createOrganisation() {
      try {
        const response = await api.post('/organisation')
        console.log(response)
      } catch (e) {
        console.error(e)
      }
    }
  },
  created() {

  }
}
</script>

<style>
.text-left {
  text-align: left;
}
</style>