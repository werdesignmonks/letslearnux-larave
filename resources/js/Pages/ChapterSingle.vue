<script setup>
import {ref} from 'vue';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from '@inertiajs/vue3';
import Image from "@/Components/Image.vue";
import Card from "@/Pages/Roadmap/Card.vue";
import SocialShare from "@/Components/SocialShare.vue";
import VideoCard from "@/Pages/Roadmap/VideoCard.vue";
import Book from "@/Pages/Roadmap/Book.vue";
import SubmitResource from "@/Pages/Roadmap/SubmitResource.vue";
import ContributorList from "@/Pages/Roadmap/ContributorList.vue";
import TextInput from "@/Components/TextInput.vue";
import RadioInput from "@/Components/RadioInput.vue";
import InputLabel from "@/Components/InputLabel.vue";

const img = ref('images/youtube-1.png');
const modalComplete = ref(false);
const modalAddResource = ref(false);
const feebback = ref('');
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();
const previewUrl = ref('../../images/placeholder-image.jpg');
const lessonId = ref();

const props = defineProps({
    lesson: Array,
    errors: Object,
});

const form = useForm({
    title: '',
    url: '',
    image: '',
    lesson_id: lessonId,
    type: '',
});

const uploadImage = (event) => {
    const file = event.target.files[0];
    form.image = file;

    // const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();

        reader.onload = (e) => {
            previewUrl.value = e.target.result;
        };

        reader.readAsDataURL(file);
    } else {
        previewUrl.value = '';
    }
};

function submit() {
    form.post(route('addresource.store'), {
        preserveScroll: true,
        onSuccess: (page) => {
	        modalAddResource.value = false;

            $toast.open({
                message: 'User Created Successfully!',
                type: 'success',
                position: 'top-right',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #00b09b, #96c93d)',
                },
            });
        },
        onError: (errors) => {
            console.log(errors)

            $toast.open({
                message: 'Please fill all the fields',
                type: 'warning',
                position: 'top-right',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #FF0000, #FF6347)',
                },
            });
        }
    })

    // Clearing the form after submit

    form.title = '';
    form.url = '';
    form.image = '';
    form.lesson_id = '';
    form.type = '';
}


</script>

<template>
    <Head title="1.1 - Evaluate your English language skill, IQ, mindset" />
    <AuthenticatedLayout>
        <div class="max-w-[1100px] px-[15px] mx-auto">
            <h1 class="font-bold text-[32px] leading-[38px] mb-6">
                {{  lesson.custom_sl }} - {{  lesson.title }}
            </h1>

            <div class="mb-10" v-html="lesson.description"></div>

            <div>
                <h2 class="mb-4 leading-7 font-bold text-[20px]">
                    Youtube videos
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-5">
                    <VideoCard :title="item.title" :image="item.image" v-for="(item, index) in lesson.resource" />
                </div>
            </div>

            <hr class="mt-9 mb-8 block">

            <div>
                <h2 class="mb-4 leading-7 font-bold text-[20px]">
                    Topic Links
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-5">
                    <Card title="Free English Level Test. How good is your English?" src='../images/card-1.png' url="https://www.cambridgeenglish.org/test-your-english/" />
                    <Card title="Free English Level Test. How good is your English?" src="../images/card-1.png" url="https://www.cambridgeenglish.org/test-your-english/" />
                    <Card title="Free English Level Test. How good is your English?" src="../images/card-1.png" url="https://www.cambridgeenglish.org/test-your-english/" />
                    <Card title="Free English Level Test. How good is your English?" src="../images/card-1.png" url="https://www.cambridgeenglish.org/test-your-english/" />
                </div>
            </div>

            <hr class="mt-9 mb-6 block">

            <div>
                <h2 class="mb-4 leading-7 font-bold text-[20px]">
                    Related books
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-5">
                    <Book title="Free English Level Test. How good is your English?" src='../images/book.jpg' url="https://www.cambridgeenglish.org/test-your-english/" />
                </div>
            </div>

            <hr class="mt-9 mb-6 block">

            <SocialShare  />

            <div class="mt-[48px]">
                <SubmitResource @click="modalAddResource = true" />
            </div>
        </div>
    </AuthenticatedLayout>

    <div class="bg-dm-bg-color py-4">
        <div class="max-w-[1100px] px-[15px] mx-auto flex justify-end">
          <button class="border border-[#CCCED0] rounded-4xl flex items-center gap-2 py-[11px] px-5 font-medium text-base text-[#000913] hover:bg-dm-color-primary hover:text-white hover:border-dm-color-primary transition ease-in-out delay-150" @click="modalComplete = true">
              <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.5" width="20" height="20" rx="10" fill="#08A965"/>
                  <path d="M15.3337 6.5L8.00033 13.8333L4.66699 10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              Mark as Complete
          </button>
        </div>
    </div>

    <div class="fixed top-0 left-0 w-full h-full bg-[rgba(0,9,19,0.9)] transition ease-in-out delay-150" v-if="modalComplete" @click="modalComplete = false">
