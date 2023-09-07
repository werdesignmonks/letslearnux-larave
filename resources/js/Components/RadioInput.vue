<script setup>
import { defineProps } from 'vue'
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
        <input
            type="radio"
            :name="name"
            class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
        />
        <label for="remember_me" class="ml-2 block text-base leading-5 text-dm-heading-color">
            {{ label }}
        </label>
    </div>
</template>

<style scoped>

</style>
