<script setup>

const props = defineProps({
    form: Object,
    errors: Object,
});

</script>

<template>
    <div class="border border-neutral-200 rounded-[48px] sm:max-w-[520px] sm:min-w-[520px] p-12 mb-10 mx-auto">
        <h2 class="text-[32px] leading-[38.40px] text-gray-950 text-center font-bold -tracking-[2px] mb-[24px]">
            Which describes you best?
        </h2>
        <div class="flex-col justify-start items-start gap-3 inline-flex">
            <label for="student"
                   class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                <input
                    type="radio" id="student" v-model="form.profession" value="student"
                    class="before:content[''] peer relative h-5 w-5 bg-zinc-100 cursor-pointer appearance-none rounded-full border border-neutral-300 text-gray-900 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-dm-color-primary before:opacity-0 before:transition-opacity checked:border-[#643ef3] checked:bg-dm-color-primary checked:before:bg-dm-color-primary">

                    <span class="text-gray-950 text-base font-medium leading-relaxed">Student</span>
            </label>

            <label for="professional"
                   class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                <input type="radio" id="professional" v-model="form.profession" value="professional"
                       class="before:content[''] peer relative h-5 w-5 bg-zinc-100 cursor-pointer appearance-none rounded-full border border-neutral-300 text-gray-900 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-dm-color-primary before:opacity-0 before:transition-opacity checked:border-[#643ef3] checked:bg-dm-color-primary checked:before:bg-dm-color-primary">
                <span class="text-gray-950 text-base font-medium leading-relaxed">Professional</span>
            </label>

            <label for="business"
                   class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                <input type="radio" id="business" v-model="form.profession" value="business"
                       class="before:content[''] peer relative h-5 w-5 bg-zinc-100 cursor-pointer appearance-none rounded-full border border-neutral-300 text-gray-900 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-dm-color-primary before:opacity-0 before:transition-opacity checked:border-[#643ef3] checked:bg-dm-color-primary checked:before:bg-dm-color-primary">
                <span class="text-gray-950 text-base font-medium leading-relaxed">Manager or Business Owner</span>
            </label>

            <label for="other"
                   class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                <input type="radio" id="other" v-model="form.profession" value="other"
                       class="before:content[''] peer relative h-5 w-5 bg-zinc-100 cursor-pointer appearance-none rounded-full border border-neutral-300 text-gray-900 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-dm-color-primary before:opacity-0 before:transition-opacity checked:border-[#643ef3] checked:bg-dm-color-primary checked:before:bg-dm-color-primary">
                <span class="text-gray-950 text-base font-medium leading-relaxed">Other</span>
            </label>

            <div class="text-red-500 text-center w-full" v-if="errors.profession">{{ errors.profession }}</div>
        </div>
    </div>
</template>
