<script setup>
import {useForm, Head} from "@inertiajs/vue3";
import {defineProps, ref, reactive, onMounted, computed} from "vue";
import StepProgress from "../Components/StepProgress.vue";
import Step1 from "@/Components/Steps/Step1.vue";
import Step2 from "@/Components/Steps/Step2.vue";
import Step3 from "@/Components/Steps/Step3.vue";

const stepProgress = ref(0);
const isFormValid = ref(true);
const inputFilled = ref(false);

const props = defineProps({
    onboardings: Object,
    errors: Object,
});

const form = useForm({
    profession: '',
    experience: '',
    learning: []
});

const handleInputFilled = () => {
    inputFilled.value = true;
};


const dataStep = reactive({
    steps: ['Step1', 'Step2', 'Step3'],
    currentStep: 1,
    stepTemplate: [Step1, Step2, Step3],
    activeCurrentColor: "#643ef3",
    passiveColor: "#F2F3F3",
    handleInputFilled,
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

// Modify isNextButtonDisabled computed property
const isNextButtonDisabled = computed(() => {
	if (dataStep.currentStep === 0) {
		return !form.profession || !isFormValid.value;
	} else if (dataStep.currentStep === 1) {
		return !form.experience || !isFormValid.value;
	} else if (dataStep.currentStep === 2) {
		return form.learning.length === 0 || !isFormValid.value;
	}
	return !isFormValid.value;
});

// Modify isLetsStartButtonDisabled computed property
const isLetsStartButtonDisabled = computed(() => {
	// Add any additional checks if needed
	return !isFormValid.value;
});

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
                            :disabled="isNextButtonDisabled"
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

