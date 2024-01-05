<script setup>

defineProps({
    form: Object,
    errors: Object,
});

</script>

<template>
    <div class="border border-dm-border-color rounded-3xl sm:max-w-[520px] sm:min-w-[520px] p-[48px] mb-10  mx-auto">
        <h2 class="text-[32px] leading-[38.40px] text-gray-950 text-center font-bold -tracking-[2px] mb-[24px]">
            What’s your design experience?
        </h2>
        <div class="flex-col justify-start items-start gap-3 inline-flex dm-radio-field w-full">
            <label for="beginner" class="w-full h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex transition-all duration-300 ease-in-out cursor-pointer">
                <input type="radio" id="beginner" v-model="form.experience" value="beginner"
                       class="appearance-none peer relative h-5 w-5 bg-zinc-100 cursor-pointer rounded-full border border-neutral-300 text-gray-900 transition-all checked:border-[#7A49FF]">
                <span class="text-gray-950 text-base font-medium leading-relaxed"><strong>Beginner</strong> (0-2 years experience)</span>
            </label>

            <label for="intermediate" class="w-full h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex transition-all duration-300 ease-in-out cursor-pointer">
                <input type="radio" id="intermediate" v-model="form.experience" value="intermediate"
                       class="appearance-none peer relative h-5 w-5 bg-zinc-100 cursor-pointer rounded-full border border-neutral-300 text-gray-900 transition-all checked:border-[#7A49FF]">
                <span class="text-gray-950 text-base font-medium leading-relaxed"><strong>Intermediate</strong> (3-5 years experience)</span>
            </label>

            <label for="advanced" class="w-full h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex transition-all duration-300 ease-in-out cursor-pointer">
                <input type="radio" id="advanced" v-model="form.experience" value="advanced"
                       class="appearance-none peer relative h-5 w-5 bg-zinc-100 cursor-pointer rounded-full border border-neutral-300 text-gray-900 transition-all checked:border-[#7A49FF]">
                <span class="text-gray-950 text-base font-medium leading-relaxed"><strong>Advanced</strong> (5+ years experience)</span>
            </label>

            <div class="text-red-500 text-center w-full" v-if="errors.experience">{{ errors.experience }} </div>
        </div>
    </div>
</template>
