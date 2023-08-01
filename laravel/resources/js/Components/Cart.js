// Cart.js
import axios from 'axios';
import { unref, computed, reactive } from 'vue';

let cart = [];

export async function addToCart(category) {
    try {
      const response = await axios.post('/add-to-cart', { category_id: category.id });
      cart = response.data.cartItems;
      return {
        cartItems: cart,
        cartTotal: response.data.cartTotal,
      };
    } catch (error) {
      throw new Error('Failed to add category to cart');
    }
  }

export function useCart() {
  const cartItems = computed(() => unref(cart));
  const cartTotal = computed(() => unref(cart).length);

//   const removeFromCart = async (itemId) => {
//     try {
//       await axios.post('/remove-from-cart', { item_id: itemId });
//       cart = cart.filter(item => item.id !== itemId);
//     } catch (error) {
//       throw new Error('Failed to remove item from cart');
//     }
//   };

//   const clearCart = async () => {
//     try {
//       await axios.post('/clear-cart');
//       cart = [];
//     } catch (error) {
//       throw new Error('Failed to clear cart');
//     }
//   };

  return {
    addToCart,
    // removeFromCart,
    // clearCart,
    cartItems,
    cartTotal,
  };
}
