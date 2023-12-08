<script setup>
import {Head, router, useForm} from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import Button from "@/Components/Button.vue";

import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import {QuillEditor} from "@vueup/vue-quill";

const $toast = useToast();


// Chapter List
const props = defineProps({
    topic: Object,
    errors: Object,
    chapters: Object,
});

const form = useForm({
    topic_name: props.topic.topic_name,
    chapter_id: props.topic.chapter_id,
    short_description: props.topic.short_description,
});


// form.put(route('topic.update', id), {
//     preserveScroll: true,
//     onSuccess: (page) => {
//         $toast.open({
//             message: 'Topic Update Successfully!',
//             type: 'success',
//             position: 'top-right',
//             duration: 5000,
//             // Styling for Success Toast Gradient Background
//             style: {
//                 background: 'linear-gradient(to right, #00b09b, #96c93d)',
//             },
//         });
//     },
//     onError: (errors) => {
//         $toast.open({
//             message: 'All fields are required!',
//             type: 'error',
//             position: 'top-right',
//             duration: 5000,
//         });
//     }
// })


// form.post(route('topic.store'), {
//     preserveScroll: true,
//     onSuccess: (page) => {
//         $toast.open({
//             message: 'Topic Added Successfully!',
//             type: 'success',
//             position: 'top-right',
//             duration: 5000,
//             // Styling for Success Toast Gradient Background
//             style: {
//                 background: 'linear-gradient(to right, #00b09b, #96c93d)',
//             },
//         });
//     },
//     onError: (errors) => {
//         $toast.open({
//             message: 'Please fill all the fields',
//             type: 'success',
//             position: 'top-right',
//             duration: 5000,
//             // Styling for Success Toast Gradient Background
//             style: {
//                 background: 'linear-gradient(to right, #00b09b, #96c93d)',
//             },
//         });
//     }
// })

function submit(id) {
    // router.put(route('topic.update', id), form);

    form.put(route('topic.update', id), {
        preserveScroll: true,
        onSuccess: (page) => {
            $toast.open({
                message: 'Topic Update Successfully!',
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
                message: 'All fields are required!',
                type: 'error',
                position: 'top-right',
                duration: 5000,
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
    <Head title="Add New Topic"/>

    <AdminAuthenticatedLayout>
        <template #header>
            <h1 class="font-bold text-dm-heading-color text-4xl">Edit Topic</h1>
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

            <form @submit.prevent="submit(topic.id)" class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]">
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

                <!--                <div class="dm-input-field">-->
                <!--                    <label for="radio-1" class="dm-input-field__label block">Content</label>-->
                <!--                    <textarea name="short_description" id="short_description" v-model="form.short_description" class="dm-input-field__input w-full" rows="7"></textarea>-->
                <!--                    <div class="text-red-500" v-if="errors.short_description">{{ errors.short_description }}</div>-->
                <!--                </div>-->

                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Content</label>
                    <QuillEditor
                        theme="snow"
                        contentType="html"
                        toolbar="full"
                        style="height: 350px"
                        name="short_description"
                        v-model:content="form.short_description"
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

<style scoped>

</style>
