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
    <div class="dm-radio-field mb-3">
        <input
            type="radio"
            :name="name"
        />
        <label for="remember_me" class="absolute top-[50%] translate-y-[-50%] left-[50px] text-[#000913] font-medium">
            {{ label }}
        </label>
    </div>
</template>

<style scoped>

</style>
