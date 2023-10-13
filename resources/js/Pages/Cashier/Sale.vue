<script setup>
import Layout from "@/Layouts/Layout.vue";
import Pagination from "@/Layouts/Pagination.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    sales: Object,
});
</script>

<template>
    <Head title="Sales" />
    <Layout title="Sales">
        <div class="flex justify-between bg-pink-400">
            <h2 class="font-bold text-4xl text-white ml-8 mt-4 mb-4">
                Sales List
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Client</th>
                        <th class="px-4 py-2">Credits</th>
                        <th class="px-4 py-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="sale in sales.data" :key="sale.id">
                        <td class="border px-4 py-2">{{ sale.client.last_name }}, {{ sale.client.first_name }}</td>
                        <td class="border px-4 py-2">{{ sale.is_credit }}</td>
                        <td class="border px-4 py-2">{{ sale.date }}</td>

                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-center items-center mt-4">
            <Pagination
                :links="sales.links"
                :currentPage="sales.current_page"
                :totalPages="sales.total"
                pageRange="4"
            />
        </div>
    </Layout>
</template>

<script>
export default {
    props: {
        sales: Object,
    },
};
</script>
