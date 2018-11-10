export default {
  SET_PRODUCTS(state, products) {
    state.products = products;
  },

  ADD_TO_FAVOURITE(state, result) {
    state.products.forEach((product, i) => {
      if(result.id == product.id){
        product.inFavourite = result.inFavourite;
        product.inFavouriteMessage = result.inFavouriteMessage;
      }
    });
  },

  REMOVE_FROM_FAVOURITE(state, productId) {
    state.products.forEach((product, i) => {
      if(productId == product.id){
        product.inFavourite = false;
        product.inFavouriteMessage = '';
      }
    });
  },
};
