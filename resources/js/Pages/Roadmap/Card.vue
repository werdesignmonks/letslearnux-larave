<script setup>
import Image from "@/Components/Image.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    src: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    url: {
        type: String,
        default: '#',
    },
});

</script>

<template>

    <div class="group border border-dm-border-color overflow-hidden rounded-[16px]">
        <Link href="{{ url }}" target="_blank">
            <Image :alt='title' :src="src" classes="w-full" />
            <h3 class="p-[16px] text-sm text-dm-color-text font-medium leading-5 group-hover:text-dm-color-primary">
                {{ title }}
            </h3>
        </Link>
    </div>

</template>

<style scoped>

</style>
