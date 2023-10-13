<script setup>
import Layout from "@/Layouts/Layout.vue";
import Pagination from "@/Layouts/Pagination.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    cashiers: Object,
});
</script>

<template>
    <Head title="Cashiers" />
    <Layout title="Cashiers">
        <div class="flex justify-between bg-pink-400">
            <h2 class="font-bold text-4xl text-white ml-8 mt-4 mb-4">
                Cashiers List
            </h2>
        </div>

        <div class="overflow-x-auto">
            <a
                href="/cashiers/create"
                class="float-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3 mr-3"
                >Add cashier</a
            >

            <table class="table-auto min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="cashier in cashiers.data" :key="cashier.id">
                        <td class="border px-4 py-2">{{ cashier.name }}</td>
                        <td class="border px-4 py-2">{{ cashier.email }}</td>
                        <td class="border px-4 py-2">
                            <span
                                v-for="role in cashier.roles"
                                :key="role.id"
                                class="list-disc ml-4"
                            >
                                <span
                                    class="ml-1 inline-block px-2 text-yellow-100 bg-yellow-600 py-1 text-xs font-semibold leading-none rounded-full"
                                    >{{ role.name }}</span
                                >
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-center items-center mt-4">
            <Pagination
                :links="cashiers.links"
                :currentPage="cashiers.current_page"
                :totalPages="cashiers.total"
                pageRange="4"
            />
        </div>
    </Layout>
</template>

<script>
export default {
    props: {
        cashiers: Object,
    },
};
</script>
