<template>
  <div class="checkbox" :class="className">
    <input
      class="checkbox__input"
      type="checkbox"
      :id="item.code"
      @change="setCheckbox"
      :checked="checkboxActive"
    />
    <div class="checkbox__block"></div>
    <label
      v-if="item.title"
      class="checkbox__label"
      :class="classLable"
      :for="item.code"
    >
      {{item.title}}
    </label>
  </div>
</template>

<script>
export default {
  name: 'Checkbox',
  props: {
    item: {
      type: Object,
      required: true,
    },
    className: {
      type: String,
    },
    classLable: {
      type: String,
    },
    checkboxActive: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      checked: false,
    }
  },
  methods: {
    setCheckbox(event) {
      this.$emit('update:checkbox', {
        code: this.item.code, 
        checked: event.target.checked
      });
    },
  },
}
</script>

<style lang="sass">
input[type=checkbox]
  margin: 0
  opacity: 0
  cursor: pointer
  position: absolute
  left: 0
  top: 0
.checkbox
  display: inline-flex
  align-items: flex-start
  position: relative
  font-family: 'ProximaNovaLight', Sans-serif
  &__input
    width: 14px
    height: 14px
  &__block
    width: 14px
    height: 14px
    box-shadow: inset 0 2px 2px 0 rgba(0, 0, 0, 0.07)
    border: solid 1px #d7d7d7
    pointer-events: none
    box-sizing: border-box
    display: flex
    align-items: center
    justify-content: center
    &:before
      width: 100%
      height: 100%
      display: block
  &__label
    font-size: 14px
    color: #4a4a4a
    line-height: 1
    padding-left: 10px
    cursor: pointer
  input[type=checkbox]:checked + .checkbox__block
    background: #3e8bdc
    border: none
    box-shadow: inset 0 1px 3px 0 rgba(0, 0, 0, 0.32)
    background: #3e8bdc url('../images/checked.png') no-repeat center
  input[type=checkbox]:checked + .checkbox__block + .checkbox__label
    color: #3e8bdc
</style>
