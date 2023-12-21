<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <div class="w-full p-[48px] rounded-[48px] border border-violet-300 flex-col">
            <div class="text-center mb-5">
                <Link href="/">
                    <ApplicationLogo class="fill-current mx-auto mb-7" />
                </Link>

                <h1 class="text-4xl font-bold text-center mt-4">Forgot Password</h1>
                <p class="text-center mt-2 color-dm-color-text">
                    Did you forgot your password?
                </p>
            </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Email Password Reset Link
                </PrimaryButton>
            </div>
        </form>

            <div className="w-[424px] text-center mt-5">
                <span class="text-slate-600 text-base font-normal leading-snug">Remember the password? </span><Link :href="route('login')" class="text-violet-600 text-base font-normal underline leading-snug">Login</Link>
            </div>

        </div>
    </GuestLayout>
</template>
