<template>
  <btn
    :title="title"
    userClass="btn_add-to-card"
    blue
  />
</template>

<script>
import Btn from './Btn.vue';

export default {
  props: {
    title: {
      type: String,
      required: true,
    },
  },
  components: {
    Btn,
  },
}
</script>

<style lang="sass">
.btn_add-to-card
  text-align: left
  background-image: url('../images/cart.png')
  background-repeat: no-repeat
  background-position: 12px 6px
  padding-left: 43px
  padding-right: 15px
</style>
