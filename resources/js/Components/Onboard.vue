<script >
    import RadioGroupInput from "@/Components/RadioGroupInput.vue";
    import { computed } from "vue";

</script>

<template>
    <h2 class="text-[32px] leading-[38px] line text-center font-bold mb-4 -tracking-[2px] mb-[24px]">Which describes you best?</h2>
    <div class="radio-group">
        <RadioGroupInput name="profession" label="Student" />
        <RadioGroupInput name="profession" label="Professional" />
        <RadioGroupInput name="profession" label="Manager or Business Owner" />
        <RadioGroupInput name="profession" label="Other" />
    </div>

</template>

