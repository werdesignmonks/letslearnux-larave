<script setup>

defineProps({
    errors: Object,
    users: Object,
	isShow: Boolean,
	form: Object,
	submit: Function,
});

</script>

<template>
    <div class="fixed top-0 left-0 w-full h-full bg-[rgba(0,9,19,0.9)] transition ease-in-out delay-150" v-if="isShow" >
	    <div class="w-[512px] bg-white absolute left-[50%] top-[50%] -translate-x-1/2 -translate-y-1/2 rounded-xl p-[32px] opacity-1">
		    <div class="absolute top-[20px] right-[20px] cursor-pointer" @click="isShow = false">
			    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#566474]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
			    </svg>
		    </div>

		    <h1 class="text-[32px] leading-[38px] mb-[16px] font-bold text-gray-900 mb-[8px] -tracking-[2px] text-center">Add resources</h1>

		    <div class="p-4 bg-violet-50 rounded-2xl border border-violet-100 flex-col justify-start items-start gap-1 inline-flex">
			    <h3 class="text-gray-950 text-sm font-bold leading-tight">Guidelines</h3>
			    <ul class="list-disc ml-4 text-sm text-[#566474] mt-3">
				    <li>Content should only be in English.</li>
				    <li>Do not add things you have not evaluated personally.</li>
				    <li>It should strictly be relevant to the topic.</li>
				    <li>It should not be paid or behind a signup.</li>
				    <li>Quality over quantity. Smaller set of quality links is preferred.</li>
			    </ul>
		    </div>

		    <form @submit.prevent="submit">
			    <div class="dm-input-field mt-3">
				    <label for="title" class="text-base text-[#566474] font-medium mb-1">Resource Title <span class="text-red-300">*</span></label>
				    <input type="text" id="title" v-model="form.title" class="dm-input-field__input">
				    <div class="text-red-500" v-if="errors.title">{{ errors.title }}</div>
			    </div>

			    <h3 class="text-base text-[#566474] font-medium mb-1 mt-4">Resource Type</h3>
			    <div class="flex gap-[8px]">
				    <div class="form-check mr-2 inline-flex items-center gap-1">
					    <input type="radio" id="type_video" name="type" v-model="form.type" value="video" class="form-check-input">
					    <label for="type_video" class="form-check-label dmb-0">Video</label>
				    </div>
				    <div class="form-check mr-2 inline-flex items-center gap-1">
					    <input type="radio" id="type_article" name="type" v-model="form.type" value="article"
					           class="form-check-input">
					    <label for="type_article" class="form-check-label dmb-0">Article</label>
				    </div>
				    <div class="form-check mr-2 inline-flex items-center gap-1">
					    <input type="radio" id="type_book" name="type" v-model="form.type" value="book" class="form-check-input">
					    <label for="type_book" class="form-check-label dmb-0">Book</label>
				    </div>
				    <div class="text-red-500" v-if="errors.type">{{ errors.type }}</div>
			    </div>

			    <h3 class="text-base text-[#566474] font-medium mb-1 mt-4">Resource Link</h3>
			    <div class="dm-input-field mt-3">
				    <label for="url" class="dm-input-field__label block">URL <span class="text-red-300">*</span></label>
				    <input type="text" name="url" id="url" v-model="form.url" class="dm-input-field__input">
				    <div class="text-red-500" v-if="errors.url">{{ errors.url }}</div>
			    </div>

			    <div class="text-center mt-5">
				    <button class="dm-btn px-4 text-center w-full" type="submit">
					    Submit Resources
				    </button>
			    </div>
		    </form>
	    </div>
    </div>
</template>

<style scoped>

</style>
