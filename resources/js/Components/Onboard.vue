<script >
    import RadioGroupInput from "@/Components/RadioGroupInput.vue";
    import { computed } from "vue";
    import { Vue3MultiStepper } from "vue3-multi-stepper";

    export default {
        components: {
            Vue3MultiStepper,
        },
        name: "App",
        data() {
            return {
                step: 1,
                loading: false,
                // NB: Use computed properties just in case you intend using translations (e.g this.$t)
                tabs: computed(() => {
                    return [
                        {
                            title: "Company",
                            iconSuccess: null,
                            isValid: true,
                        },
                        {
                            title: "Company Additional Info",
                            iconSuccess: null,
                            isValid: true,
                        },
                        {
                            title: "Employees",
                            iconSuccess: null,
                            isValid: true,
                        },

                        {
                            title: "Your Details",
                            iconSuccess: null,
                            isValid: true,
                        },
                        {
                            title: "Verification",
                            iconSuccess: null,
                            isValid: true,
                        },
                    ];
                }),
            };
        },

        methods: {
            async handleFormSubmission() {
                this.loading = true;

                // After 2 seconds, reload the page and start the flow again
                setTimeout(() => {
                    location.reload();
                }, 2000);
            },

            validateStep(step) {
                // Perform validation based on the current step
                // Return true if the step is valid, otherwise return false
                if (step === 1) {
                    return this.step1Check();
                } else if (step === 2) {
                    return this.step2Check();
                } else if (step === 3) {
                    return this.step3Check();
                } else if (step === 4) {
                    return this.step4Check();
                }

                return true; // Default to true if no validation is implemented
            },


            /* <<<CHECKER FUNCTIONS>>>
             * These functions are responsible for performing a check or validation and returning a boolean value.
             * If the returned value is `true`, it indicates that the check has passed successfully, allowing the code to proceed to the next step in the JavaScript execution flow.
             *
             * This function is commonly used in multi-step processes or conditional branching scenarios. It helps determine whether the conditions required for the next step to be executed have been met.
             *
             * The implementation details of the check performed in each function may vary depending on the specific requirements of the software being developed. It could involve verifying certain data, validating user input, or checking the state of the application.
             *
             * Upon receiving a `true` result from the function, the calling code can safely proceed to execute the subsequent steps or perform further actions. If `false` is returned, it indicates that the check failed, and appropriate actions can be taken to handle the failed condition.
             *
             * It is important to note that this function plays a crucial role in determining whether the code can progress to the next step based on the successful completion of a specific check or condition.
             *
             * @returns {boolean} - `true` if the check succeeds, allowing the code to proceed to the next step; `false` if the check fails, indicating the need for alternative actions.
             */

            step1Check() {
                return true;
            },
            step2Check() {
                return true;
            },
            step3Check() {
                return true;
            },
            step4Check() {
                return true;
            },
            step5Check() {
                return true;
            },
        },
    };
</script>

<template>

    <Vue3MultiStepper
        v-model:step="step"
        :tabs="tabs"
        primaryColor1="#79031D"
        primaryColor2="#F2E6E8"
        backText="Go Back"
        nextText="Next"
        doneText="Finish"
        :loading="loading"
        :finalize="handleFormSubmission"
        :validateStep="validateStep"
    >
        <template #1>Step One Content</template>
        <template #2>Step Two Content</template>
        <template #3>Step Three Content</template>
    </Vue3MultiStepper>

    <h2 class="text-[32px] leading-[38px] line text-center font-bold mb-4 -tracking-[2px] mb-[24px]">Which describes you best?</h2>
    <div class="radio-group">
        <RadioGroupInput name="profession" label="Student" />
        <RadioGroupInput name="profession" label="Professional" />
        <RadioGroupInput name="profession" label="Manager or Business Owner" />
        <RadioGroupInput name="profession" label="Other" />
    </div>

</template>

<style scoped>

</style>
