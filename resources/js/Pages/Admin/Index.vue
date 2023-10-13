<script setup>
import Layout from "@/Layouts/Layout.vue";
import Pagination from "@/Layouts/Pagination.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    users: Object,
});
</script>

<template>
    <Head title="Users" />
    <Layout title="Users">
        <div class="flex justify-between bg-pink-400">
            <h2 class="font-bold text-4xl text-white ml-8 mt-4 mb-4">
                Users List
            </h2>
        </div>

        <div class="overflow-x-auto">
            <a href="/admin/users/create" class="float-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3 mr-3">Add user</a>
            <table class="table-auto min-w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Roles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users.data" :key="user.id">
                        <td class="border px-4 py-2">{{ user.name }}</td>
                        <td class="border px-4 py-2">{{ user.email }}</td>
                        <td class="border px-4 py-2">
                            <span
                                v-for="role in user.roles"
                                :key="role.id"
                                :class="{
                                    'text-blue-100 bg-blue-600':
                                        role.name === 'Admin',
                                    'text-green-100 bg-green-600':
                                        role.name === 'Super Visor',
                                    'text-yellow-100 bg-yellow-600':
                                        role.name === 'Cashier',
                                }"
                                class="ml-1 inline-block px-2 py-1 text-xs font-semibold leading-none rounded-full"
                            >
                                {{ role.name }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex justify-center items-center mt-4">
            <Pagination
                :links="users.links"
                :currentPage="users.current_page"
                :totalPages="users.total"
                pageRange="4"
            />
        </div>
    </Layout>
</template>
