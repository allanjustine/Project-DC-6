<script setup>
import { Link } from "@inertiajs/vue3";
import { defineProps } from "vue";

const { hidden } = defineProps(["hidden"]);
</script>
<template>
    <div class="main-nav">
        <Link
            :href="route('dashboard')"
            :active="route().current('dashboard')"
            title="Dashboard"
        >
            <i class="fa fa-home"></i> <span :hidden="hidden">Dashboard</span>
        </Link>

        <Link
            v-if="$page.props.auth.user.permissions.includes('manage-users')"
            :href="route('users.admin')"
            :active="route().current('users.admin')"
            title="Users List"
        >
            <i class="fa-solid fa-users"></i>
            <span :hidden="hidden"> Users</span>
        </Link>
        <Link
            v-if="$page.props.auth.user.permissions.includes('manage-users')"
            :href="route('clients.admin')"
            :active="route().current('clients.admin')"
            title="Clients List"
        >
            <i class="fa-solid fa-user"></i>
            <span :hidden="hidden"> Clients List</span>
        </Link>

        <Link
            v-if="$page.props.auth.user.permissions.includes('manage-cashiers')"
            :href="route('cashiers')"
            :active="route().current('cashiers')"
            title="Cashiers List"
        >
            <i class="fa-solid fa-user-tag"></i>
            <span :hidden="hidden"> Cashiers List</span>
        </Link>
        <Link
            v-if="$page.props.auth.user.permissions.includes('manage-sales')"
            :href="route('products')"
            :active="route().current('products')"
            title="Products List"
        >
            <i class="fa-solid fa-box"></i>
            <span :hidden="hidden"> Products</span>
        </Link>
        <Link
            v-if="$page.props.auth.user.permissions.includes('manage-sales')"
            :href="route('sold.items')"
            :active="route().current('sold.items')"
            title="Sold Items"
        >
            <i class="fa-solid fa-tag"></i>
            <span :hidden="hidden"> Sold Items</span>
        </Link>
        <Link
            v-if="$page.props.auth.user.permissions.includes('manage-sales')"
            :href="route('sales')"
            :active="route().current('sales')"
            title="Sales List"
        >
            <i class="fa-solid fa-chart-line"></i>
            <span :hidden="hidden"> Sales</span>
        </Link>
        <Link :href="route('profile.edit')">
            <i class="fa-solid fa-user"></i>
            <span :hidden="hidden"> Profile</span>
        </Link>

        <Link :href="route('logout')" method="post" title="Logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span :hidden="hidden"> Logout</span>
        </Link>
    </div>
</template>
