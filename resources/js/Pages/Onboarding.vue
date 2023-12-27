<script setup>
import {useForm, Head} from "@inertiajs/vue3";
import {defineProps, ref} from "vue";


defineProps({
    onboardings: Object,
    errors: Object,
});

const form = useForm({
    profession: '',
    experience: '',
    learning: []
});

function submit() {
    form.post(route('onboardingStore'), {
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
            <form @submit.prevent="submit" method="POST">
                <div class="border border-neutral-200 rounded-[48px] sm:max-w-[520px] sm:min-w-[520px] p-12 mb-10 mx-auto">
                    <h2 class="text-[32px] leading-[38.40px] text-gray-950 text-center font-bold -tracking-[2px] mb-[24px]">
                        Which describes you best?
                    </h2>
                    <div class="flex-col justify-start items-start gap-3 inline-flex">
                        <label for="student" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                            <input type="radio" id="student" v-model="form.profession" value="student" class="w-5 h-5 bg-zinc-100 rounded-[100px] border border-neutral-300">
                            <span class="text-gray-950 text-base font-medium leading-relaxed">Student</span>
                        </label>

                        <label for="professional" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                            <input type="radio" id="professional" v-model="form.profession" value="professional" class="w-5 h-5 bg-zinc-100 rounded-[100px] border border-neutral-300">
                            <span class="text-gray-950 text-base font-medium leading-relaxed">Professional</span>
                        </label>

                        <label for="business" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                            <input type="radio" id="business" v-model="form.profession" value="business" class="w-5 h-5 bg-zinc-100 rounded-[100px] border border-neutral-300">
                            <span class="text-gray-950 text-base font-medium leading-relaxed">Manager or Business Owner</span>
                        </label>

                        <label for="other" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                            <input type="radio" id="other" v-model="form.profession" value="other" class="w-5 h-5 bg-zinc-100 rounded-[100px] border border-neutral-300">
                            <span class="text-gray-950 text-base font-medium leading-relaxed">Other</span>
                        </label>

                        <div class="text-red-500" v-if="errors.profession">{{ errors.profession }} </div>
                    </div>
                </div>

                <div class="border border-dm-border-color rounded-3xl sm:max-w-[520px] sm:min-w-[520px] p-[48px] mb-10  mx-auto">
                    <h2 class="text-[32px] leading-[38.40px] text-gray-950 text-center font-bold -tracking-[2px] mb-[24px]">
                        What’s your design experience?
                    </h2>
                    <div class="flex-col justify-start items-start gap-3 inline-flex">
                        <label for="beginner" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                            <input type="radio" id="beginner" v-model="form.experience" value="beginner" class="w-5 h-5 bg-zinc-100 rounded-[100px] border border-neutral-300">
                            <span class="text-gray-950 text-base font-medium leading-relaxed"><strong>Beginner</strong> (0-2 years experience)</span>
                        </label>

                        <label for="intermediate" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                            <input type="radio" id="intermediate" v-model="form.experience" value="intermediate" class="w-5 h-5 bg-zinc-100 rounded-[100px] border border-neutral-300">
                            <span class="text-gray-950 text-base font-medium leading-relaxed"><strong>Intermediate</strong> (3-5 years experience)</span>
                        </label>

                        <label for="advanced" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                            <input type="radio" id="advanced" v-model="form.experience" value="advanced" class="w-5 h-5 bg-zinc-100 rounded-[100px] border border-neutral-300">
                            <span class="text-gray-950 text-base font-medium leading-relaxed"><strong>Advanced</strong> (5+ years experience)</span>
                        </label>

                        <div class="text-red-500" v-if="errors.experience">{{ errors.experience }} </div>
                    </div>
                </div>

                <div class="border border-dm-border-color rounded-3xl sm:max-w-[520px] sm:min-w-[520px] p-[48px] mb-10  mx-auto">
                    <h2 class="text-[32px] leading-[32px] line text-center font-bold -tracking-[2px] mb-[24px]">
                        Which topic you want to learn?
                    </h2>

                    <div class="flex-col justify-start items-start gap-3 inline-flex">
                        <label for="figma" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                            <input type="checkbox" id="figma" v-model="form.learning" value="figma" class="mr-3">
                            <span class="text-gray-950 text-base font-medium leading-relaxed">Figma</span>
                        </label>

                        <label for="interface" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                            <input type="checkbox" id="interface" v-model="form.learning" value="interface" class="mr-3">
                            <span class="text-gray-950 text-base font-medium leading-relaxed">User Interface (UI)</span>
                        </label>

                        <label for="Business" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                            <input type="checkbox" id="Business" v-model="form.learning" value="business" class="mr-3">
                            <span class="text-gray-950 text-base font-medium leading-relaxed">User Experience (UX)</span>
                        </label>

                        <label for="job" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                            <input type="checkbox" id="job" v-model="form.learning" value="job" class="mr-3">
                            <span class="text-gray-950 text-base font-medium leading-relaxed">UX Jobs</span>
                        </label>

                        <div class="text-red-500" v-if="errors.learning">{{ errors.learning }} </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

