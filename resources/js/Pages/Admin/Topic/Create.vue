<script setup>
import {Head, router, useForm} from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import Button from "@/Components/Button.vue";
import {useToast} from 'vue-toast-notification';
import Tiptap from "@/Components/Tiptap.vue";
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();


// Chapter List
const props = defineProps({
    chapters: Object,
    errors: Object,
});

const form = useForm({
    topic_name: '',
    chapter_id: '',
    short_description: '',
});

function submit() {

    form.post(route('topic.store'), {
        preserveScroll: true,
        onSuccess: (page) => {
            $toast.open({
                message: 'Topic Added Successfully!',
                type: 'success',
                position: 'top-right',
                duration: 5000,
                // Styling for Success Toast Gradient Background
                style: {
                    background: 'linear-gradient(to right, #00b09b, #96c93d)',
                },
            });
        },
        onError: (errors) => {
            $toast.open({
                message: 'Please fill all the fields',
                type: 'success',
                position: 'top-right',
                duration: 5000,
                // Styling for Success Toast Gradient Background
                style: {
                    background: 'linear-gradient(to right, #00b09b, #96c93d)',
                },
            });
        }
    })


    // router.post(route('topic.store'), form);

    // Validation Check for Topic Name unique or not
    // if (form.topic_name == '' || form.chapter_id == '' || form.short_description == '' ) {
    //     $toast.open({
    //         message: 'All fields are required!',
    //         type: 'error',
    //         position: 'top-right',
    //         duration: 5000,
    //     });
    // }
    //
    // else {
    //     $toast.open({
    //         message: 'Topic Added Successfully!',
    //         type: 'success',
    //         position: 'top-right',
    //         duration: 5000,
    //         // Styling for Success Toast Gradient Background
    //         style: {
    //             background: 'linear-gradient(to right, #00b09b, #96c93d)',
    //         },
    //     });
    // }
    //
    // onError: (errors) => {
    //     this.showError(errors[0])
    // }




    //Dismissing the Toast after 5 seconds
    setTimeout(() => {
        $toast.clear();
    }, 3000);

    // Clearing the form after submit
    form.topic_name = '';
    form.chapter_id = '';
    form.short_description = '';
}

</script>

<template>
    <Head title="Add New Topic"/>

    <AdminAuthenticatedLayout>
        <template #header>
            <h1 class="font-bold text-dm-heading-color text-4xl">Add New Topic</h1>
        </template>

        <div class="py-8">
            <div class="">
                <div class="flex gap-2 mb-6">
                    <Button :href="route('topic.index')" :active="route().current('topic.index')">
                        Topic List
                    </Button>
                    <Button :href="route('topic.create')" :active="route().current('topic.create')">
                        Add New Topic
                    </Button>
                </div>
            </div>

            <form @submit.prevent="submit" class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]">
                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Topic Title</label>
                    <input type="text" id="topic_name" v-model="form.topic_name" class="dm-input-field__input w-full">
                    <div class="text-red-500" v-if="errors.topic_name">{{ errors.topic_name }}</div>
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
                    <div class="text-red-500" v-if="errors.chapter_id">{{ errors.short_description }}</div>
                </div>

                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Short Description</label>
                    <textarea name="short_description" id="short_description" v-model="form.short_description" class="dm-input-field__input w-full" rows="5"></textarea>
                    <div class="text-red-500" v-if="errors.short_description">{{ errors.short_description }}</div>
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
