<template>
  <button
    class="btn"
    :class="[userClass, blueClass]"
    @click="btnClick"
  >
    {{title}}
  </button>
</template>

<script>
export default {
  name: 'Button',
  props: {
    title: {
      type: String,
      required: true,
    },
    userClass: {
      type: String,
    },
    blue: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    blueClass() {
      return this.blue ? 'btn_blue' : '';
    },
  },
  methods: {
    btnClick() {
      this.$emit('update:button');
    },
  },
}
</script>

<style lang="sass">
.btn
  background: #f8f8f8
  font-family: 'ProximaNovaLight', Sans-serif
  border: none
  line-height: 1
  font-size: 14px
  padding: 11px 10px 10px
  cursor: pointer
  outline: none
  &:hover
    background-color: #dfdfdf
  &_blue
    color: #fff
    background-color: #0284c6
    &:hover
      background-color: #0a608b
</style>
