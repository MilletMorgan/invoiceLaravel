<template>
  <h1>Index</h1>

  {{ data }}
</template>

<script>
import {api} from "@/api/config";

export default {
  name: 'Index',
  data() {
    return {
      data: []
    }
  },
  methods: {
    async getData() {
      try {
        const response = await api.get('/organisations')
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
