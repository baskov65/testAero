import axios from 'axios';

const api = (url, done, params = {}) => {
  axios.get(`http://localhost/api/index.php${url}`, params)
    .then((response) => {
      done(response);
    });
}

export default {
  loadAll(store) {
    api(
      '?products', 
      response => {
        if(response.data.success){
          store.commit('SET_PRODUCTS', response.data.products);
        }else{
          console.error('errorLoadAll', 'Ошибка загрузки данных');
        }
      }
    )
  },

  addToFavourite(store, productId) {
    api(
      '',
      response => {
        if(response.data.success){
          store.commit('ADD_TO_FAVOURITE', response.data.result);
        }else{
          console.error('errorAddToFavourite', 'Ошибка добавление в избранное');
        }
      },
      {
        params: {
          productId
        }
      },
    )
  },

  removeFromFavourite(store, productId) {
    api(
      '?removeFromFavourite',
      response => {
        if(response.data.success){
          store.commit('REMOVE_FROM_FAVOURITE', productId);
        }else{
          console.error('errorRemoveFromFavourite', 'Ошибка удаления из избранного');
        }
      },
      {
        params: {
          productId
        }
      }
    )
  },

  applyFilter(store, filter) {
    api(
      '?getFilteredItems',
      response => {
        if(response.data.success){
          store.commit('SET_PRODUCTS', response.data.products);
        }else{
          console.error('errorSetFilteredProducts', 'Ошибка фильтрации');
        }
      },
      {
        params: {
          filter
        }
      }
    )
  },

  clearFilter(store) {
    store.dispatch('loadAll');
  }
};
