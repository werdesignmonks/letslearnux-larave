<script setup>
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import {router, useForm} from '@inertiajs/vue3';
import Button from "@/Components/Button.vue";
import {Head} from '@inertiajs/vue3';
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import InputLabel from "@/Components/InputLabel.vue";
import {ref} from "vue";

const $toast = useToast();


const props = defineProps({
    errors: Object,
    resource: Object,
});

const previewUrl = ref(props.resource.image);

const form = useForm({
    title: props.resource.title,
    type: props.resource.type,
    url: props.resource.url,
    status: props.resource.status,
    image: props.resource.image,
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

function submit(id) {
    // router.put(route('resource.update', id), form);

    form.post(route('resource.update', id), {
        preserveScroll: true,
        onSuccess: (page) => {
            $toast.open({
                message: 'Resource Updated Successfully!',
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
                    <Button :href="route('resource.index')" :active="route().current('resource.index')">
                        Chapter List
                    </Button>

                </div>

            </div>

            <div class="flex flex-col">
                <form @submit.prevent="submit(resource.id)" class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]" enctype="multipart/form-data">
                    <div class="dm-input-field">
                        <label for="title-1" class="dm-input-field__label block">Title</label>
                        <input type="text" name="title" id="title-1" v-model="form.title" class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.title">{{ errors.title }}</div>
                    </div>


                    <div class="dm-input-field">
                        <InputLabel for="Position" value="Content Type*" class="mb-2"/>

                        <div class="form-check mr-2 inline-flex items-center gap-1">
                            <input type="radio" id="type_video" name="type" v-model="form.type" value="video" class="form-check-input">
                            <label for="type_video" class="form-check-label dmb-0 leading-none">Video</label>
                        </div>
                        <div class="form-check mr-2 inline-flex items-center gap-1">
                            <input type="radio" id="type_article" name="type" v-model="form.type" value="article" class="form-check-input">
                            <label for="type_article" class="form-check-label dmb-0 leading-none">Article</label>
                        </div>
                        <div class="form-check mr-2 inline-flex items-center gap-1">
                            <input type="radio" id="type_book" name="type" v-model="form.type" value="book" class="form-check-input">
                            <label for="type_book" class="form-check-label dmb-0 leading-none">Book</label>
                        </div>
                        <div class="text-red-500" v-if="errors.type">{{ errors.type }}</div>

                        <!-- Profile Image-->
                        <div class="dm-input-field">
                            <img :src="previewUrl" v-if="previewUrl" alt="Preview" class="w-[100px]" />
                            <span v-else>
                            <img :src="previewUrl" alt="Placeholder" class="w-[100px]" />
                        </span>
                        </div>
                        <div class="dm-input-field">
                            <label for="profile-image" class="dm-input-field__label block">Thumbnail</label>
                            <input type="file" id="profile-image" name="profile_image" @change="uploadImage"  class="dm-input-field__input w-full">
                            <div class="text-red-500" v-if="errors.image">{{ errors.image }}</div>
                        </div>

                        <div class="dm-input-field">
                            <label for="status" class="dm-input-field__label block">Status</label>
                            <select name="status" id="status" v-model="form.status" class="dm-input-field__input w-full">
                                <option value="">Select Status</option>
                                <option value="approved">Public</option>
                                <option value="pending">Draft</option>
                            </select>
                            <div class="text-red-500" v-if="errors.status">{{ errors.status }}</div>
                        </div>

                        <div class="dm-input-field">
                            <label for="radio-1" class="dm-input-field__label block">URL <span class="text-red-300">*</span></label>
                            <input type="text" name="url" id="url" v-model="form.url" class="dm-input-field__input w-full">
                            <div class="text-red-500" v-if="errors.url">{{ errors.url }}</div>
                        </div>


                    </div>



                    <div class="dm-input-field">
                        <button type="submit" class="dm-btn dm-button--primary">Add Now</button>
                    </div>

                </form>
            </div>

        </div>
    </AdminAuthenticatedLayout>
</template>

<style scoped>

</style>
