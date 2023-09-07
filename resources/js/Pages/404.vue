<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
</script>

<template>
    <Head title="404" />

        <div class="container mx-auto py-[100px] text-center h-screen flex justify-center items-center">
            <div>
            <img src="/images/404.svg" alt="404" class="w-[400px] mx-auto" />

            <h1 class="text-[32px] font-bold">Page not found!</h1>
            <p>
                The page you were looking for cannot be found. It's possible that the URL has been typed<br>
                incorrectly, the page has been moved, or it has been deleted.
            </p>
            <a href="/dashboard" class="dm-btn mt-5">Back to Home</a>
        </div>
        </div>

</template>
<style scoped>

</style>
