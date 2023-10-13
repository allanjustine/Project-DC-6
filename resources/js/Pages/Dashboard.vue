<template>
    <div>
        <Head title="Dashboard" />

        <Layout>
            <template #header>
                <h2
                    class="font-semibold text-2xl text-gray-800 leading-tight"
                ></h2>
            </template>
            <h2 class="font-semibold text-2xl leading-tight">
                Welcome to Your Dashboard, {{ auth.user.name }}
            </h2>

            <div class="p-4">
                <h2 class="font-semibold text-2xl leading-tight">
                    Dashboard Overview
                </h2>
                <p class="text-gray-600 mt-2">
                    Here you can view important information about your
                    application.
                </p>

                <!-- Display the count -->
                <div
                    class="mt-4"
                    v-if="
                        $page.props.auth.user.permissions &&
                        $page.props.auth.user.permissions.includes(
                            'manage-users'
                        )
                    "
                >
                    <h3 class="text-xl font-semibold mb-2">Admin Overview</h3>
                    <h3 class="text-lg font-semibold">Clients Count</h3>
                    <p class="text-gray-600">{{ clientCount }}</p>
                    <h3 class="text-lg font-semibold">Users Count</h3>
                    <p class="text-gray-600">{{ userCount }}</p>
                    <h3 class="text-lg font-semibold">Categories Count</h3>
                    <p class="text-gray-600">{{ categoryCount }}</p>
                    <h3 class="text-lg font-semibold">Products Count</h3>
                    <p class="text-gray-600">{{ productCount }}</p>
                    <h3 class="text-lg font-semibold">Sold Items Count</h3>
                    <p class="text-gray-600">{{ soldItemCount }}</p>
                    <h3 class="text-lg font-semibold">Sales Count</h3>
                    <p class="text-gray-600">{{ saleCount }}</p>
                </div>

                <!-- Add more content as needed -->

                <!-- Example: Recent Activity -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold">Recent Activity</h3>
                    <ul>
                        <li class="text-gray-600">
                            User A updated their profile.
                        </li>
                        <li class="text-gray-600">
                            New support ticket created by User B.
                        </li>
                        <!-- Add more activity items here -->
                    </ul>
                </div>
            </div>
        </Layout>
    </div>
</template>

<script setup>
import Layout from "@/Layouts/Layout.vue";
import { Head } from "@inertiajs/vue3";

const prop = defineProps({
    clientCount: Number,
    userCount: Number,
    categoryCount: Number,
    productCount: Number,
    saleCount: Number,
    soldItemCount: Number,
    auth: Object,
});
</script>
