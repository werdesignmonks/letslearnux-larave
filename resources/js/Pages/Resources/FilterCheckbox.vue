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
    <div class="py-[4px] flex gap-3 items-center mb-1 relative dm-checkbox-field">
        <input type="checkbox" :value="value" class="apearance-none peer relative h-5 w-5 bg-zinc-100 cursor-pointer border border-neutral-300 text-gray-900 transition-all checked:border-[#7A49FF]" />
        <label class="inline-flex items-center cursor-pointer">
            <span class="text-base text-[#333A42]">{{ label }}</span>
        </label>
    </div>
</template>
