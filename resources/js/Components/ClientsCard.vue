<template>
    <div class="bg-pink-400 shadow-md p-2 rounded-lg mx-2">
        <div class="flex justify-center mb-2">
            <img
                src="data:image/png;base64,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"
                alt="logo"
                class="logo-image"
            />
        </div>

        <h3 class="text-sm font-semibold">
            {{ client.last_name }}, {{ client.first_name }}
        </h3>
        <p class="text-dark-700 text-xs">{{ client.address }}</p>
        <p class="text-dark-700 text-xs">Phone: {{ client.phone }}</p>
        <p class="text-red-700 text-xs">
            Credit Limit: <i class="fas fa-peso-sign"></i>{{ client.credit_limit }}
        </p>
        <a
            :href="'/clients/view/' + client.id"
            class="border-2 border-solid flex justify-center rounded-md border-gray-900 p-2"
            :class="{
                'bg-red-600': selectedColor == 'red',
                'bg-blue-600': selectedColor == 'blue',
                'bg-green-600': selectedColor == 'green',
            }"
        >
            View Detail
        </a>
    </div>
</template>

<script setup>
import { defineProps } from "vue";
import { inject } from "vue";

const selectedColor = inject("selectedColor");
// const selectedColor = ref('')

const props = defineProps({
    client: Object,
});
</script>
