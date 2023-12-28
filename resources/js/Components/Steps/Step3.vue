<script setup>

defineProps({
    form: Object,
    errors: Object,
});

</script>

<template>
    <div class="border border-dm-border-color rounded-3xl sm:max-w-[520px] sm:min-w-[520px] p-[48px] mb-10  mx-auto">
        <h2 class="text-[32px] leading-[32px] line text-center font-bold -tracking-[2px] mb-[24px]">
            Which topic you want to learn?
        </h2>

        <div class="flex-col justify-start items-start gap-3 inline-flex">
            <label for="figma" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                <input type="checkbox" id="figma" v-model="form.learning" value="figma" class="mr-3">
                <span class="text-gray-950 text-base font-medium leading-relaxed">Figma</span>
            </label>

            <label for="interface" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                <input type="checkbox" id="interface" v-model="form.learning" value="interface" class="mr-3">
                <span class="text-gray-950 text-base font-medium leading-relaxed">User Interface (UI)</span>
            </label>

            <label for="Business" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                <input type="checkbox" id="Business" v-model="form.learning" value="business" class="mr-3">
                <span class="text-gray-950 text-base font-medium leading-relaxed">User Experience (UX)</span>
            </label>

            <label for="job" class="w-[424px] h-[66px] p-5 bg-stone-50 rounded-3xl border border-neutral-200 justify-start items-center gap-2.5 inline-flex">
                <input type="checkbox" id="job" v-model="form.learning" value="job" class="mr-3">
                <span class="text-gray-950 text-base font-medium leading-relaxed">UX Jobs</span>
            </label>

            <div class="text-red-500" v-if="errors.learning">{{ errors.learning }} </div>
        </div>
    </div>
</template>
