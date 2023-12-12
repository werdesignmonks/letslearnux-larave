<script setup>
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import {router, useForm} from '@inertiajs/vue3';
import Button from "@/Components/Button.vue";
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();
const previewUrl = ref('');

const props = defineProps({
    errors: Object,
    user: Object,
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    password: props.user.password,
    profile_image: props.user.profile_image,
});

console.log(props.user.profile_image);


const uploadImage = (event) => {
    const file = event.target.files[0];
    form.profile_image = file;

    console.log(form);

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
    // router.put(route('users.update', id), form);

    form.put(route('users.update', id), {
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
    setTimeout(() => {
        $toast.clear();
    }, 3000);
}

console.log(props.user.id);

</script>

<template>
    <Head title="Edit Chapter"/>

    <AdminAuthenticatedLayout>
        <template #header>
            <h1 class="font-bold text-dm-heading-color text-4xl">Edit User</h1>
        </template>

        <div class="py-8">
            <div class="">
                <div class="flex gap-2 mb-6">
                    <Button :href="route('users.index')" :active="route().current('users.index')">
                        All Users
                    </Button>
                </div>
            </div>

            <div class="flex flex-col">
                <form @submit.prevent="submit(user.id)" class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]" enctype="multipart/form-data">
                    <div class="dm-input-field">
                        <label for="users_name" class="dm-input-field__label block">Name</label>
                        <input type="text" id="users_name" v-model="form.name" class="dm-input-field__input">
                        <div class="text-red-500" v-if="errors.name">{{ errors.name }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="email" class="dm-input-field__label block">Email</label>
                        <input type="email" id="email" v-model="form.email" class="dm-input-field__input">
                        <div class="text-red-500" v-if="errors.email">{{ errors.email }}</div>
                    </div>

                    <div class="dm-input-field">
                        <label for="password" class="dm-input-field__label block">Password</label>
                        <input type="password" id="password" v-model="form.password" class="dm-input-field__input">
                        <div class="text-red-500" v-if="errors.password">{{ errors.password }}</div>
                    </div>


                    <div class="dm-input-field">
                        <img :src="previewUrl" v-if="previewUrl" alt="Preview" class="w-[100px]" />
                        <span v-else>
                            <img :src="form.profile_image" alt="Placeholder" class="w-[100px]" />
                        </span>
                    </div>
                    <div class="dm-input-field">
                        <label for="profile-image" class="dm-input-field__label block">Profile Image</label>
                        <input type="file" id="profile-image" name="profile_image" @change="uploadImage"  class="dm-input-field__input">
                        <div class="text-red-500" v-if="errors.profile_image">{{ errors.profile_image }}</div>
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
