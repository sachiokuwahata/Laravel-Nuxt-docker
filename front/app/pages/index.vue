<template>
  <div>
    <Tutorial />

    <div>
      <div>
          <button
          type="button"
          name="button"
          @click="getMsg"
        >
          LaravelからAPIを取得する
        </button>
      </div>
      <div
          v-for="(msg, i) in msgs"
          :key="i"
        >
          {{ msg }}
      </div>
    </div>

  </div>

</template>

<script>
export default {
  name: 'IndexPage',
  data () {
    return {
      msgs: []
    }
  },
  methods: {
    getMsg () {
      console.log('click')
      this.msgs.push('click')
      this.$axios.$get('/api/hello')
        .then(res => this.msgs.push(res))
    }
  }
}
</script>
