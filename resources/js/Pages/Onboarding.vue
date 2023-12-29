<script setup>
import {useForm, Head} from "@inertiajs/vue3";
import {defineProps, ref, reactive, onMounted} from "vue";
import StepProgress from "../Components/StepProgress.vue";
import Step1 from "@/Components/Steps/Step1.vue";
import Step2 from "@/Components/Steps/Step2.vue";
import Step3 from "@/Components/Steps/Step3.vue";

const stepProgress = ref(0);
const isFormValid = ref(true);

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

// :disabled="!isFormValid"

onMounted(validateForm);

</script>

<template>
    <Head title="Onboarding"/>

    <div class="h-screen items-center w-full flex-col justify-center">

        <div class="min-h-screen">
            <form @submit.prevent="submit" method="POST" class="flex flex-col justify-between h-full min-h-screen">
                <StepProgress
                    :formData="dataStep"
                    :from="form"
                    :errors="props.errors" ref="stepProgress"
                    @step-change="handleStepChange"/>

                <div class="py-3 bg-violet-50">
                    <div class="max-w-5xl mx-auto flex items-center " :class="dataStep.currentStep === 0 ? 'justify-end' : 'justify-between' ">
                        <button
                            type="button" v-if="dataStep.currentStep > 0" @click="stepProgress.prevStep"
                            class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold">
                            Back
                        </button>

                        <button
                            type="button" v-if="dataStep.currentStep < dataStep.steps.length - 1"
                            @click="stepProgress.nextStep"
                            class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold disabled:opacity-25">
                            Next
                        </button>

                        <button
                            type="submit" v-if="dataStep.currentStep === dataStep.steps.length - 1"
                            class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold disabled:opacity-25">
                            Let’s Start
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</template>

