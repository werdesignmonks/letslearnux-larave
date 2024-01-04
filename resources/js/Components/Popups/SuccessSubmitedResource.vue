<script setup>

defineProps({
    errors: Object,
    users: Object,
    isShow: Boolean,
    form: Object,
	dislike: Boolean
});

</script>

<template>
    <div class="fixed top-0 left-0 w-full h-full bg-[rgba(0,9,19,0.9)] transition ease-in-out delay-150" v-if="isShow" >
	    <div class="w-[512px] h-auto bg-white absolute left-[50%] top-[50%] -translate-x-1/2 -translate-y-1/2 rounded-xl px-[32px] py-[60px] opacity-1">
		    <div class="mb-5 relative z-10">
			    <img :src="'../images/success-icon.svg'" alt="cup" class="mx-auto">
		    </div>

		    <div class="text-center">
			    <h1 class="text-[32px] font-bold text-gray-900 mb-[8px] -tracking-[2px]">Your resources are under review</h1>
			    <p class="text-gray-700 tracking-[-0.5px] text-base leading-[25.5px] mb-[24px]">
				    Your diligent efforts and attention to detail are truly appreciated. We’ll check the information and you’ll get an email while approved.
			    </p>
			    <div class="flex items-center gap-2 mt-5">
				    <button class="border border-[#CCCED0] rounded-4xl py-[11px] px-5 font-medium text-base text-[#000913] w-[219px] text-center hover:bg-dm-color-primary hover:text-white hover:border-dm-color-primary transition ease-in-out delay-150" @click="isShow = false">
					    Close
				    </button>

				    <button class="dm-btn w-[219px] px-4 text-center">
					    Submit Another
				    </button>
			    </div>
		    </div>
	    </div>
    </div>
</template>
