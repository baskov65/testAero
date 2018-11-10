<template>
  <div
    class="product"
    :class="className"
  >
    <div class="product__article">
      Арт {{item.article}}
    </div>
    <div class="product__img">
      <img :src="item.img" alt="">
    </div>
    <div class="product__stock">
      {{inStock}}
    </div>
    <div v-html="item.name" class="product__name"></div>
    <div class="params product__params">
      <div
        v-for="param in item.params"
        :key="param.title"
        class="params__item"
      >
        <span class="params__name">{{param.name}}</span>
        <span class="params__value">{{param.value}}</span>
      </div>
    </div>
    <div class="actions product__actions">
      <btn-add-to-card
        title="Купить"
      />
      <div class="actions__right">
        <button
          v-if="notInFavourite"
          @click="addToFavourite"
          class="actions__favourite"
        >
        </button>
        <button 
          v-else
          @click="removeFromFavourite"
          class="actions__favourite-message"
        >
          {{item.inFavouriteMessage}}
        </button>
        <div class="actions__compare"></div>
      </div>
    </div>
  </div>
</template>

<script>
import Btn from './Btn.vue';
import BtnAddToCard from './BtnAddToCard.vue';
export default {
  name: 'Product',
  props: {
    item: {
      type: Object,
      required: true,
    },
    className: {
      type: String,
    }
  },
  computed: {
    inStock() {
      return (this.item.inStock ? 'В'  : 'Нет в') + ' наличии';
    },

    notInFavourite() {
      return !this.item.inFavourite;
    }
  },
  methods: {
    addToFavourite() {
      this.$emit('update:addToFavourite', this.item.id);
    },

    removeFromFavourite() {
      this.$emit('update:removeFromFavourite', this.item.id);
    }
  },
  components: {
    Btn,
    BtnAddToCard
  },
}
</script>

<style lang="sass">
  @mixin proximaLight
    font-family: 'ProximaNovaLight', Sans-serif;

  .product
    background: #fff
    padding: 22px
    box-sizing: border-box
    margin-bottom: 10px
    &__article
      font-size: 11.9px;
      font-family: 'ProximaNovaLight', Sans-serif;
      text-align: right
      color: #bfbfbf
      margin-bottom: 15px
    &__img
      margin-bottom: 20px
      text-align: center
      img
        width: 200px
    &__stock
      @include proximaLight
      font-size: 12.9px
      color: #81c03d
      display: flex
      align-items: center
      background: url('../images/done.png') no-repeat left center
      padding-left: 20px
    &__done
      stroke: #81c03d
      margin-right: 7px
    &__name
      font-size: 17.9px
      color: #262626
      margin-top: 5px
    &__params
      margin-top: 17px
    &__actions
      margin-top: 50px
      display: flex
      justify-content: space-between
      align-items: center
  .params
    @include proximaLight
    font-size: 11.9px
    &__item
      margin-bottom: 12px
      line-height: 1
    &__name
      color: #9b9b9b
    &__value
      color: #4f4f4f
  .actions
    &__favourite, &__favourite-message
      background: none
      outline: none
      border: none
      cursor: pointer
    &__favourite
      padding: 0
      margin-right: 10px
      background: url('../images/heart.png') no-repeat center
      width: 20px
      height: 17px
    &__favourite-message
      font-size: 12px
      margin-right: 10px
    &__compare
      background: url('../images/compare.png') no-repeat center
      width: 22px
      height: 17px
    &__right
      display: flex
      align-items: center
</style>
