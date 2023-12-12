<script setup>
import {defineProps} from 'vue'

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        required: true,
    },
})


</script>

<template>
    <div class="flex items-center mb-[4px]">
        <label class="flex items-center cursor-pointer">
            <input
                type="radio"
                :name="name"
                class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-[#CCCED0] text-indigo-600 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-9 before:w-9 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-[#643EF3] before:opacity-0 before:transition-opacity checked:border-[#643EF3]  focus:outline-none"
            />
            <span class="ml-2 block text-base leading-5 text-dm-heading-color">{{ label }}</span>
        </label>
    </div>
</template>

<style scoped>

</style>
