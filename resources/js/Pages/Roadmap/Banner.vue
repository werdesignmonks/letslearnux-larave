<script setup>

import { Link } from '@inertiajs/vue3';

import Image from "@/Components/Image.vue";
import SocialShare from "@/Components/SocialShare.vue";
// Image Path
const banner = "/images/roadmap-banner.png";

defineProps({
    count: Number,
});

</script>

<template>
<div class="border flex flex-col md:flex-row gap-11  items-center border-dm-border-color rounded-[48px] p-[40px] bg-dm-bg-color">
    <div>
        <Image alt="banner" src="images/banner-element.svg" classes="min-w-[280px]" />
    </div>
    <div class="">
        <h1 class="text-4xl mb-3 text-[32px] font-bold leading-[38px]">Roadmap to be a Product Designer</h1>
        <div class="description">
            This is a step-by-step guideline with resource links for self-motivated learners who want to become junior UI designers, then junior UX designers, or product designers.
        </div>

        <p class="mt-4 text-[14px]">
            <span class="text-dm-heading-color font-bold">Note:</span> This is not a course, but a suggested roadmap by <Link class="text-dm-color-primary" href="https:designmonks.com">Design Monks</Link> and the contributors of UX Bangladesh.
        </p>

        <div class="mt-4">
            <Link href="#" class="text-base mr-3 text-dm-color-text hover:text-dm-color-primary">Product Designer</Link>
            <span class="inline-block text-dm-color-text mx-3 relative before:block before:absolute before:h-[4px] before:w-[4px] before:rounded-3xl before:bg-dm-color-secondary before:top-[10px] before:left-[-12px]">12-18 months</span>
            <span class="inline-block text-dm-color-text mx-3 relative before:block before:absolute before:h-[4px] before:w-[4px] before:rounded-3xl before:bg-dm-color-secondary before:top-[10px] before:left-[-12px]">6 milestones</span>
            <span class="inline-block text-dm-color-text mx-3 relative before:block before:absolute before:h-[4px] before:w-[4px] before:rounded-3xl before:bg-dm-color-secondary before:top-[10px] before:left-[-12px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class="inline-block align-middle mr-1">
                    <path d="M9.64132 2.39328C9.78806 2.09601 10.212 2.09601 10.3587 2.39328L12.482 6.69493C12.5402 6.81287 12.6527 6.89465 12.7829 6.91367L17.5318 7.60781C17.8598 7.65574 17.9905 8.05888 17.7531 8.29014L14.3174 11.6365C14.223 11.7284 14.18 11.8608 14.2022 11.9907L15.013 16.7177C15.069 17.0445 14.726 17.2936 14.4326 17.1393L10.1862 14.9062C10.0696 14.8449 9.93038 14.8449 9.81382 14.9062L5.56746 17.1393C5.27401 17.2936 4.93099 17.0445 4.98703 16.7177L5.79777 11.9907C5.82004 11.8608 5.77697 11.7284 5.68262 11.6365L2.24694 8.29014C2.00951 8.05888 2.14022 7.65574 2.46819 7.60781L7.21715 6.91367C7.34729 6.89465 7.45977 6.81287 7.51798 6.69493L9.64132 2.39328Z" fill="#F5C418"/>
                </svg>
                4.7 (5.5k)
            </span>
            <span class="inline-block text-dm-color-text mx-3 relative before:block before:absolute before:h-[4px] before:w-[4px] before:rounded-3xl before:bg-dm-color-secondary before:top-[6px] before:left-[-12px]">{{ count }} learners</span>
        </div>

        <div class="flex items-center justify-between mt-5">
            <SocialShare />
        </div>
    </div>
</div>
</template>

<style scoped>

</style>
