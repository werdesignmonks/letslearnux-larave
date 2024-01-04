<script setup>

defineProps({
    errors: Object,
    users: Object,
    isShow: Boolean,
    form: Object,
	dislike: Function
});

</script>

<template>
    <div class="fixed top-0 left-0 w-full h-full bg-[rgba(0,9,19,0.9)] transition ease-in-out delay-150" v-if="isShow" >
        <div class="w-[512px] h-auto bg-white absolute left-[50%] top-[50%] -translate-x-1/2 -translate-y-1/2 rounded-xl px-[32px] py-[60px] opacity-1">
            <div class="text-center">
                <h1 class="text-[32px] font-bold text-gray-900 mb-[8px] -tracking-[2px]">Help us to improve!</h1>
                <p class="text-gray-700 tracking-[-0.5px] text-base leading-[25.5px] mb-[24px]">
                    Your insights are crucial. Tell us how we can enhance your learning experience on this topic.
                </p>
                <form @submit.prevent="dislike">
                    <div class="text-left text-base font-medium tracking[-0.5px] mb-[4px]">
                        Your Feedback <span class="text-[#F87171]">*</span>
                    </div>
                    <textarea v-model="form.feedback" placeholder="Write your feedback" class="w-full h-[120px]  border-[#E5E6E7] rounded-md "></textarea>
                    <div class="flex items-center gap-2 mt-5">
                        <button @click="isShow = false" class="border border-[#CCCED0] rounded-4xl py-[11px] px-5 font-medium text-base text-[#000913] w-[219px] text-center hover:bg-dm-color-primary hover:text-white hover:border-dm-color-primary transition ease-in-out delay-150">
                            Cancel
                        </button>

                        <button class="dm-btn w-[219px] px-4 text-center">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
