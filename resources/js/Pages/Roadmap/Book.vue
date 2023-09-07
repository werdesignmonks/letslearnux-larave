<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    src: {
        type: String,
        required: true,
    },
    url: {
        type: String,
        default: '#',
    },
    title: {
        type: String,
        required: true,
    },
});

</script>

<template>
    <div class="rounded-[20px] relative overflow-hidden">
        <Link href="{{ url }}" target="_blank">
            <img :alt="title" :src="src" />
        </Link>
    </div>
</template>

<style scoped>

</style>
