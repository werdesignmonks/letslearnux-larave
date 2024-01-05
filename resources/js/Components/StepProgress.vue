<script setup>

import { defineProps, ref, computed, getCurrentInstance } from 'vue';


const props = defineProps({
    formData: Object,
    errors: Object,
    from: Object,
    ctx: Object,
});

props.formData.currentStep--;

const data = ref(props.formData);
const { emit } = getCurrentInstance();

const cssStyle = computed(() => {
    return {
        '--active-color': data.value.activeCurrentColor,
        '--passive-color': data.value.passiveColor,
    }
});

const nextStep = () => {
    if(data.value.currentStep < data.value.steps.length - 1) {
        data.value.currentStep++;
        emit('step-change', data.value.currentStep);
    }
}

const prevStep = () => {
    if(data.value.currentStep > 0) {
        data.value.currentStep--;
        emit('step-change', data.value.currentStep);
    }
}

defineExpose({
    nextStep,
    prevStep,
});

</script>

<template>

    <div class="step-container" :style="cssStyle">
        <ul class="steps mb-5 sm:mb-12">
            <li class="step" v-for="(step, index) in data.steps" :key="index" :class="{
                'step-active': index === data.currentStep,
                'step-complete': index < data.currentStep,
                'step-current': index === 0 && index == data.currentStep,
                'hidden': index === data.steps.length -1
                }">
<!--                <div class="step__bubble"></div>-->
                <div class="step__line" >
                    <div class="step__line-fill"></div>
                </div>
            </li>
        </ul>

        <div class="step-content">
            <component :is="data.stepTemplate[data.currentStep]" :form="from" :errors="errors" />
        </div>
    </div>

</template>

<style scoped>
.step-container {
    width: 70%;
    margin: 0 auto;
}

@media(max-width: 576px) {
    .step-container {
        width: 90%;
    }
}

.steps {
    display: flex;
    list-style: none;
    padding: 0;
    justify-content: space-between;
    max-width: 1070px;
    margin: 0 auto;
}

.step {
    position: relative;
    display: flex;
    align-items: center;
    flex-grow: 1;
    max-width: 100%;
    height: 60px;
}

.step__bubble {
    position: relative;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background-color: var(--passive-color);
    transition: background-color 0.3s ease;
}

.step__line {
    position: absolute;
    flex-grow: 1;
    width: 100%;
    height: 12px;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    background-color: var(--passive-color);
    transition: background-color 0.3s ease;
    z-index: -1;
}

.step:first-child .step__line {
    border-radius: 10px 0 0 10px;
    overflow: hidden;
}

.step__line:nth-child(-n+1) {
    border-radius: 0 10px 10px 0;
}

.step__line-fill {
    width: 0;
    height: 100%;
    background-color: var(--active-color);
    transition: transform 0.3s ease;

}

.step-active .step__line-fill {
    border-radius: 0 10px 10px 0;
}

.step-complete .step__line-fill {
    width: 100%;
    transition: transform 0.3s ease;

}

.step-complete:not(:first-child) .step__line-fill {
    border-radius: 0 10px 10px 0;
}

.step:last-child .step__line {
    display: none !important;
}

.step-active .step__bubble,
.step-complete .step__bubble {
    background-color: var(--active-color);
}

.step-current .step__line-fill {
    width: 50%;
}

</style>