<!--        <div class="w-[512px] h-[512px] bg-white absolute left-[50%] top-[50%] -translate-x-1/2 -translate-y-1/2 rounded-xl px-[32px] py-[60px] opacity-1">-->
<!--            <img :src="'../images/illistation.svg'" alt="cup" class="w-full absolute top-0 left-0 z-[-1]">-->
<!--            <div class="mb-5 relative z-10">-->
<!--                <img :src="'../images/cup.svg'" alt="cup" class="mx-auto">-->
<!--            </div>-->

<!--            <div class="text-center">-->
<!--                <h1 class="text-[32px] font-bold text-gray-900 mb-[8px] -tracking-[2px]">Chapter 1 completed</h1>-->
<!--                <p class="text-gray-700 tracking-[-0.5px] text-base leading-[25.5px] mb-[24px] ">Your diligent efforts and attention to detail are truly appreciated. We’ll check the information and updated to the lessons.</p>-->
<!--                <div class="flex items-center gap-2 mt-5">-->
<!--                    <button class="border border-[#CCCED0] rounded-4xl py-[11px] px-5 font-medium text-base text-[#000913] w-[219px] text-center hover:bg-dm-color-primary hover:text-white hover:border-dm-color-primary transition ease-in-out delay-150">-->
<!--                        Back to Home-->
<!--                    </button>-->

<!--                    <button class="dm-btn w-[219px] px-4 text-center">-->
<!--                        Share Your Achievement-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <div class="w-[512px] h-auto bg-white absolute left-[50%] top-[50%] -translate-x-1/2 -translate-y-1/2 rounded-xl px-[32px] py-[60px] opacity-1">
            <div class="text-center">
                <h1 class="text-[32px] font-bold text-gray-900 mb-[8px] -tracking-[2px]">Help us to improve!</h1>
                <p class="text-gray-700 tracking-[-0.5px] text-base leading-[25.5px] mb-[24px]">
                    Your insights are crucial. Tell us how we can enhance your learning experience on this topic.
                </p>
                <form>
                    <div class="text-left text-base font-medium tracking[-0.5px] mb-[4px]">
                        Your Feedback <span class="text-[#F87171]">*</span>
                    </div>
                    <textarea v-model="feebback" placeholder="Write your feedback" class="w-full h-[120px]  border-[#E5E6E7] rounded-md "></textarea>
                    <div class="flex items-center gap-2 mt-5">
                        <button class="border border-[#CCCED0] rounded-4xl py-[11px] px-5 font-medium text-base text-[#000913] w-[219px] text-center hover:bg-dm-color-primary hover:text-white hover:border-dm-color-primary transition ease-in-out delay-150">
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

    <!-- Resource Popup -->
    <div class="fixed top-0 left-0 w-full h-full bg-[rgba(0,9,19,0.9)] transition ease-in-out delay-150" v-if="modalAddResource" >
        <div class="w-[512px]  min-h-screen h-full overflow-auto bg-white absolute left-[50%] top-[50%] -translate-x-1/2 -translate-y-1/2 rounded-xl p-[32px] opacity-1 relative">

	        <div class="absolute top-[20px] right-[20px] cursor-pointer" @click="modalAddResource = false">
		        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#566474]" fill="none" viewBox="0 0 24 24"
		             stroke="currentColor">
			        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
			              d="M6 18L18 6M6 6l12 12"/>
		        </svg>
	        </div>
            <h1 class="text-[32px] leading-[38px] mb-[16px] font-bold text-gray-900 mb-[8px] -tracking-[2px] text-center">Add resources</h1>

            <div class="bg-dm-color-primary-light border border-[#EFECFE] rounded-lg p-3 mb-4">
                <h3 class="text-base text-[#566474] font-medium">Guidelines</h3>
               <ul class="list-disc ml-4 text-sm text-[#566474] mt-3">
                    <li>Content should only be in English.</li>
                    <li>Do not add things you have not evaluated personally.</li>
                    <li>It should strictly be relevant to the topic.</li>
                    <li>It should not be paid or behind a signup.</li>
                    <li>Quality over quantity. Smaller set of quality links is preferred.</li>
               </ul>
            </div>

            <h3 class="text-base text-[#566474] font-medium mb-1">Chapter Name</h3>
            <p class="border border-dm-border-color rounded-lg bg-[#F2F3F3] p-3 mb-3">
                {{ lesson.chapter.chapter_name }}
            </p>

            <h3 class="text-base text-[#566474] font-medium mb-1">Lesson Name</h3>
            <p class="border border-dm-border-color rounded-lg bg-[#F2F3F3] p-3 mb-3">
                {{  lesson.title }}
            </p>

            <form @submit.prevent="submit">

                {{
                    form.lesson_id = lesson.id
                }}

                <input type="hidden" name="lesson_id" v-model="form.lesson_id">
                <h3 class="text-base text-[#566474] font-medium mb-1">Resource Title</h3>
