<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'block items-center py-3.5 text-base font-medium text-[#643EF3] leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'block items-center py-3.5 text-base font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out');
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
