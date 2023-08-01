// Cart.js
import axios from 'axios';
import { unref, computed, reactive } from 'vue';

let cart = [];

export async function addToCart(category) {
    try {
      // Check if the category is already in the cart
      if (cart.some(item => item.category_id === category.id)) {
        throw new Error('Category already in cart');
      }
  
      const response = await axios.post('/add-to-cart', { category_id: category.id, name: category.name });
      cart = response.data.cartItems;
      return cart;
    } catch (error) {
      throw new Error('Failed to add category to cart');
    }
  }
  

export function useCart() {
  const cartItems = computed(() => unref(cart));
  const cartTotal = computed(() => unref(cart).length);



  const clearCart = async () => {
    try {
      await axios.delete('/clear-cart');
      cart.length=0;
    } catch (error) {
      throw new Error('Failed to clear cart');
    }
  };

  return {
    addToCart,
    // removeFromCart,
    clearCart,
    cartItems,
    cartTotal,
  };
}
