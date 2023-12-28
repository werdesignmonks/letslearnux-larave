<script setup>
import {useForm, Head} from "@inertiajs/vue3";
import {defineProps, ref} from "vue";
import StepProgress from "../Components/StepProgress.vue";
import Step1 from "@/Components/Steps/Step1.vue";
import Step2 from "@/Components/Steps/Step2.vue";
import Step3 from "@/Components/Steps/Step3.vue";

const stepProgress = ref(0);

const props = defineProps({
    onboardings: Object,
    errors: Object,
});

const form = useForm({
    profession: '',
    experience: '',
    learning: []
});

const dataStep = {
    steps: ['Step1', 'Step2', 'Step3'],
    currentStep: 1,
    stepTemplate: [Step1, Step2, Step3],
    activeCurrentColor: "#643ef3",
    passiveColor: "#F2F3F3",
}




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

<!--    <StepProgress :step="1" :total="3" />-->

    <div class="py-[20px] h-screen  items-center w-full flex-col justify-center">
        <div class="lg:max-w-[1070px] sm:max-w-[600px] px-5 mx-auto mb-[48px]">
            <div class="w-full bg-[#F2F3F3] rounded-full h-3">
                <div class="bg-dm-color-primary h-3 rounded-full" style="width: 45%"></div>
            </div>
        </div>
        <div class="px-5">
            <form @submit.prevent="submit" method="POST">
<!--                <Step1 :form="form" :errors="errors" />-->
<!--                <Step2 :form="form" :errors="errors" />-->
<!--                <Step3 :form="form" :errors="errors" />-->
                <StepProgress :formData="dataStep"  :from="form" :errors="props.errors" ref="stepProgress" />

                <div class="flex justify-center">

                    <button type="button" @click="stepProgress.prevStep"  class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold">
                        Previous
                    </button>

                    {{
                        console.log(stepProgress.currentStep)
                    }}

                    <button type="button" @click="stepProgress.nextStep" class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold">
                        Next
                    </button>

                    <button type="submit" class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>
</template>

