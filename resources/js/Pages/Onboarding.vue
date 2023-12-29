<script setup>
import {useForm, Head} from "@inertiajs/vue3";
import {defineProps, ref, reactive, onMounted} from "vue";
import StepProgress from "../Components/StepProgress.vue";
import Step1 from "@/Components/Steps/Step1.vue";
import Step2 from "@/Components/Steps/Step2.vue";
import Step3 from "@/Components/Steps/Step3.vue";

const stepProgress = ref(0);
const isFormValid = ref(false);

const props = defineProps({
    onboardings: Object,
    errors: Object,
});

const form = useForm({
    profession: '',
    experience: '',
    learning: []
});

const dataStep = reactive({
    steps: ['Step1', 'Step2', 'Step3'],
    currentStep: 1,
    stepTemplate: [Step1, Step2, Step3],
    activeCurrentColor: "#643ef3",
    passiveColor: "#F2F3F3",
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

console.log(form.profession);

const validateForm = () => {
    // Add your validation logic here for radio buttons and checkboxes

    isFormValid.value = form.profession !== '';
    // isFormValid.value = form.profession !== '' && (form.experience !== '' && form.learning.length > 0);
};

onMounted(validateForm);

</script>

<template>
    <Head title="Onboarding"/>

    <div class="py-[20px] h-screen  items-center w-full flex-col justify-center">

        <div class="px-5">
            <form @submit.prevent="submit" method="POST">
                <StepProgress :formData="dataStep" :from="form" :errors="props.errors" ref="stepProgress" @step-change="handleStepChange" />

                <div class="flex justify-center">

                    <button type="button" v-if="dataStep.currentStep > 0" @click="stepProgress.prevStep"  class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold">
                        Previous
                    </button>

                    <button type="button" :disabled="!isFormValid" v-if="dataStep.currentStep < dataStep.steps.length - 1" @click="stepProgress.nextStep" class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold disabled:opacity-25">
                        Next
                    </button>

                    <button type="submit" :disabled="!isFormValid" v-if="dataStep.currentStep === dataStep.steps.length - 1" class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold disabled:opacity-25">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>
</template>

