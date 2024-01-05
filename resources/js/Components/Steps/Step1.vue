<script setup>

const props = defineProps({
    form: Object,
    errors: Object,
    handleInputFilled: Function,
});

</script>

<template>
    <div class="border border-neutral-200 rounded-[30px] md:rounded-[48px] sm:rounded-[40px] sm:max-w-[520px] sm:min-w-[300px] px-4 py-8 md:p-12 sm:p-6 mb-10 mx-auto">
        <h2 class="text-[22px] md:text-[32px] sm:text-[24px] leading-[38.40px] text-gray-950 text-center font-bold -tracking-[2px] mb-[16px] sm:mb-[24px]">
            Which describes you best?
        </h2>
        <div class="flex-col justify-start items-start gap-3 inline-flex dm-radio-field w-full">
            <label for="student"
                   class="w-full h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex transition-all duration-300 ease-in-out cursor-pointer">
                <input
                    type="radio" id="student" v-model="form.profession" value="student"
                    class="appearance-none peer relative h-5 w-5 bg-zinc-100 cursor-pointer rounded-full border border-neutral-300 text-gray-900 transition-all checked:border-[#7A49FF]">
                    <span class="text-gray-950 text-base font-medium leading-relaxed">Student</span>
            </label>

            <label for="professional"
                   class="w-full h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex transition-all duration-300 ease-in-out cursor-pointer">
                <input type="radio" id="professional" v-model="form.profession" value="professional"
                       class="apearance-none peer relative h-5 w-5 bg-zinc-100 cursor-pointer rounded-full border border-neutral-300 text-gray-900 transition-all checked:border-[#7A49FF]">
                <span class="text-gray-950 text-base font-medium leading-relaxed">Professional</span>
            </label>

            <label for="business"
                   class="w-full h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex transition-all duration-300 ease-in-out cursor-pointer">
                <input type="radio" id="business" v-model="form.profession" value="business"
                       class="apearance-none peer relative h-5 w-5 bg-zinc-100 cursor-pointer rounded-full border border-neutral-300 text-gray-900 transition-all checked:border-[#7A49FF]">
                <span class="text-gray-950 text-base font-medium leading-relaxed">Manager or Business Owner</span>
            </label>

            <label for="other"
                   class="w-full h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex transition-all duration-300 ease-in-out cursor-pointer">
                <input type="radio" id="other" v-model="form.profession" value="other"
                       class="apearance-none peer relative h-5 w-5 bg-zinc-100 cursor-pointer rounded-full border border-neutral-300 text-gray-900 transition-all checked:border-[#7A49FF]">
                <span class="text-gray-950 text-base font-medium leading-relaxed">Other</span>
            </label>

            <div class="text-red-500 text-center w-full" v-if="errors.profession">{{ errors.profession }}</div>
        </div>
    </div>
</template>
