<script setup>
import {Head, router, useForm} from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import Button from "@/Components/Button.vue";
import {QuillEditor} from "@vueup/vue-quill";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();


// Chapter List
const props = defineProps({
    lesson: Array,
    errors: Object,
    chapters: Object,
});

const form = useForm({
    title: props.lesson.title,
    chapter_id: props.lesson.chapter_id,
    description: props.lesson.description,
    serial: props.lesson.serial,
});


function submit(id) {
    // router.put(route('lesson.update', id), form);

    form.put(route('lesson.update', id), {
        preserveScroll: true,
        onSuccess: (page) => {
            $toast.open({
                message: 'Lesson Update Successfully!',
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
    setTimeout(() => {
        $toast.clear();
    }, 3000);

}

</script>

<template>
    <Head title="Add New Lesson"/>

    <AdminAuthenticatedLayout>
        <template #header>
            <h1 class="font-bold text-dm-heading-color text-4xl">Edit Lesson</h1>
        </template>

        <div class="py-8">
            <div class="">
                <div class="flex gap-2 mb-6">
                    <Button :href="route('lesson.index')" :active="route().current('lesson.index')">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.8327 10H4.16602" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.99935 15.8333L4.16602 9.99999L9.99935 4.16666" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      Go back
                    </Button>
                </div>
            </div>

            <form @submit.prevent="submit(lesson.id)" class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]">
                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Title</label>
                    <input type="text" id="lesson_name" v-model="form.title" class="dm-input-field__input w-full">
                    <div class="text-red-500" v-if="errors.title">{{ errors.title }}</div>
                </div>

                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Chapter Name</label>

                    <select name="chapter_id" id="chapter_id" v-model="form.chapter_id"
                            class="dm-input-field__input w-full">
                        <option value="">Select Chapter</option>
                        <option v-for="chapter in chapters" :key="chapter.id" :value="chapter.id">
                            {{ chapter.chapter_name }}
                        </option>
                    </select>
                    <div class="text-red-500" v-if="errors.chapter_id">{{ errors.chapter_id }}</div>
                </div>

                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Lesson Serial Number</label>
                    <input type="text" id="serial" v-model="form.serial" class="dm-input-field__input w-full">
                    <div class="text-red-500" v-if="errors.serial">{{ errors.serial }}</div>
                </div>

                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Content</label>
                    <QuillEditor
                        theme="snow"
                        contentType="html"
                        toolbar="full"
                        style="height: 350px"
                        name="short_description"
                        v-model:content="form.description"
                    />
                </div>

                <div class="dm-input-field">
                    <button type="submit" class="dm-btn">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </AdminAuthenticatedLayout>
</template>
