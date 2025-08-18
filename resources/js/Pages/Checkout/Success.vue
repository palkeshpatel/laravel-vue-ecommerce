<template>
  <MainLayout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="text-center">
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
          <CheckCircleIcon class="h-6 w-6 text-green-600" />
        </div>
        
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Order Confirmed!</h1>
        <p class="text-lg text-gray-600 mb-8">
          Thank you for your order. Your order number is <span class="font-semibold">#{{ order.id }}</span>
        </p>
      </div>

      <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Details</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <h3 class="font-medium text-gray-900 mb-2">Customer Information</h3>
            <div class="text-sm text-gray-600 space-y-1">
              <p><strong>Name:</strong> {{ order.customer.name }}</p>
              <p><strong>Email:</strong> {{ order.customer.email }}</p>
              <p v-if="order.customer.phone"><strong>Phone:</strong> {{ order.customer.phone }}</p>
              <p><strong>Address:</strong> {{ order.customer.address }}</p>
            </div>
          </div>
          
          <div>
            <h3 class="font-medium text-gray-900 mb-2">Order Information</h3>
            <div class="text-sm text-gray-600 space-y-1">
              <p><strong>Order ID:</strong> #{{ order.id }}</p>
              <p><strong>Date:</strong> {{ formatDate(order.created_at) }}</p>
              <p><strong>Status:</strong> 
                <span :class="getStatusClass(order.status)">
                  {{ order.status }}
                </span>
              </p>
              <p><strong>Total:</strong> ${{ order.total_amount }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Items</h2>
        
        <div class="space-y-4">
          <div
            v-for="item in order.order_items"
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
            </div>
            
            <div class="text-right">
              <p class="text-sm text-gray-600">Qty: {{ item.quantity }}</p>
              <p class="font-medium text-gray-900">${{ item.price }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center space-y-4">
        <Link
          :href="route('home')"
          class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
        >
          Continue Shopping
        </Link>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { CheckCircleIcon } from '@heroicons/vue/24/outline'
import MainLayout from '@/Layouts/MainLayout.vue'

const props = defineProps({
  order: Object,
})

const formatDate = (dateString) => {
  return new Date(dateString).toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  })
}

const getStatusClass = (status) => {
  const classes = {
    pending: 'text-yellow-600 bg-yellow-100 px-2 py-1 rounded text-xs',
    paid: 'text-blue-600 bg-blue-100 px-2 py-1 rounded text-xs',
    shipped: 'text-purple-600 bg-purple-100 px-2 py-1 rounded text-xs',
    completed: 'text-green-600 bg-green-100 px-2 py-1 rounded text-xs',
    cancelled: 'text-red-600 bg-red-100 px-2 py-1 rounded text-xs',
  }
  return classes[status] || classes.pending
}
</script>
