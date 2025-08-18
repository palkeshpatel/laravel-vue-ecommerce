<template>
    <MainLayout>
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <h1 class="text-4xl font-bold sm:text-5xl md:text-6xl">
                        Welcome to Our Store
                    </h1>
                    <p class="mt-6 text-xl max-w-3xl mx-auto">
                        Discover amazing products at great prices. Shop the
                        latest trends and find exactly what you're looking for.
                    </p>
                    <div class="mt-10">
                        <Link
                            :href="route('products.index')"
                            class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors"
                        >
                            Shop Now
                        </Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Products -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Featured Products
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Check out our most popular products that customers love
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <ProductCard
                    v-for="product in featuredProducts"
                    :key="product.id"
                    :product="product"
                />
            </div>

            <div class="text-center mt-12">
                <Link
                    :href="route('products.index')"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                >
                    View All Products
                </Link>
            </div>
        </div>

        <!-- Categories -->
        <div class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Shop by Category
                    </h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Browse products by category to find exactly what you
                        need
                    </p>
                </div>

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
                >
                    <div
                        v-for="category in categories"
                        :key="category.id"
                        class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow"
                    >
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">
                            {{ category.name }}
                        </h3>
                        <p class="text-gray-600 mb-4">
                            {{ category.products_count }} products available
                        </p>
                        <Link
                            :href="
                                route('products.index', {
                                    category: category.slug,
                                })
                            "
                            class="text-blue-600 hover:text-blue-700 font-medium"
                        >
                            Browse Category →
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";
import ProductCard from "@/Components/ProductCard.vue";

defineProps({
    featuredProducts: Array,
    categories: Array,
});
</script>
