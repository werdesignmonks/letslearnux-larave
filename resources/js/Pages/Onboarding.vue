<script setup>
import Onboard from "@/Components/Onboard.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>

    <div class="py-[20px] h-screen  items-center w-full flex-col justify-center">
        <div class="lg:max-w-[1070px] sm:max-w-[600px] px-5 mx-auto mb-[48px]">
            <div class="w-full bg-[#F2F3F3] rounded-full h-3">
                <div class="bg-dm-color-primary h-3 rounded-full" style="width: 45%"></div>
            </div>
        </div>
        <div class="px-5">
            <div class="border border-dm-border-color rounded-3xl sm:max-w-[520px] sm:min-w-[520px] p-[48px]  mx-auto">
                <ApplicationLogo class="mx-auto mb-6"/>
                <Onboard/>
            </div>

        </div>
    </div>
</template>

<style scoped>

</style>
