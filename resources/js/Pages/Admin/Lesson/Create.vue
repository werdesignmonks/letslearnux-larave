<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import Button from "@/Components/Button.vue";
import {useToast} from 'vue-toast-notification';
import {QuillEditor} from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import 'vue-toast-notification/dist/theme-sugar.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css';

const $toast = useToast();


// Chapter List
const props = defineProps({
    lesson: Object,
    errors: Object,
});

const form = useForm({
    name: '',
    chapter_id: '',
    description: '',
});

function submit() {

    form.post(route('lesson.store'), {
        preserveScroll: true,
        onSuccess: (page) => {
            $toast.open({
                message: 'Lesson Added Successfully!',
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
                message: 'Please fill all the fields',
                type: 'worning',
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
    form.name = '';
    form.chapter_id = '';
    form.contetn = '';
}

</script>

<template>
    <Head title="Add New Topic"/>

    <AdminAuthenticatedLayout>
        <template #header>
            <h1 class="font-bold text-dm-heading-color text-4xl">Add New Lesson</h1>
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

            <form @submit.prevent="submit" class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]">
                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Topic Title</label>
                    <input type="text" id="lesson_name" v-model="form.name" class="dm-input-field__input w-full">
                    <div class="text-red-500" v-if="errors.name">{{ errors.name }}</div>
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
                    <label for="short_description" class="dm-input-field__label block">Content</label>
                    <QuillEditor
                        theme="snow"
                        contentType="html"
                        toolbar="full"
                        style="height: 350px"
                        name="short_description"
                        v-model:content="form.content"
                    />
                    <div class="text-red-500" v-if="errors.description">{{ errors.description }}</div>
                </div>

                <div class="dm-input-field">
                    <button type="submit" class="dm-btn">
                        Add New
                    </button>
                </div>
            </form>
        </div>
    </AdminAuthenticatedLayout>
</template>
