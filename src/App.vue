<template>
	<div
    v-if="products.length"
    class="wrap"
  >
    <div class="wrap__products">
      <product
        v-for="item in products"
        :key="item.id"
        :item="item"
        className="wrap__product"
        @update:addToFavourite="addToFavourite"
        @update:removeFromFavourite="removeFromFavourite"
      />
    </div>
    <div class="wrap__filter">
      <filter-products
        @update:applyFilter="applyFilter"
        @update:clearFilter="clearFilter"
      />
    </div>
	</div>
</template>

<script>
import Product from './components/Product.vue';
import FilterProducts from './components/FilterProducts.vue';
import { mapGetters } from 'vuex';

export default {
  name: 'App',
  components: {
    Product,
    FilterProducts,
  },
  computed: {
    ...mapGetters(['products'])
  },
  methods: {
    addToFavourite(productId) {
      this.$store.dispatch('addToFavourite', productId);
    },

    removeFromFavourite(productId) {
      this.$store.dispatch('removeFromFavourite', productId);
    },

    applyFilter(filter) {
      this.$store.dispatch('applyFilter', filter);
    },

    applyFilter(filter) {
      this.$store.dispatch('applyFilter', filter);
    },

    clearFilter() {
      this.$store.dispatch('loadAll');
    }
  },
}
</script>
<style lang="sass">
@font-face
  font-family: 'ProximaNovaLight'
  src: url('fonts/ProximaNova_Light.eot')
  src: local('☺'), url('fonts/ProximaNova_Light.woff') format('woff'), url('fonts/ProximaNova_Light.ttf') format('truetype'), url('fonts/ProximaNova_Light.svg') format('svg')
  font-weight: normal
  font-style: normal
@font-face
  font-family: 'ProximaNovaRegular';
  src: url('fonts/ProximaNova_Regular.eot');
  src: local('☺'), url('fonts/ProximaNova_Regular.woff') format('woff'), url('fonts/ProximaNova_Regular.ttf') format('truetype'), url('fonts/ProximaNova_Regular.svg') format('svg');
  font-weight: normal;
  font-style: normal;
@font-face
  font-family: 'ProximaNovaSemibold';
  src: url('fonts/ProximaNova_Semibold.eot');
  src: local('☺'), url('fonts/ProximaNova_Semibold.woff') format('woff'), url('fonts/ProximaNova_Semibold.ttf') format('truetype'), url('fonts/ProximaNova_Semibold.svg') format('svg');
  font-weight: normal;
  font-style: normal;

body
  padding: 0
  margin: 0
  font-family: 'ProximaNovaRegular', Sans-Serif;
.wrap
  width: 1280px
  margin: 0 auto
  background: #f7f7f7
  padding: 10px 10px 0
  display: flex
  margin-top: 100px
  box-sizing: border-box
  &__filter
    margin: 0 0 10px auto
  &__filter,
  &__product
    width: 307.5px
  &__product
    margin-right: 10px
    &:nth-child(3n)
      margin-right: 0
  &__products
    display: flex
    flex-wrap: wrap
    width: 950px
</style>
