<template>
  <div class="filter">
    <div class="filter__buttons">
      <btn
        title="Показать результат"
        userClass="filter__button"
        blue
        @update:button="applyFilter"
      />
      <btn
        title="Очистить фильтр"
        userClass="filter__button"
        @update:button="clearFilter"
      />
    </div>
    <div class="filter__name">Производитель</div>
    <div class="filter__items">
      <checkbox
        v-for="item in items"
        :key="item.code"
        :item="item"
        className="filter__checkbox"
        classLable="checkbox__label_filter"
        :checkboxActive="filter[item.code]"
        @update:checkbox="setFilter"
      />
    </div>
  </div>
</template>

<script>
import Checkbox from './Checkbox.vue';
import Btn from './Btn.vue';

export default {
  name: 'FilterProducts',
  components: {
    Checkbox,
    Btn,
  },
  data() {
    return {
      items: [
        {title: 'Canon', code: 'canon'},
        {title: 'Olympus', code: 'olympus'},
        {title: 'Fujifilm', code: 'fujifilm'},
        {title: 'Pentax', code: 'pentax'},
        {title: 'Nikon', code: 'nikon'},
        {title: 'Sigma', code: 'sigma'},
        {title: 'Panasonic', code: 'panasonic'},
        {title: 'Geleral Electrics', code: 'geleralElectrics'},
        {title: 'Leica', code: 'leica'},
        {title: 'Zenit', code: 'zenit'},
      ],
      filter: {},
    }
  },
  methods: {
    applyFilter() {
      let filterFill = false;

      for(let code in this.filter) {
        if(this.filter[code]) {
          filterFill = true;
          break;
        }
      }

      this.$emit('update:applyFilter', filterFill ? this.filter : '');
    },

    clearFilter() {
      this.filter = {};
      this.$emit('update:clearFilter');
    },

    setFilter(filterItem) {
      this.$set(this.filter, filterItem.code, filterItem.checked);
    }
  },
}
</script>

<style lang="sass">
.filter
  padding: 30px 28px
  box-sizing: border-box
  background: #fff
  line-height: 1
  &__button
    width: 100%
    &:first-child
      margin-bottom: 10px
  &__name
    margin-top: 26px
    font-size: 17px
    color: #4a4a4a
    margin-bottom: 20px
  &__items
    display: flex
    align-items: flex-start
    flex-wrap: wrap
  &__checkbox
    width: 48%
    margin-bottom: 10px
  .checkbox__label_filter
    max-width: 80px
</style>
