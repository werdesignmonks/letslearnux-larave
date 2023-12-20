<script setup>
import {useForm, Head} from "@inertiajs/vue3";
import {defineProps, ref} from "vue";

defineProps({
    onboardings: Object,
    errors: Object,
});

const form = useForm({
    profession: [],
    experience: '',
    learning: []
});

function submit() {
    form.post(route('save'), {
        onSuccess: () => {
            console.log('success');
        },
        onError: (error) => {
            console.log(error);

        },
    });
}

</script>

<template>
    <Head title="Onboarding"/>

    <div class="py-[20px] h-screen  items-center w-full flex-col justify-center">
        <div class="lg:max-w-[1070px] sm:max-w-[600px] px-5 mx-auto mb-[48px]">
            <div class="w-full bg-[#F2F3F3] rounded-full h-3">
                <div class="bg-dm-color-primary h-3 rounded-full" style="width: 45%"></div>
            </div>
        </div>
        <div class="px-5">
            <div class="border border-dm-border-color rounded-3xl sm:max-w-[520px] sm:min-w-[520px] p-[48px]  mx-auto">
                <form @submit.prevent="submit" method="POST">

                    <div class="mb-10">
                        <h2 class="text-[32px] leading-[32px] line text-center font-bold -tracking-[2px] mb-[24px]">
                            Which describes you best?
                        </h2>

                        <label for="Student" class="text-[18px] leading-[21px] line text-dm-heading-color block font-bold">
                            <input type="checkbox" id="Student" v-model="form.profession" value="student" class="mr-3">
                            <span class="ml-2">Student</span>
                        </label>


                        <label for="profession" class="text-[18px] leading-[21px] line text-dm-heading-color block font-bold">
                            <input type="checkbox" id="profession" v-model="form.profession" value="professional" class="mr-3">
                            <span class="ml-2">Professional</span>
                        </label>

                        <label for="Business" class="text-[18px] leading-[21px] line text-dm-heading-color block font-bold">
                            <input type="checkbox" id="Business" v-model="form.profession" value="business"
                                   class="mr-3">
                            <span class="ml-2">Manager or Business Owner</span>
                        </label>

                        <label for="other" class="text-[18px] leading-[21px] line text-dm-heading-color block font-bold">
                            <input type="checkbox" id="other" v-model="form.profession" value="other" class="mr-3">
                            <span class="ml-2">Other</span>
                        </label>

<!--                        <div class="text-red-500" v-if="errors.profession" v-for="error in profession">-->
<!--                            {{ error }}-->
<!--                        </div>-->
                    </div>

                    <div class="mb-10">
                        <h2 class="text-[32px] leading-[32px] line text-center font-bold -tracking-[2px] mb-[24px]">
                            What’s your design experience?
                        </h2>

                        <label class="text-[18px] leading-[21px] line block text-dm-heading-color font-bold" for="beginner">
                            <input type="radio" id="beginner" v-model="form.experience" value="beginner" class="mr-3">
                            <span class="ml-2"><strong>Beginner</strong> (0-2 years experience)</span>
                        </label>

                        <label class="text-[18px] leading-[21px] line block text-dm-heading-color font-bold" for="intermediate">
                            <input type="radio" id="beginner" v-model="form.experience" value="intermediate" class="mr-3">
                            <span class="ml-2"><strong>Intermediate</strong> (3-5 years experience)</span>
                        </label>

                        <label class="text-[18px] leading-[21px] line block text-dm-heading-color font-bold" for="advanced">
                            <input type="radio" id="beginner" v-model="form.experience" value="advanced" class="mr-3">
                            <span class="ml-2"><strong>Advanced</strong> (5+ years experience)</span>
                        </label>

                        <div class="text-red-500" v-if="errors.experience">{{ errors.experience }} </div>
                    </div>

                    <div class="mb-10">
                        <h2 class="text-[32px] leading-[32px] line text-center font-bold -tracking-[2px] mb-[24px]">
                            Which topic you want to learn?
                        </h2>


                        <label for="figma" class="text-[18px] leading-[21px] line text-dm-heading-color block font-bold">
                            <input type="checkbox" id="figma" v-model="form.learning" value="figma" class="mr-3">
                            <span class="ml-2">Figma</span>
                        </label>

                        <label for="interface" class="text-[18px] leading-[21px] line text-dm-heading-color block font-bold">
                            <input type="checkbox" id="interface" v-model="form.learning" value="interface" class="mr-3">
                            <span class="ml-2">User Interface (UI)</span>
                        </label>

                        <label for="Business" class="text-[18px] leading-[21px] line text-dm-heading-color block font-bold">
                            <input type="checkbox" id="Business" v-model="form.learning" value="business" class="mr-3">
                            <span class="ml-2">User Experience (UX)</span>
                        </label>

                        <label for="job" class="text-[18px] leading-[21px] line text-dm-heading-color block font-bold">
                            <input type="checkbox" id="job" v-model="form.learning" value="job" class="mr-3">
                            <span class="ml-2">UX Jobs</span>
                        </label>

<!--                        <div class="text-red-500" v-if="errors.learning" v-for="error in learning">-->
<!--                            {{ error }}-->
<!--                        </div>-->
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

