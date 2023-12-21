<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:rounded-lg border">
        <div class="w-full sm:max-w-xl mt-3 px-6 py-4">
            <slot />
        </div>
    </div>
</template>
