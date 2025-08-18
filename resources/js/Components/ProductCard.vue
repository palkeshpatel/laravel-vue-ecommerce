<template>
  <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <div class="aspect-w-1 aspect-h-1 w-full">
      <img
        :src="product.image || '/images/placeholder.jpg'"
        :alt="product.name"
        class="w-full h-48 object-cover"
      />
    </div>
    <div class="p-4">
      <h3 class="text-lg font-semibold text-gray-900 mb-2">
        {{ product.name }}
      </h3>
      <p class="text-sm text-gray-600 mb-2">
        {{ product.category?.name }}
      </p>
      <p class="text-gray-700 text-sm mb-3 line-clamp-2">
        {{ product.description }}
      </p>
      <div class="flex items-center justify-between">
        <span class="text-xl font-bold text-gray-900">
          ${{ product.price }}
        </span>
        <div class="flex space-x-2">
          <Link
            :href="route('products.show', product.slug)"
            class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700 transition-colors"
          >
            View
          </Link>
          <button
            @click="addToCart"
            class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700 transition-colors"
            :disabled="product.stock === 0"
          >
            {{ product.stock > 0 ? 'Add to Cart' : 'Out of Stock' }}
          </button>
        </div>
      </div>
      <div class="mt-2 text-sm text-gray-500">
        Stock: {{ product.stock }} available
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  product: {
    type: Object,
    required: true,
  },
})

const addToCart = () => {
  router.post(route('cart.add'), {
    product_id: props.product.id,
    quantity: 1,
  })
}
</script>
