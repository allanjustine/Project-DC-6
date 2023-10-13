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
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4"
                    >
                        <div
                            class="bg-white rounded-lg shadow-lg p-4 flex items-center justify-between"
                        >
                            <div>
                                <h2 class="text-lg font-semibold">
                                    Admins
                                </h2>
                                <p class="text-gray-500">Total: {{ adminCount }}</p>
                            </div>
                            <div class="ml-4">
                                <i
                                    class="text-3xl text-gray-900 fas fa-user-secret"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg shadow-lg p-4 flex items-center justify-between"
                        >
                            <div>
                                <h2 class="text-lg font-semibold">
                                    Super Visor
                                </h2>
                                <p class="text-gray-500">Total: {{ superVisorCount }}</p>
                            </div>
                            <div class="ml-4">
                                <i
                                    class="text-3xl text-cyan-700 fas fa-user-nurse"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg shadow-lg p-4 flex items-center justify-between"
                        >
                            <div>
                                <h2 class="text-lg font-semibold">
                                    Cashiers
                                </h2>
                                <p class="text-gray-500">Total: {{ cashierCount }}</p>
                            </div>
                            <div class="ml-4">
                                <i
                                    class="text-3xl text-sky-900 fas fa-user-tag"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg shadow-lg p-4 flex items-center justify-between"
                        >
                            <div>
                                <h2 class="text-lg font-semibold">
                                    Clients
                                </h2>
                                <p class="text-gray-500">Total: {{ clientCount }}</p>
                            </div>
                            <div class="ml-4">
                                <i
                                    class="text-3xl text-blue-500 fas fa-user"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg shadow-lg p-4 flex items-center justify-between"
                        >
                            <div>
                                <h2 class="text-lg font-semibold">
                                    Users
                                </h2>
                                <p class="text-gray-500">Total: {{ userCount }}</p>
                            </div>
                            <div class="ml-4">
                                <i
                                    class="text-3xl text-green-500 fas fa-users"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg shadow-lg p-4 flex items-center justify-between"
                        >
                            <div>
                                <h2 class="text-lg font-semibold">
                                    Categories
                                </h2>
                                <p class="text-gray-500">Total: {{ categoryCount }}</p>
                            </div>
                            <div class="ml-4">
                                <i
                                    class="text-3xl text-violet-500 fas fa-list-ul"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg shadow-lg p-4 flex items-center justify-between"
                        >
                            <div>
                                <h2 class="text-lg font-semibold">
                                    Products
                                </h2>
                                <p class="text-gray-500">Total: {{ productCount }}</p>
                            </div>
                            <div class="ml-4">
                                <i
                                    class="text-3xl text-red-500 fas fa-box"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg shadow-lg p-4 flex items-center justify-between"
                        >
                            <div>
                                <h2 class="text-lg font-semibold">
                                    Sold Items
                                </h2>
                                <p class="text-gray-500">Total: {{ soldItemCount }}</p>
                            </div>
                            <div class="ml-4">
                                <i
                                    class="text-3xl text-red-900 fas fa-tag"
                                ></i>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg shadow-lg p-4 flex items-center justify-between"
                        >
                            <div>
                                <h2 class="text-lg font-semibold">
                                    Sales
                                </h2>
                                <p class="text-gray-500">Total: {{ saleCount }}</p>
                            </div>
                            <div class="ml-4">
                                <i
                                    class="text-3xl text-yellow-300 fas fa-chart-line"
                                ></i>
                            </div>
                        </div>
                    </div>
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
    cashierCount: Number,
    adminCount: Number,
    superVisorCount: Number,
    auth: Object,
});
</script>
