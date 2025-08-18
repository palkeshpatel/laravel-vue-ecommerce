<template>
  <MainLayout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <h1 class="text-3xl font-bold text-gray-900 mb-8">Checkout</h1>

      <form @submit.prevent="submitOrder" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Customer Information -->
        <div>
          <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Customer Information</h2>
            
            <div class="space-y-4">
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                  Full Name *
                </label>
                <input
                  id="name"
                  v-model="form.name"
                  type="text"
                  required
                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
                <div v-if="errors.name" class="text-red-600 text-sm mt-1">{{ errors.name }}</div>
              </div>

              <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                  Email Address *
                </label>
                <input
                  id="email"
                  v-model="form.email"
                  type="email"
                  required
                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
                <div v-if="errors.email" class="text-red-600 text-sm mt-1">{{ errors.email }}</div>
              </div>

              <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                  Phone Number
                </label>
                <input
                  id="phone"
                  v-model="form.phone"
                  type="tel"
                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
                <div v-if="errors.phone" class="text-red-600 text-sm mt-1">{{ errors.phone }}</div>
              </div>

              <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                  Shipping Address *
                </label>
                <textarea
                  id="address"
                  v-model="form.address"
                  rows="3"
                  required
                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                ></textarea>
                <div v-if="errors.address" class="text-red-600 text-sm mt-1">{{ errors.address }}</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Order Summary -->
        <div>
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

            <button
              type="submit"
              :disabled="processing"
              class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed transition-colors"
            >
              {{ processing ? 'Processing...' : 'Place Order' }}
            </button>
          </div>
        </div>
      </form>
    </div>
  </MainLayout>
</template>

<script setup>
import { ref, computed } from 'vue'
import { router, useForm } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'

// Mock cart data - in a real app, this would come from props or store
const cartItems = ref([
  {
    product_id: 1,
    quantity: 2,
    product: {
      price: 29.99,
    },
  },
])

const form = useForm({
  name: '',
  email: '',
  phone: '',
  address: '',
  cart_items: cartItems.value,
})

const subtotal = computed(() => {
  return cartItems.value.reduce((sum, item) => {
    return sum + (item.product.price * item.quantity)
  }, 0)
})

const tax = computed(() => subtotal.value * 0.08) // 8% tax
const total = computed(() => subtotal.value + tax.value)

const submitOrder = () => {
  form.post(route('checkout.store'))
}
</script>
