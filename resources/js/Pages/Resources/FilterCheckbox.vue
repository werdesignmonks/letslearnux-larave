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
    <div class="py-[4px] flex gap-3 items-center mb-1 relative">
        <input type="checkbox" :value="value" class="before:content[''] peer relative h-5 w-5 bg-zinc-100 cursor-pointer appearance-none rounded border border-neutral-300 text-gray-900 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded before:bg-dm-color-primary before:opacity-0 before:transition-opacity checked:border-[#643ef3] checked:bg-dm-color-primary checked:before:bg-dm-color-primary" />
        <label class="inline-flex items-center cursor-pointer">
            <span class="text-base text-[#333A42]">{{ label }}</span>
        </label>
    </div>
</template>
