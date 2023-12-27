<script setup>
import {Head, router, useForm} from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import Button from "@/Components/Button.vue";
import {ref} from 'vue';
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();
const previewUrl = ref('../../images/avatar-placeholder.jpg');

const props = defineProps({
    errors: Object,
    users: Object
});

const form = useForm({
    name: '',
    email: '',
    password: '',
    avatar_path: '',
});

// Image Upload
const uploadImage = (event) => {
    const file = event.target.files[0];
    form.avatar_path = file;

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
    previewUrl.value = null;
};


function submit() {
    form.post(route('user.store'), {
        preserveScroll: true,
        onSuccess: (page) => {
            $toast.open({
                message: 'User Created Successfully!',
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
                type: 'warning',
                position: 'top-right',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #FF0000, #FF6347)',
                },
            });
        }
    })

    // Clearing the form after submit
    // form.name = '';
    // form.email = '';
    // form.short_description = '';
}

</script>

<template>
    <Head title="Create Chapter"/>

    <AdminAuthenticatedLayout>
        <template #header>
            <h1 class="font-bold text-dm-heading-color text-4xl">Add New User</h1>
        </template>

        <div class="py-8">
            <div class="">
                <div class="flex gap-2 mb-6">
                    <Button :href="route('user.index')" :active="route().current('user.index')">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.8327 10H4.16602" stroke="#566474" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M9.99935 15.8333L4.16602 9.99999L9.99935 4.16666" stroke="#566474" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Go back
                    </Button>

                </div>

            </div>

            <div class="flex flex-col">
                <form @submit.prevent="submit" class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]"
                      enctype="multipart/form-data">
                    <div class="dm-input-field">
                        <label for="name" class="dm-input-field__label block">Name</label>
                        <input type="text" id="name" v-model="form.name" class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.name">{{ errors.name }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="radio-1" class="dm-input-field__label block">Email</label>
                        <input type="email" id="title" v-model="form.email" class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.email">{{ errors.email }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="password" class="dm-input-field__label block">Password</label>
                        <input type="password" id="title" v-model="form.password" class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.password">{{ errors.password }}</div>
                    </div>

                    <!-- Profile Image-->
                    <div class="dm-input-field">
                        <img :src="previewUrl" v-if="previewUrl" alt="Preview" class="w-[100px]"/>
                        <span v-else>
                <img :src="previewUrl" alt="Placeholder" class="w-[100px]"/>
            </span>
                    </div>
                    <div class="dm-input-field">
                        <label for="profile-image" class="dm-input-field__label block">Profile Image</label>
                        <input type="file" id="profile-image" name="profile_image" @change="uploadImage"
                               class="dm-input-field__input w-full">
                        <div class="text-red-500" v-if="errors.avatar_path">{{ errors.avatar_path }}</div>
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
