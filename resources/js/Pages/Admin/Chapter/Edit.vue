<script setup>
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import {router, useForm} from '@inertiajs/vue3';
import Button from "@/Components/Button.vue";
import {Head} from '@inertiajs/vue3';
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();

const props = defineProps({
    errors: Object,
    chapter: Object,
});

const form = useForm({
    chapter_name: props.chapter.chapter_name,
    title: props.chapter.title,
    sub_title: props.chapter.sub_title,
    estimate_time: props.chapter.estimate_time,
    custom_sl: props.chapter.custom_sl,
});

function submit(id) {
    // router.put(route('chapter.update', id), form);

    form.put(route('chapter.update', id), {
        preserveScroll: true,
        onSuccess: (page) => {
            $toast.open({
                message: 'Chapter Updated Successfully!',
                type: 'success',
                position: 'top-right',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #00b09b, #96c93d)',
                },
            });
        },
        onError: (errors) => {
            $toast.open({
                message: 'All fields are required!',
                type: 'error',
                position: 'top-right',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #FF0000, #FF6347)',
                },
            });
        }
    })

    //Dismissing the Toast after 5 seconds
    // setTimeout(() => {
    //     $toast.clear();
    // }, 3000);
}


</script>

<template>
    <Head title="Edit Chapter"/>

    <AdminAuthenticatedLayout>
        <template #header>
            <h1 class="font-bold text-dm-heading-color text-4xl">Add New Chapter</h1>
        </template>

        <div class="py-8">
            <div class="">
                <div class="flex gap-2 mb-6">
                    <Button :href="route('chapter.index')" :active="route().current('chapter.index')">
                        Chapter List
                    </Button>
                    <Button :href="route('chapter.create')" :active="route().current('chapter.create')">
                        Add New Chapter
                    </Button>

                </div>

            </div>

            <div class="flex flex-col">
                <form @submit.prevent="submit(chapter.id)"
                      class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]">
                    <div class="dm-input-field">
                        <label for="radio-1" class="dm-input-field__label block">Chapter Name</label>
                        <input type="text" id="chapter_name" v-model="form.chapter_name"
                               class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.chapter_name">{{ errors.chapter_name }}</div>
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
                        <input type="text" id="custom_sl" v-model="form.custom_sl" class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.custom_sl">{{ errors.custom_sl }}</div>
                    </div>

                    <div class="flex justify-start mt-6">
                        <button type="submit" class="dm-btn">
                            Update
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </AdminAuthenticatedLayout>
</template>

<style scoped>

</style>
