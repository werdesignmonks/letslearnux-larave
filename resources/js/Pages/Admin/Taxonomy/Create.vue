<script setup>
import { Head } from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import {router, useForm} from '@inertiajs/vue3';
import Button from "@/Components/Button.vue";

defineProps({
    errors: Object,
    chapters: Array,
});

const form = useForm({
    taxonomy_name: '',
    content_type: '',
    title: '',
    sub_title: '',
    estimate_time: '',
    serial: '',
});

function submit() {
    router.post(route('chapter.store'), form);
}


</script>

<template>
    <Head title="Create Chapter"/>

    <AdminAuthenticatedLayout>
        <template #header>
            <h1 class="font-bold text-dm-heading-color text-4xl">Add New Chapter</h1>
        </template>

        <div class="py-8">
            <div class="">
                <div class="flex gap-2 mb-6">
                    <Button :href="route('chapter.index')" :active="route().current('chapter.index')">
                        All Taxonomy
                    </Button>
                    <Button :href="route('chapter.create')" :active="route().current('chapter.create')">
                        Add New
                    </Button>

                </div>

            </div>

            <div class="flex flex-col">
                <form @submit.prevent="submit" class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]">


                    <div class="dm-input-field">
                        <label for="radio-1" class="dm-input-field__label block">Taxonomy Name</label>
                        <input type="text" id="chapter_name" v-model="form.taxonomy_name"
                               class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.taxonomy_name">{{ errors.chapter_name }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="radio-1" class="dm-input-field__label block">Title</label>
                        <input type="text" id="title" v-model="form.title" class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.title">{{ errors.title }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="radio-1" class="dm-input-field__label block">Sub Title</label>
                        <input type="text" id="sub_title" v-model="form.sub_title" class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.sub_title">{{ errors.sub_title }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="radio-1" class="dm-input-field__label block">Estimated Time</label>
                        <input type="text" id="estimate_time" v-model="form.estimate_time"
                               class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.estimate_time">{{ errors.estimate_time }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="radio-1" class="dm-input-field__label block">Custom SL</label>
                        <input type="text" id="serial" v-model="form.serial" class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.serial">{{ errors.serial }}</div>
                    </div>

                    <div class="flex justify-start mt-6">
                        <button type="submit" class="dm-btn">
                            Add New
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </AdminAuthenticatedLayout>
</template>

<style scoped>

</style>
