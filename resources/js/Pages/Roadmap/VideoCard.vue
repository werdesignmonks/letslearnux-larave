<script setup>
import Image from "@/Components/Image.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    src: {
        type: String,
        required: true,
    },
    image: {
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
        <Link :href="url" target="_blank" class="block">
            <div class="relative ">
                <img :src="'../images/youtube-icon.svg'" :alt="title" class="max-w-[48px] absolute top-[50%] left-[50%] z-10 -translate-y-2/4 -translate-x-2/4" />
                <img :src="image" :alt="title" class="" />
            </div>
            <h3 class="p-[16px] text-sm text-dm-color-text font-medium leading-5 group-hover:text-dm-color-primary">
                {{ title }}
            </h3>
        </Link>
    </div>

</template>

<style scoped>

</style>
