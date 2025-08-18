<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex">
            <div class="flex-shrink-0 flex items-center">
              <Link :href="route('home')" class="text-xl font-bold text-gray-900">
                E-Commerce Store
              </Link>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
              <Link
                :href="route('home')"
                class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
              >
                Home
              </Link>
              <Link
                :href="route('products.index')"
                class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
              >
                Products
              </Link>
            </div>
          </div>
          <div class="hidden sm:ml-6 sm:flex sm:items-center">
            <Link
              :href="route('cart.index')"
              class="p-2 text-gray-400 hover:text-gray-500"
            >
              <ShoppingCartIcon class="h-6 w-6" />
            </Link>
            <div class="ml-3 relative">
              <div v-if="$page.props.auth.user">
                <Link
                  :href="route('dashboard')"
                  class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium"
                >
                  Dashboard
                </Link>
              </div>
              <div v-else>
                <Link
                  :href="route('login')"
                  class="text-gray-500 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium"
                >
                  Login
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <main>
      <slot />
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16">
      <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center text-gray-500">
          <p>&copy; 2024 E-Commerce Store. All rights reserved.</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ShoppingCartIcon } from '@heroicons/vue/24/outline'

defineProps({
  title: String,
})
</script>
