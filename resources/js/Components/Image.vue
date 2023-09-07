<script setup>

defineProps({
    src: {
        type: String,
        required: true,
    },
    alt: {
        type: String,
        required: true,
    },
    width: {
        type: String,
        default: '280',
    },
    height: {
        type: String,
        default: '220',
    },
    classes: {
        type: String,
    },
});

</script>

<template>
    <img :src="src" :alt="alt" :class="classes" />
</template>

<style scoped>

</style>
