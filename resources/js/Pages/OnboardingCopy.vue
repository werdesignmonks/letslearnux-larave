<script setup>
import { useForm, Head } from "@inertiajs/vue3";
import { defineProps, ref } from "vue";

defineProps({
    onboardings: Object,
    errors: Object,
});

const form = useForm({
    question_id: '',
    option_id: '',
    option_ids: []
});

function submit() {
    form.post(route('onboardingstore'), {
        onSuccess: () => {
            console.log('success');
        },
        onError: () => {
            console.log('error');
        },
    });
}

</script>

<template>
    <Head title="Onboarding" />

    <div class="py-[20px] h-screen  items-center w-full flex-col justify-center">
        <div class="lg:max-w-[1070px] sm:max-w-[600px] px-5 mx-auto mb-[48px]">
            <div class="w-full bg-[#F2F3F3] rounded-full h-3">
                <div class="bg-dm-color-primary h-3 rounded-full" style="width: 45%"></div>
            </div>
        </div>
        <div class="px-5">
            <div class="border border-dm-border-color rounded-3xl sm:max-w-[520px] sm:min-w-[520px] p-[48px]  mx-auto">
                <form @submit.prevent="submit" method="POST">

                    <div v-for="(item, index) in onboardings" :key="index" class="mb-10">
                        <h2 class="text-[32px] leading-[32px] line text-center font-bold -tracking-[2px] mb-[24px]" >{{ item.title }}</h2>
                        <input type="hidden" v-model="form.question_id">

                        <template v-for="(option, OptionIndex) in item.options" :key="OptionIndex">
                            <label :for="option.id" v-if="item.type === 'checkbox'" class="text-[18px] leading-[21px] line text-dm-heading-color block font-bold">
                                <input type="checkbox" :id="option.id" v-model="form.option_ids" :value="item.id" class="mr-3">
                                {{ option.title }}
                            </label>

                            <label :for="option.id" v-else-if="item.type === 'radio'" class="text-[18px] leading-[21px] line block text-dm-heading-color font-bold">
                                <input type="radio" :id="option.id" v-model="form.option_id" :value="item.id" class="mr-3">
                                {{ option.title }}
                            </label>
                        </template>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

