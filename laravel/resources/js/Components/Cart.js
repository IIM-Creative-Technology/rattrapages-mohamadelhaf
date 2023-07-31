import { ref, computed } from 'vue';

const cart = ref([]);

export function useCart() {
  const addToCart = (item) => {
    cart.value.push(item);
  };

  const removeFromCart = (itemId) => {
    cart.value = cart.value.filter(item => item.id !== itemId);
  };

  const clearCart = () => {
    cart.value = [];
  };

  const cartItems = computed(() => cart.value);
  const cartTotal = computed(() => cart.value.reduce((total, item) => total + item.price, 0));

  return {
    addToCart,
    removeFromCart,
    clearCart,
    cartItems,
    cartTotal,
  };
}
