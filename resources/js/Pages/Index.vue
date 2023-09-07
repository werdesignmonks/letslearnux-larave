<script setup>
import Layout from "../Lauouts/Layout.vue";

defineProps({
    title: String,
    description: String,
})

</script>

<template>
    <Layout>
        <div class="container mx-auto py-9">
            <h1 class="text-4xl mb-4">{{ title }}</h1>
            <div class="description">
                {{ description }}
            </div>
        </div>
    </Layout>
</template>

<style scoped>

</style>
