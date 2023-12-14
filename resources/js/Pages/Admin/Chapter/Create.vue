<script setup>
import { Head, router, useForm } from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import Button from "@/Components/Button.vue";
import {QuillEditor} from "@vueup/vue-quill";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css';

const $toast = useToast();

const props = defineProps({
    errors: Object,
    chapters: Array,
});

const form = useForm({
    chapter_name: '',
    title: '',
    sub_title: '',
    estimate_time: '',
});

function submit() {

    form.post(route('chapter.store'), {
        preserveScroll: true,
        onSuccess: (page) => {
            $toast.open({
                message: 'Chapter Added Successfully!',
                type: 'success',
                position: 'top-right',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #00b09b, #96c93d)',
                },
            });
        },
        onError: (errors) => {
            console.log(errors)
            $toast.open({
                message: 'Please fill all the fields',
                type: 'warning',
                position: 'top-right',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #FF0000, #FF6347)',
                },
            });
        }
    })

    //Dismissing the Toast after 5 seconds
    setTimeout(() => {
        $toast.clear();
    }, 3000);

    // Clearing the form after submit
    form.chapter_name = '';
    form.title = '';
    form.sub_title = '';
    form.estimate_time = '';
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
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.8327 10H4.16602" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.99935 15.8333L4.16602 9.99999L9.99935 4.16666" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Go back
                    </Button>
                </div>

            </div>

            <div class="flex flex-col">
                <form @submit.prevent="submit" class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]">
                    <div class="dm-input-field">
                        <label for="radio-1" class="dm-input-field__label block">Chapter Name</label>
                        <input type="text" id="chapter_name" v-model="form.chapter_name" class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.chapter_name">{{ errors.chapter_name }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="radio-1" class="dm-input-field__label block">Title</label>
                        <input type="text" id="title" v-model="form.title" class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.title">{{ errors.title }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="radio-1" class="dm-input-field__label block">Sub Title</label>
<!--                        <input type="text" id="sub_title" v-model="form.sub_title" class="dm-input-field__input w-full">-->

                        <QuillEditor
                            theme="snow"
                            contentType="html"
                            toolbar="full"
                            style="height: 150px"
                            name="short_description"
                            v-model:content="form.sub_title"
                        />
                        <div class="text-red-500" v-if="errors.sub_title">{{ errors.sub_title }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="radio-1" class="dm-input-field__label block">Estimated Time</label>
                        <input type="text" id="estimate_time" v-model="form.estimate_time"
                               class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.estimate_time">{{ errors.estimate_time }}</div>
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
