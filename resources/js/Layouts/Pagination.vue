<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  links: Array,
});
</script>

<template>
  <div>
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, p) in links" :key="p">
        <div
          v-if="link.url === null"
          class="mr-1 mb-1 px-4 py-3 text-sm leading-5 text-gray-500 border rounded-full hover:bg-gray-200 cursor-pointer"
          v-html="link.label"
        ></div>
        <Link
          v-else
          class="mr-1 mb-1 px-4 py-3 text-sm leading-5 border rounded-full hover:bg-gray-700 hover:text-white focus:outline-none focus:bg-gray-700 focus:text-white transition-colors duration-300"
          :class="{ 'bg-gray-700 text-white': link.active }"
          :href="link.url"
          v-html="link.label"
        ></Link>
      </template>
    </div>
  </div>
</template>
