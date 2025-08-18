<template>
  <MainLayout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <!-- Breadcrumb -->
      <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <Link :href="route('home')" class="text-gray-700 hover:text-gray-900">
              Home
            </Link>
          </li>
          <li>
            <div class="flex items-center">
              <span class="mx-2 text-gray-400">/</span>
              <Link :href="route('products.index')" class="text-gray-700 hover:text-gray-900">
                Products
              </Link>
            </div>
          </li>
          <li>
            <div class="flex items-center">
              <span class="mx-2 text-gray-400">/</span>
              <span class="text-gray-500">{{ product.name }}</span>
            </div>
          </li>
        </ol>
      </nav>

      <!-- Product Details -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Product Image -->
        <div>
          <img
            :src="product.image || '/images/placeholder.jpg'"
            :alt="product.name"
            class="w-full h-96 object-cover rounded-lg"
          />
        </div>

        <!-- Product Info -->
        <div>
          <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ product.name }}</h1>
          <p class="text-gray-600 mb-4">{{ product.category?.name }}</p>
          
          <div class="text-3xl font-bold text-gray-900 mb-6">
            ${{ product.price }}
          </div>

          <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
            <p class="text-gray-700">{{ product.description }}</p>
          </div>

          <div class="mb-6">
            <div class="flex items-center justify-between">
              <span class="text-gray-700">Stock:</span>
              <span :class="product.stock > 0 ? 'text-green-600' : 'text-red-600'">
                {{ product.stock > 0 ? `${product.stock} available` : 'Out of Stock' }}
              </span>
            </div>
          </div>

          <!-- Add to Cart -->
          <div class="space-y-4">
            <div class="flex items-center space-x-4">
              <label for="quantity" class="text-gray-700">Quantity:</label>
              <input
                id="quantity"
                v-model="quantity"
                type="number"
                min="1"
                :max="product.stock"
                class="w-20 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                :disabled="product.stock === 0"
              />
            </div>
            
            <button
              @click="addToCart"
              :disabled="product.stock === 0 || quantity < 1"
              class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed transition-colors"
            >
              {{ product.stock > 0 ? 'Add to Cart' : 'Out of Stock' }}
            </button>
          </div>
        </div>
      </div>

      <!-- Related Products -->
      <div v-if="relatedProducts.length > 0" class="mt-16">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <ProductCard
            v-for="relatedProduct in relatedProducts"
            :key="relatedProduct.id"
            :product="relatedProduct"
          />
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import { ref } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import ProductCard from '@/Components/ProductCard.vue'

const props = defineProps({
  product: Object,
  relatedProducts: Array,
})

const quantity = ref(1)

const addToCart = () => {
  router.post(route('cart.add'), {
    product_id: props.product.id,
    quantity: quantity.value,
  })
}
</script>
