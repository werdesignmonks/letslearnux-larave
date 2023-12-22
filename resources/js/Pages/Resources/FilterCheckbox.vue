<script setup>

defineProps({
    label: {
        type: String,
        required: true,
    },
    value: {
        type: Number,
        required: true,
    },
})
</script>

<template>
    <div class="py-[4px] flex gap-3 items-center mb-1">
        <input type="checkbox" :value="value" class="rounded bg-[#F2F3F3] border border-[#CCCED0]" />
        <label class="inline-flex items-center cursor-pointer">
            <span class="text-base text-[#333A42]">{{ label }}</span>
        </label>
    </div>
</template>
