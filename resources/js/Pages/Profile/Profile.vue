<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head, useForm, usePage, Link} from '@inertiajs/vue3';
import InputLabel from "@/Components/InputLabel.vue";


const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    username: user.username,
    dateOfBirth: user.date_of_birth,
    gender: user.gender,
    avatar_path: user.avatar_path,
    avatar_url: user.avatar_url
});


defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile"/>

    <AuthenticatedLayout>
        <div class="h-screen   ">
        <div class="max-w-[520px] mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 border  sm:rounded-3xl">

                <img :src="form.avatar_path" alt="avatar" class="w-[120px] h-[120] mx-auto mb-10 rounded-full"/>
                <header class="flex justify-between mb-10">
                    <h2 class="text-[20px] font-bold text-gray-900">Profile info</h2>
                    <Link href="edit" class="underline font-bold text-dm-color-primary -tracking-[0.5px] "> Edit</Link>
                </header>

                <div>
                    <div class="mb-4">
                        <InputLabel for="name" value="Name" class="mb-2"/>
                        <p class="border border-dm-border-color text-base text-dm-color-text bg-[#F2F3F3] p-3 rounded-md">
                            {{ form.name }}</p>
                    </div>

                    <div class="mb-4">
                        <InputLabel for="email" value="Email" class="mb-2"/>
                        <p class="border border-dm-border-color text-base text-dm-color-text bg-[#F2F3F3] p-3 rounded-md">
                            {{ form.email }}
                        </p>
                    </div>
                    <div class="mb-4">
                        <InputLabel for="username" value="User Name" class="mb-2"/>
                        <p class="border border-dm-border-color text-base text-dm-color-text bg-[#F2F3F3] p-3 rounded-md">
                            {{ form.username }}</p>
                    </div>
                    <div class="flex gap-4">
                        <div v-if="form.dateOfBirth" class="w-1/2">
                            <div class="mb-4">
                                <InputLabel for="dateofbirth" value="Date Of Birth" class="mb-2"/>
                                <p class="border border-dm-border-color text-base text-dm-color-text bg-[#F2F3F3] p-3 rounded-md">
                                    {{ form.dateOfBirth }}
                                </p>
                            </div>
                        </div>

                        <div v-if="form.gender" class="w-1/2">
                            <div class="mb-4">
                                <InputLabel for="dateofbirth" value="Gender" class="mb-2"/>
                                <p class="border border-dm-border-color text-base text-dm-color-text bg-[#F2F3F3] p-3 rounded-md">
                                    {{ form.gender }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </AuthenticatedLayout>

</template>
