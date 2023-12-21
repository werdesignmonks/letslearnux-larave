<script setup>
defineProps({
    value: {
        type: String,
    },
    req: {
        type: String,
    },
});
</script>

<template>
    <label class="block font-medium text-base text-[#566474]">
        <span v-if="value">{{ value }}<i class="text-red-500 text-sm font-medium font-['Inter'] leading-tight"> {{ req }}</i></span>
        <span v-else><slot /></span>
    </label>
</template>
