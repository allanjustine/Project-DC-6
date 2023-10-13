<script setup>
import Layout from "@/Layouts/Layout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    client: Object,
    sales: Array,
});
</script>

<template>
    <Head title="Clients View" />
    <Layout title="Clients View">
        <div class="flex justify-between bg-pink-400">
            <h2 class="font-bold text-4xl text-white ml-8 mt-4 mb-4">
                {{ client.first_name }}, {{ client.last_name }}'s detail
            </h2>
        </div>

        <div class="overflow-x-auto">
            <h2 class="font-bold text-xl text-black ml-8 mt-4 mb-4 text-muted">
                Sales Transactions
                <span
                    class="ml-1 inline-block px-2 py-1 text-xs font-semibold leading-none rounded-full bg-blue-200"
                    >{{ sales.length }}</span
                >
            </h2>
            <table class="table-auto min-w-full mt-3">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Cash/Credit</th>
                        <th class="px-4 py-2">Cash/Credit Left</th>
                        <th class="px-4 py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="sale in sales" :key="sale.id">
                        <td class="border px-4 py-2">{{ sale.date }}</td>
                        <td class="border px-4 py-2">
                            <i class="fas fa-peso-sign"></i>
                            {{ sale.client.credit_limit }}
                        </td>
                        <td class="border px-4 py-2">
                            <i class="fas fa-peso-sign"></i>
                            {{
                                sale.client.credit_limit -
                                sale.sold_items.reduce(
                                    (total, sold) => total + sold.amount,
                                    0
                                )
                            }}
                        </td>
                        <td class="border px-4 py-2">
                            <i class="fas fa-peso-sign"></i>
                            {{
                                sale.sold_items.reduce(
                                    (total, sold) => total + sold.amount,
                                    0
                                )
                            }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </Layout>
</template>