<!--                <TextInput  placeholder="e.g. Introduction to UI Learning" class="w-full border-[#E5E6E7]" />-->
                <input type="text" v-model="form.title" class="w-full border-[#E5E6E7]">
                <div class="text-red-500" v-if="errors.title">{{ errors.title }}</div>

                <h3 class="text-base text-[#566474] font-medium mb-1 mt-4">Subscription</h3>
                <div class="flex gap-[8px]">
                   <RadioInput label="Free" name="subscription" />
                   <RadioInput label="Paid" name="subscription" />
                </div>

                <h3 class="text-base text-[#566474] font-medium mb-1 mt-4">Resource Type</h3>
                <div class="flex gap-[8px]">
<!--                    <RadioInput label="Article" name="type" />-->
<!--                    <RadioInput label="Video" name="type" />-->
<!--                    <RadioInput label="Book" name="type" />-->


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
<!--                <TextInput  placeholder="e.g. https://uxroadmap/guides/url-4" class="w-full border-[#E5E6E7] " />-->
                <div class="dm-input-field mt-3">
                    <label for="radio-1" class="dm-input-field__label block">URL <span class="text-red-300">*</span></label>
                    <input type="text" name="url" id="url" v-model="form.url" class="dm-input-field__input">
                    <div class="text-red-500" v-if="errors.url">{{ errors.url }}</div>
                </div>

                <div class="dm-input-field dm-preview-image mt-6 relative">
                    <label for="profile-image" class="dm-input-field__label block mb-3">Thumbnail</label>
                    <img :src="previewUrl" v-if="previewUrl" alt="Preview" class="w-[250px]"/>
                    <span v-else>
                        <img :src="previewUrl" alt="Placeholder" class="w-[100px]"/>
                    </span>

                    <div class="dm-input-field__file-remove absolute top-[50px] right-[20px] bg-red-200 rounded p-1"
                         v-if="previewUrl" @click="removeImage">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                </div>
                <div class="dm-input-field">
                    <input type="file" id="profile-image" name="profile_image" @change="uploadImage" class="dm-input-field__file">
                    <div class="text-red-500" v-if="errors.image">{{ errors.image }}</div>
                </div>

                <div class="text-center mt-5">
                    <button class="dm-btn px-4 text-center w-full" type="submit">
                        Submit Resources
                    </button>
                </div>
            </form>
        </div>

<!--        <div class="w-[512px] h-auto bg-white absolute left-[50%] top-[50%] -translate-x-1/2 -translate-y-1/2 rounded-xl px-[32px] py-[60px] opacity-1">-->
<!--            <div class="mb-5 relative z-10">-->
<!--                <img :src="'../images/success-icon.svg'" alt="cup" class="mx-auto">-->
<!--            </div>-->

<!--            <div class="text-center">-->
<!--                <h1 class="text-[32px] font-bold text-gray-900 mb-[8px] -tracking-[2px]">Your resources are under review</h1>-->
<!--                <p class="text-gray-700 tracking-[-0.5px] text-base leading-[25.5px] mb-[24px] ">Your diligent efforts and attention to detail are truly appreciated. We’ll check the information and you’ll get-->
<!--                    an email while approved.</p>-->
<!--                <div class="flex items-center gap-2 mt-5">-->
<!--                    <button class="border border-[#CCCED0] rounded-4xl py-[11px] px-5 font-medium text-base text-[#000913] w-[219px] text-center hover:bg-dm-color-primary hover:text-white hover:border-dm-color-primary transition ease-in-out delay-150">-->
<!--                        Close-->
<!--                    </button>-->

<!--                    <button class="dm-btn w-[219px] px-4 text-center">-->
<!--                        Submit Another-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->


<!--        <div class="w-[512px] h-auto bg-white absolute left-[50%] top-[50%] -translate-x-1/2 -translate-y-1/2 rounded-3xl pb-[60px] opacity-1 overflow-hidden">-->
<!--            <div class="mb-[32px] relative z-10 relative">-->
<!--                <img :src="'../images/share-image.png'" alt="cup" class="mx-auto w-full">-->
<!--                <h3 class="text-[20px] text-white font-bold mb-1 mt-4 absolute left-[20px] bottom-[15px]">Learn Figma Tool</h3>-->
<!--            </div>-->

<!--            <h2 class="text-[32px] font-bold mb-[24px] -tracking-[2px] text-center px-4 leading-[38px]">Share this with your social community</h2>-->
<!--            <div class="flex justify-center">-->
<!--                <SocialShare :isShow="false" iconWidth="lg" class="mx-auto" iconBgColor="bg-[#E5E6E7] text-[#566474]" />-->
<!--            </div>-->
<!--        </div>-->
    </div>

</template>

<style scoped>

</style>
