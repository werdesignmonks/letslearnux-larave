<script setup>
import {Head, router, useForm} from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import Button from "@/Components/Button.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useToast} from "vue-toast-notification";
import 'vue-toast-notification/dist/theme-sugar.css';
import {ref} from "vue";


const $toast = useToast();
const previewUrl = ref('../../images/placeholder-image.jpg');

defineProps({
    errors: Object,
    resource: Object,
});


const form = useForm({
    title: '',
    type: '',
    image: '',
    url: '',
    status: ''
});


const uploadImage = (event) => {
    const file = event.target.files[0];
    form.image = file;

    // const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();

        reader.onload = (e) => {
            previewUrl.value = e.target.result;
        };

        reader.readAsDataURL(file);
    } else {
        previewUrl.value = '';
    }
};




const removeImage = () => {
    // previewUrl.value = '';
    form.image = '';
};

function submit() {

    form.post(route('resource.store'), {
        preserveScroll: true,
        onSuccess: (page) => {
            $toast.open({
                message: 'Resource Added Successfully!',
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
}
</script>

<template>
    <Head title="Resources"/>

    <AdminAuthenticatedLayout>
        <template #header>
            <h1 class="font-bold text-dm-heading-color text-4xl">Add New Resource</h1>
        </template>

        <div class="py-8">
            <div class="">
                <div class="flex gap-2 mb-6">
                    <Button :href="route('resource.index')" :active="route().current('resource.index')">
                        Resource List
                    </Button>
                </div>

            </div>

            <form @submit.prevent="submit" class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]" enctype="multipart/form-data">
                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Title</label>
                    <input type="text" name="question" id="question" v-model="form.title" class="dm-input-field__input">
                    <div class="text-red-500" v-if="errors.title">{{ errors.title }}</div>
                </div>


                <div class="dm-input-field">
                    <InputLabel for="Position" value="Content Type*" class="mb-2"/>

                    <div class="form-check mr-2 inline-flex items-center gap-1">
                        <input type="radio" id="type_video" name="type" v-model="form.type" value="video" class="form-check-input">
                        <label for="type_video" class="form-check-label dmb-0">Video</label>
                    </div>
                    <div class="form-check mr-2 inline-flex items-center gap-1">
                        <input type="radio" id="type_article" name="type" v-model="form.type" value="article" class="form-check-input">
                        <label for="type_article" class="form-check-label dmb-0">Article</label>
                    </div>
                    <div class="form-check mr-2 inline-flex items-center gap-1">
                        <input type="radio" id="type_book" name="type" v-model="form.type" value="book" class="form-check-input">
                        <label for="type_book" class="form-check-label dmb-0">Book</label>
                    </div>
                    <div class="text-red-500" v-if="errors.type">{{ errors.type }}</div>

                    <div class="dm-input-field mt-3">
                        <label for="radio-1" class="dm-input-field__label block">URL <span class="text-red-300">*</span></label>
                        <input type="text" name="url" id="url" v-model="form.url" class="dm-input-field__input">
                        <div class="text-red-500" v-if="errors.url">{{ errors.url }}</div>
                    </div>

                    <!-- Profile Image-->
                    <div class="dm-input-field dm-preview-image mt-6 relative">
                        <label for="profile-image" class="dm-input-field__label block mb-3">Thumbnail</label>
                        <img :src="previewUrl" v-if="previewUrl" alt="Preview" class="w-[250px]" />
                        <span v-else>
                            <img :src="previewUrl" alt="Placeholder" class="w-[100px]" />
                        </span>

                        <div class="dm-input-field__file-remove absolute top-[50px] right-[20px] bg-red-200 rounded p-1" v-if="previewUrl" @click="removeImage">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>
                    </div>
                    <div class="dm-input-field">
                        <input type="file" id="profile-image" name="profile_image" @change="uploadImage"  class="dm-input-field__file">
                        <div class="text-red-500" v-if="errors.image">{{ errors.image }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="status" class="dm-input-field__label block">Status</label>
                        <select name="status" id="status" v-model="form.status" class="dm-input-field__input">
                            <option value="">Select Status</option>
                            <option value="approved">Public</option>
                            <option value="pending">Draft</option>
                        </select>
                        <div class="text-red-500" v-if="errors.status">{{ errors.status }}</div>
                    </div>

                </div>

                <div class="dm-input-field">
                    <button type="submit" class="dm-btn dm-button--primary">Add Now</button>
                </div>

            </form>

        </div>
    </AdminAuthenticatedLayout>
</template>

<style scoped>

</style>
