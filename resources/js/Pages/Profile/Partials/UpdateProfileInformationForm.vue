<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import RadioInput from "@/Components/RadioInput.vue";
import {ref} from "vue";
const previewUrl = ref('');
const props = defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    onboardings: Object,
    onboarding: Object
});

console.log(props.onboarding);

const user = usePage().props.auth.user;
const onboarding = usePage().props.onboarding;

console.log(onboarding);

// console.log(user)

const form = useForm({
    name: user.name,
    email: user.email,
    avatar_path: user.avatar_path,
    date_of_birth: user.date_of_birth,
    gender: user.gender,
    profession: onboarding.profession,
    experience: onboarding.experience,
    learning: []
});

const uploadImage = (event) => {
    const file = event.target.files[0];
    form.avatar_path = file;
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

</script>

<template>
    <section>

        <form @submit.prevent="form.post(route('profile.update'))" class="mt-6 space-y-6">
            <div>

                <div class="dm-input-field mb-5 w-[120px] h-[120px] mx-auto rounded-full overflow-hidden">
                    <img :src="previewUrl" v-if="previewUrl" alt="Preview" class="object-cover" />
                    <span v-else>
                        <img :src="form.avatar_path" alt="Placeholder" class="object-cover h-full w-full" />
                    </span>
                </div>

                <div class="dm-input-field">
                    <label for="profile-image" class="dm-input-field__label block">Profile Image</label>
                    <input type="file" id="profile-image" name="profile_image" @change="uploadImage"  class="dm-input-field__input">
<!--                    <div class="text-red-500" v-if="errors.avatar_path">{{ errors.avatar_path }}</div>-->
                </div>

<!--                <div class="mb-5">-->
<!--                    <input type="file" name="avatar_path" @input="form.avatar_path = $event.target.files[0]" />-->
<!--                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">-->
<!--                        {{ form.progress.percentage }}%-->
<!--                    </progress>-->
<!--                </div>-->

                <div class="mb-4">
                    <InputLabel for="name" value="Name" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mb-4">
                    <InputLabel for="email" value="Email" />

                    <p class="border border-dm-border-color text-base text-dm-color-text bg-[#F2F3F3] p-3 rounded-md">
                        {{ form.email }}
                    </p>
                </div>

                <div class="mb-4">
                    <InputLabel for="dateOfBirth" value="Date of birth" />
                    <TextInput
                        id="dateOfBirth"
                        type="date"
                        class="mt-1 block w-full"
                        v-model="form.date_of_birth"
                        required
                        autofocus
                        autocomplete="date_of_birth"
                    />
                    <InputError class="mt-2" :message="form.errors.date_of_birth" />
                </div>

                <div class="mb-4">
                    <InputLabel for="gender" value="Gender" class="mb-2"/>
<!--                    <RadioInput label="Male" name="form.gender" />-->
<!--                    <RadioInput label="Female" name="form.gender" />-->
<!--                    <RadioInput label="Other" name="form.gender" />-->

                    <select name="gender" id="gender" class="border-gray-300 focus:border-indigo-500 w-full focus:ring-indigo-500 rounded-md shadow-sm" v-model="form.gender">
                        <option disabled :value="form.gender">{{ form.gender }}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.gender" />
                </div>

<!--                <div class="mb-4">-->
<!--                    <InputLabel for="Position" value="Your Current Position*" class="mb-2"/>-->
<!--                    <div>-->
<!--                        <RadioInput label="Student" :model="form.profession"  />-->
<!--                        <RadioInput label="Professional" :model="form.profession" />-->
<!--                        <RadioInput label="Manager or Business Owner" :model="form.profession" />-->
<!--                        <RadioInput label="Others" :model="form.profession" />-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="mb-4">-->
<!--                    <InputLabel for="experience" value="Experience" class="mb-2"/>-->
<!--                    <div>-->
<!--                        <RadioInput label="Beginner (0-2 years experience)" name="experience" />-->
<!--                        <RadioInput label="Intermediate (3-5 years experience)" name="experience" />-->
<!--                        <RadioInput label="Advanced (5+ years experience)" name="experience" />-->
<!--                    </div>-->
<!--                </div>-->

                <div class="mb-10">
                    <InputLabel for="Position" value="Your Current Position*" class="mb-2"/>

                    <label for="Student" class="flex items-center cursor-pointer">
                        <input type="radio" id="Student" v-model="form.profession" value="student" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-[#CCCED0] text-indigo-600 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-9 before:w-9 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-[#643EF3] before:opacity-0 before:transition-opacity checked:border-[#643EF3] focus:outline-none">
                        <span class="ml-2">Student</span>
                    </label>


                    <label for="profession" class="flex items-center cursor-pointer">
                        <input type="radio" id="profession" v-model="form.profession" value="professional" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-[#CCCED0] text-indigo-600 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-9 before:w-9 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-[#643EF3] before:opacity-0 before:transition-opacity checked:border-[#643EF3] focus:outline-none">
                        <span class="ml-2">Professional</span>
                    </label>

                    <label for="Business" class="flex items-center cursor-pointer">
                        <input type="radio" id="Business" v-model="form.profession" value="business" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-[#CCCED0] text-indigo-600 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-9 before:w-9 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-[#643EF3] before:opacity-0 before:transition-opacity checked:border-[#643EF3] focus:outline-none">
                        <span class="ml-2">Manager or Business Owner</span>
                    </label>

                    <label for="other" class="flex items-center cursor-pointer">
                        <input type="radio" id="other" v-model="form.profession" value="other" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-[#CCCED0] text-indigo-600 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-9 before:w-9 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-[#643EF3] before:opacity-0 before:transition-opacity checked:border-[#643EF3] focus:outline-none">
                        <span class="ml-2">Other</span>
                    </label>

                </div>

                <div class="mb-10">
                    <InputLabel for="experience" value="Experience" class="mb-2"/>

                    <label class="flex items-center cursor-pointer" for="beginner">
                        <input type="radio" id="beginner" v-model="form.experience" value="beginner" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-[#CCCED0] text-indigo-600 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-9 before:w-9 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-[#643EF3] before:opacity-0 before:transition-opacity checked:border-[#643EF3] focus:outline-none">
                        <span class="ml-2"><strong>Beginner</strong> (0-2 years experience)</span>
                    </label>

                    <label class="flex items-center cursor-pointer" for="intermediate">
                        <input type="radio" id="beginner" v-model="form.experience" value="intermediate" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-[#CCCED0] text-indigo-600 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-9 before:w-9 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-[#643EF3] before:opacity-0 before:transition-opacity checked:border-[#643EF3] focus:outline-none">
                        <span class="ml-2"><strong>Intermediate</strong> (3-5 years experience)</span>
                    </label>

                    <label class="flex items-center cursor-pointer" for="advanced">
                        <input type="radio" id="beginner" v-model="form.experience" value="advanced" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-[#CCCED0] text-indigo-600 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-9 before:w-9 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-[#643EF3] before:opacity-0 before:transition-opacity checked:border-[#643EF3] focus:outline-none">
                        <span class="ml-2"><strong>Advanced</strong> (5+ years experience)</span>
                    </label>
                </div>


            </div>

            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="flex items-center flex-col gap-4">
                <PrimaryButton :disabled="form.processing">Update Profile</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-base font-medium bg-green-500 block text-green-900 border border-green-600 w-full p-2 text-center rounded-3xl">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
