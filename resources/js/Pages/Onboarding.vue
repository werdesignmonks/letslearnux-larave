<script setup>
import Onboard from "@/Components/Onboard.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { useForm } from "@inertiajs/vue3";

defineProps({
    onboardings: Object,
    errors: Object
});

// console.log(porps.onboardings)

const form = useForm({
    question_id: '',
    option_id: '',
});

// Make question_id into an array
const question_id = form.question_id.split(',');
console.log(question_id)


console.log(form.option_id)

</script>

<template>

    <div class="py-[20px] h-screen  items-center w-full flex-col justify-center">
        <div class="lg:max-w-[1070px] sm:max-w-[600px] px-5 mx-auto mb-[48px]">
            <div class="w-full bg-[#F2F3F3] rounded-full h-3">
                <div class="bg-dm-color-primary h-3 rounded-full" style="width: 45%"></div>
            </div>
        </div>
        <div class="px-5">
            <div class="border border-dm-border-color rounded-3xl sm:max-w-[520px] sm:min-w-[520px] p-[48px]  mx-auto">
                <form action="" method="POST">
                    <div v-for="(item, index) in onboardings" :key="index" class="mb-10">
                        <h2 class="text-[32px] leading-[32px] line text-center font-bold mb-4 -tracking-[2px] mb-[24px]" >{{ item.title }}</h2>

                        <div v-for="(option, index) in item.options" :key="index">
                            <div v-if="item.type === 'checkbox'" class="flex items-center mb-4">
                                <input type="checkbox" :id="option.id" v-model="question_id" :value="item.id" class="mr-3">
                                <label :for="option.id" class="text-[18px] leading-[21px] line text-dm-heading-color font-bold">{{ option.title }}</label>
                            </div>


                            <div v-else-if="item.type === 'radio'" class="flex items-center mb-4">
                                <input type="radio" :id="option.id" v-model="form.option_id" :value="option.id" class="mr-3">
                                <label :for="option.id" class="text-[18px] leading-[21px] line text-dm-heading-color font-bold">{{ option.title }}</label>
                            </div>

                        </div>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-dm-color-primary text-white rounded-full px-10 py-3 text-[18px] leading-[21px] line font-bold">Submit</button>
                    </div>
                </form>
            </div>


        </div>



    </div>
</template>

<style scoped>

</style>
