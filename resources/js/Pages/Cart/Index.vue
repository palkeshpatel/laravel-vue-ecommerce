<template>
  <MainLayout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <h1 class="text-3xl font-bold text-gray-900 mb-8">Shopping Cart</h1>

      <div v-if="cartItems.length === 0" class="text-center py-12">
        <h3 class="text-lg font-medium text-gray-900 mb-2">Your cart is empty</h3>
        <p class="text-gray-600 mb-6">Add some products to your cart to get started.</p>
        <Link
          :href="route('products.index')"
          class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
        >
          Continue Shopping
        </Link>
      </div>

      <div v-else class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Cart Items -->
        <div class="lg:col-span-2">
          <div class="bg-white rounded-lg shadow-md">
            <div class="p-6">
              <h2 class="text-lg font-semibold text-gray-900 mb-4">Cart Items</h2>
              
              <div class="space-y-4">
                <div
                  v-for="item in cartItems"
                  :key="item.id"
                  class="flex items-center space-x-4 p-4 border border-gray-200 rounded-lg"
                >
                  <img
                    :src="item.product.image || '/images/placeholder.jpg'"
                    :alt="item.product.name"
                    class="w-16 h-16 object-cover rounded"
                  />
                  
                  <div class="flex-1">
                    <h3 class="font-medium text-gray-900">{{ item.product.name }}</h3>
                    <p class="text-sm text-gray-600">{{ item.product.category?.name }}</p>
                    <p class="text-sm text-gray-500">${{ item.product.price }} each</p>
                  </div>
                  
                  <div class="flex items-center space-x-2">
                    <button
                      @click="updateQuantity(item.id, item.quantity - 1)"
                      :disabled="item.quantity <= 1"
                      class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 disabled:opacity-50"
                    >
                      -
                    </button>
                    <span class="w-12 text-center">{{ item.quantity }}</span>
                    <button
                      @click="updateQuantity(item.id, item.quantity + 1)"
                      :disabled="item.quantity >= item.product.stock"
                      class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50 disabled:opacity-50"
                    >
                      +
                    </button>
                  </div>
                  
                  <div class="text-right">
                    <p class="font-medium text-gray-900">${{ (item.product.price * item.quantity).toFixed(2) }}</p>
                    <button
                      @click="removeItem(item.id)"
                      class="text-red-600 hover:text-red-700 text-sm"
                    >
                      Remove
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
          <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h2>
            
            <div class="space-y-3 mb-6">
              <div class="flex justify-between">
                <span class="text-gray-600">Subtotal:</span>
                <span class="font-medium">${{ subtotal.toFixed(2) }}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Tax:</span>
                <span class="font-medium">${{ tax.toFixed(2) }}</span>
              </div>
              <div class="border-t pt-3">
                <div class="flex justify-between">
                  <span class="text-lg font-semibold text-gray-900">Total:</span>
                  <span class="text-lg font-semibold text-gray-900">${{ total.toFixed(2) }}</span>
                </div>
              </div>
            </div>
            
            <Link
              :href="route('checkout.index')"
              class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors text-center block"
            >
              Proceed to Checkout
            </Link>
            
            <Link
              :href="route('products.index')"
              class="w-full bg-gray-200 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-300 transition-colors text-center block mt-3"
            >
              Continue Shopping
            </Link>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import { computed } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'

// Mock cart data - in a real app, this would come from props or store
const cartItems = ref([
  {
    id: 1,
    quantity: 2,
    product: {
      id: 1,
      name: 'Sample Product',
      price: 29.99,
      image: null,
      category: { name: 'Electronics' },
      stock: 10,
    },
  },
])

const subtotal = computed(() => {
  return cartItems.value.reduce((sum, item) => {
    return sum + (item.product.price * item.quantity)
  }, 0)
})

const tax = computed(() => subtotal.value * 0.08) // 8% tax
const total = computed(() => subtotal.value + tax.value)

const updateQuantity = (itemId, newQuantity) => {
  router.patch(route('cart.update'), {
    product_id: itemId,
    quantity: newQuantity,
  })
}

const removeItem = (itemId) => {
  router.delete(route('cart.remove'), {
    product_id: itemId,
  })
}
</script>
