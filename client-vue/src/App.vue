<template>
  <div id="nav">
    <router-link to="/">Home</router-link>
    |
    <router-link to="/about">About</router-link>
  </div>
  {{ data }}
  <router-view/>
</template>

<script>
import {api} from "@/api/config";

export default {
  name: 'App',
  data() {
    return {
      data: []
    }
  },
  methods: {
    async getData() {
      try {
        const response = await api.get('/organisations')
        console.log(response)
        this.data = response.data
      } catch (e) {
        console.error(e)
      }
    }
  },
  created() {
    this.getData()
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
