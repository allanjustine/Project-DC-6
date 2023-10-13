<script setup>
import Layout from "@/Layouts/Layout.vue";
import Pagination from "@/Layouts/Pagination.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    soldItems: Object,
});
</script>

<template>
    <Head title="SoldItems" />
    <Layout title="SoldItems">
        <div class="flex justify-between bg-pink-400">
            <h2 class="font-bold text-4xl text-white ml-8 mt-4 mb-4">
                Sold Items List
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Product Name</th>
                        <th class="px-4 py-2">Product Retail Price</th>
                        <th class="px-4 py-2">Amount</th>
                        <th class="px-4 py-2">Quantity</th>
                        <th class="px-4 py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="soldItem in soldItems.data" :key="soldItem.id">
                        <td class="border px-4 py-2">{{ soldItem.product.name }}</td>
                        <td class="border px-4 py-2"><i class="fas fa-peso-sign"></i> {{ soldItem.product.retail_price }}</td>
                        <td class="border px-4 py-2"><i class="fas fa-peso-sign"></i> {{ soldItem.amount }}</td>
                        <td class="border px-4 py-2">{{ soldItem.qty }}</td>
                        <td class="border px-4 py-2">{{ soldItem.sale.date }}</td>

                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-center items-center mt-4">
            <Pagination
                :links="soldItems.links"
                :currentPage="soldItems.current_page"
                :totalPages="soldItems.total"
                pageRange="4"
            />
        </div>
    </Layout>
</template>
