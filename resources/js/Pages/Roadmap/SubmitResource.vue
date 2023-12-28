<script setup>
import { Link} from "@inertiajs/vue3";

defineProps( {
    modalAddResource: Boolean,
})

</script>

<template>
    <div class="max-w-[1070px]  bg-violet-50 rounded-3xl justify-start items-center gap-8 inline-flex md:flex-row sm:flex-col ">
        <div class="lg:w-[410px] lg:h-[360px] px-4 flex items-center justify-center">
            <div class="relative">
                <img :src="'../images/user.png'" :alt="'Contribute resources to enhance The platform'" />
            </div>
        </div>
        <div class="grow shrink basis-0 px-[32px] flex-col justify-start items-center sm:items-start gap-6 inline-flex py-8 lg:py-10 sm:px-4 text-center md:text-left">
            <div class=" flex-col justify-start items-start gap-2 flex">
                <h2 class="self-stretch text-gray-950 text-[32px] font-bold leading-[38.40px]">Contribute resources to enhance <br/>The platform</h2>
                <p class="self-stretch">Efforts to bolster the platform through the provision of valuable resources are paramount. By contributing strategically, we can elevate the platform's efficacy and overall standing, fostering an environment of growth and progress. Checkout the <Link href="#" class="text-violet-600 text-base font-normal underline leading-relaxed">Contributor</Link> leaderboard.</p>
            </div>
            <div class="sm:text-center md:text-left w-full">
                <button class="dm-btn px-8" @click="modalAddResource = true">Submit Resources</button>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
