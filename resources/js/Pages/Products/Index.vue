<template>
  <MainLayout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <!-- Header -->
      <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">All Products</h1>
        
        <!-- Search and Filters -->
        <div class="flex flex-col sm:flex-row gap-4 mb-6">
          <div class="flex-1">
            <input
              v-model="search"
              type="text"
              placeholder="Search products..."
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
              @input="debouncedSearch"
            />
          </div>
          <select
            v-model="selectedCategory"
            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            @change="filterProducts"
          >
            <option value="">All Categories</option>
            <option
              v-for="category in categories"
              :key="category.id"
              :value="category.slug"
            >
              {{ category.name }}
            </option>
          </select>
        </div>
      </div>

      <!-- Products Grid -->
      <div v-if="products.data.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <ProductCard
          v-for="product in products.data"
          :key="product.id"
          :product="product"
        />
      </div>

      <!-- No Products -->
      <div v-else class="text-center py-12">
        <h3 class="text-lg font-medium text-gray-900 mb-2">No products found</h3>
        <p class="text-gray-600">Try adjusting your search or filter criteria.</p>
      </div>

      <!-- Pagination -->
      <div v-if="products.data.length > 0" class="mt-12">
        <div class="flex justify-center">
          <nav class="flex space-x-2">
            <Link
              v-for="link in products.links"
              :key="link.label"
              :href="link.url"
              :class="[
                'px-3 py-2 rounded-md text-sm font-medium',
                link.active
                  ? 'bg-blue-600 text-white'
                  : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'
              ]"
              v-html="link.label"
            />
          </nav>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import { ref, watch } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import ProductCard from '@/Components/ProductCard.vue'

const props = defineProps({
  products: Object,
  categories: Array,
  filters: Object,
})

const search = ref(props.filters.search || '')
const selectedCategory = ref(props.filters.category || '')

const debouncedSearch = () => {
  clearTimeout(searchTimeout)
  searchTimeout = setTimeout(() => {
    filterProducts()
  }, 300)
}

let searchTimeout

const filterProducts = () => {
  router.get(route('products.index'), {
    search: search.value,
    category: selectedCategory.value,
  }, {
    preserveState: true,
    replace: true,
  })
}

watch([search, selectedCategory], () => {
  filterProducts()
})
</script>
