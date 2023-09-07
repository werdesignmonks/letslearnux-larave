<script setup>

defineProps({
    label: {
        type: String,
        required: true,
    },
    value: {
        type: String,
        required: true,
    },
})
</script>

<template>
    <div class="py-[4px]">
        <input type="checkbox" :value="value" class="rounded bg-[#F2F3F3] border border-[#CCCED0]" />
        <label class="inline-flex items-center cursor-pointer">
            <span class="ml-3 text-base  text-[#333A42]">{{ label }}</span>
        </label>

    </div>
</template>

<style scoped>

</style>
