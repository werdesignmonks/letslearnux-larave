<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    links: Array
});



</script>

<template>
    <div v-if="props.links.length > 3">
        <div class="flex flex-wrap mt-3 justify-end">
            <template v-for="(link, p) in links" :key="p">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
                <Link v-else
                      class="mr-1 mb-1 px-4 py-3 text-sm transition duration-300 leading-4 border rounded hover:bg-dm-color-primary hover:text-white focus:border-indigo-500 focus:text-indigo-500"
                      :class="{ 'bg-dm-color-primary text-white': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>

