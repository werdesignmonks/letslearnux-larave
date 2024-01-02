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
const modalSubmitedResource = ref(false);
const modalShareResource = ref(false);
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();
const previewUrl = ref('../../images/placeholder-image.jpg');
const isCompleted = ref(false);


const props = defineProps({
    lesson: Array,
	article_resource: Array,
	video_resource: Array,
	book_resource: Array,
    errors: Object,
    user: Object,
    learnStatus: Object,
    likes: Object,
});

const form = useForm({
    title: '',
    url: '',
    image: '',
    lesson_id: props.lesson.id,
    type: '',
});

const formStatus = useForm({
    user_id: props.user.id,
    chapter_id: props.lesson.chapter_id,
    lesson_id: props.lesson.id,
    is_completed: isCompleted,
});


const uploadImage = (event) => {
    const file = event.target.files[0];
    form.image = file;

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
	        // modalAddResource.value = false;
            //
            // $toast.open({
            //     message: 'User Created Successfully!',
            //     type: 'success',
            //     position: 'top-right',
            //     duration: 5000,
            //     style: {
            //         background: 'linear-gradient(to right, #00b09b, #96c93d)',
            //     },
            // });
            modalSubmitedResource.value = true;
            modalAddResource.value = false;
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

function statusUpdate() {
    formStatus.post(route('lesson.status.update', props.lesson.id), {
        preserveScroll: true,

        onSuccess: (page) => {
            // modalComplete.value = true;
            console.log(page)
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
}

const fromLike = useForm({
    lesson_id: props.lesson.id,
    user_id: props.user.id,
    likes: '',
    dislikes: '',
});

const likeHandaler = () => {
    fromLike.post(route('likes', props.lesson.id), {
        preserveScroll: true,

        onSuccess: (page) => {
            // modalComplete.value = true;
            console.log(page)
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
}


</script>

<template>
    <Head title="1.1 - Evaluate your English language skill, IQ, mindset" />
    <AuthenticatedLayout>
        <div class="max-w-[1100px] px-[15px] mx-auto">
            <h1 class="font-bold text-[32px] leading-[38px] mb-6 flex justify-between">
                {{  lesson.serial }} - {{  lesson.title }}

                <div class="w-32 h-10 px-4 bg-zinc-100 rounded-lg justify-center items-center gap-3 inline-flex">
                    <div class="pr-3 border-r border-neutral-300 justify-center items-center gap-1 flex">
                        <input type="checkbox" id="like" class="peer hidden" v-model="fromLike.likes" />
                        <label for="like" class="text-slate-600 text-base font-bold leading-none flex items-center gap-1" @click="likeHandaler">
                            <span class="w-5 h-5 relative inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <g clip-path="url(#clip0_356_933)">
                                        <path d="M5.83337 8.33337V18.3334" stroke="#643EF3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.5 4.89996L11.6666 8.33329H16.525C16.7837 8.33329 17.0389 8.39353 17.2703 8.50925C17.5017 8.62496 17.703 8.79297 17.8583 8.99996C18.0135 9.20695 18.1185 9.44725 18.1647 9.70182C18.211 9.95638 18.1974 10.2182 18.125 10.4666L16.1833 17.1333C16.0823 17.4795 15.8718 17.7836 15.5833 18C15.2948 18.2163 14.9439 18.3333 14.5833 18.3333H3.33329C2.89127 18.3333 2.46734 18.1577 2.15478 17.8451C1.84222 17.5326 1.66663 17.1087 1.66663 16.6666V9.99996C1.66663 9.55793 1.84222 9.13401 2.15478 8.82145C2.46734 8.50889 2.89127 8.33329 3.33329 8.33329H5.63329C5.94336 8.33313 6.24724 8.24647 6.51076 8.08306C6.77427 7.91965 6.98698 7.68597 7.12496 7.40829L9.99996 1.66663C10.3929 1.67149 10.7797 1.7651 11.1315 1.94046C11.4832 2.11581 11.7907 2.36838 12.0311 2.67929C12.2715 2.99021 12.4386 3.35143 12.5197 3.73596C12.6009 4.1205 12.5942 4.51841 12.5 4.89996Z" stroke="#643EF3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_356_933">
                                            <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </span>
                            {{ props.lesson?.likes ? props.lesson.likes : 0 }}
                        </label>
                    </div>
                    <div class="w-5 h-5 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <g clip-path="url(#clip0_356_935)">
                                <path d="M14.1666 11.6666V1.66663" stroke="#999DA1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.50002 15.1L8.33335 11.6666H3.47502C3.21627 11.6666 2.96109 11.6064 2.72966 11.4907C2.49823 11.375 2.29693 11.207 2.14168 11C1.98644 10.793 1.88152 10.5527 1.83523 10.2981C1.78895 10.0435 1.80257 9.78168 1.87502 9.53329L3.81668 2.86663C3.91766 2.52043 4.12819 2.21633 4.41668 1.99996C4.70518 1.78359 5.05607 1.66663 5.41668 1.66663H16.6667C17.1087 1.66663 17.5326 1.84222 17.8452 2.15478C18.1578 2.46734 18.3333 2.89127 18.3333 3.33329V9.99996C18.3333 10.442 18.1578 10.8659 17.8452 11.1785C17.5326 11.491 17.1087 11.6666 16.6667 11.6666H14.3667C14.0566 11.6668 13.7527 11.7534 13.4892 11.9169C13.2257 12.0803 13.013 12.3139 12.875 12.5916L10 18.3333C9.60704 18.3284 9.22023 18.2348 8.86851 18.0595C8.51679 17.8841 8.20924 17.6315 7.96885 17.3206C7.72845 17.0097 7.56142 16.6485 7.48024 16.264C7.39905 15.8794 7.40581 15.4815 7.50002 15.1Z" stroke="#999DA1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_356_935">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                </div>
            </h1>

            <div class="mb-10" v-html="lesson.description"></div>

            <div v-if="video_resource.length > 0" class="border-b border-dm-border-color pb-8 mb-8">
                <h2 class="mb-4 leading-7 font-bold text-[20px]">
                    Youtube videos
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-5">
                    <VideoCard :title="item.title" :image="item.image" v-for="(item, index) in video_resource" :key="item.id" />
                </div>
            </div>

            <div v-if="article_resource.length > 0" class="border-b border-dm-border-color pb-8 mb-8">
                <h2 class="mb-4 leading-7 font-bold text-[20px]">
                    Topic Links
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-5">
                    <Card :title="item.title" :src='item.image' :url="item.url" v-for="(item, index) in article_resource" :key="item.id" />
                </div>
            </div>

            <div v-if="book_resource.length > 0">
                <h2 class="mb-4 leading-7 font-bold text-[20px]">
                    Related books
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4 gap-5">
                    <Book :title="item.title" :src="item.image" :url="item.url" v-for="(item, index) in book_resource" :key="item.id" />
                </div>
            </div>

<!--            <hr class="mt-9 mb-6 block">-->

            <SocialShare  />

            <div class="mt-[48px]">
                <SubmitResource @click="modalAddResource = true" />
            </div>
        </div>
    </AuthenticatedLayout>

    <div class="bg-dm-bg-color py-4">
        <div class="max-w-[1100px] px-[15px] mx-auto flex justify-end">

            <div class="flex">
                <input type="checkbox" id="choose-me" class="peer hidden" v-model="formStatus.is_completed" v-if="!formStatus.is_completed" @change="statusUpdate" />
                    <label for="choose-me" class="block">

                        <span v-if="!formStatus.is_completed" class="border border-[#CCCED0] rounded-4xl flex items-center gap-2 py-[11px] px-5 font-medium text-base text-[#000913] hover:bg-dm-color-primary hover:text-white hover:border-dm-color-primary transition ease-in-out delay-150 cursor-pointer  peer-checked:text-gray-900 peer-checked:border-gray-200">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect y="0.5" width="20" height="20" rx="10" fill="#08A965"/>
                                <path d="M15.3337 6.5L8.00033 13.8333L4.66699 10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Mark as Complete
                        </span>
                        <span v-else class="text-center text-violet-600 text-base font-medium leading-relaxed flex items-center gap-2 py-[11px] px-5">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect y="0.5" width="20" height="20" rx="10" fill="#643EF3"/>
                                <path d="M15.3337 6.5L8.00033 13.8333L4.66699 10.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Lesson Completed
                        </span>
                    </label>
            </div>
        </div>
    </div>

    <div class="fixed top-0 left-0 w-full h-full bg-[rgba(0,9,19,0.9)] transition ease-in-out delay-150" v-if="modalComplete">
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
    <div class="fixed top-0 left-0 w-full h-full bg-[rgba(0,9,19,0.9)] transition ease-in-out delay-150" v-if="modalSubmitedResource">
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
                    <button class="border border-[#CCCED0] rounded-4xl py-[11px] px-5 font-medium text-base text-[#000913] w-[219px] text-center hover:bg-dm-color-primary hover:text-white hover:border-dm-color-primary transition ease-in-out delay-150" @click="modalSubmitedResource = false">
                        Close
                    </button>

                    <button class="dm-btn w-[219px] px-4 text-center">
                        Submit Another
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed top-0 left-0 w-full h-full bg-[rgba(0,9,19,0.9)] transition ease-in-out delay-150" v-if="modalAddResource" >
        <div class="w-[512px] bg-white absolute left-[50%] top-[50%] -translate-x-1/2 -translate-y-1/2 rounded-xl p-[32px] opacity-1">

	        <div class="absolute top-[20px] right-[20px] cursor-pointer" @click="modalAddResource = false">
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

    <div class="fixed top-0 left-0 w-full h-full bg-[rgba(0,9,19,0.9)] transition ease-in-out delay-150" v-if="modalShareResource = false" >
        <div class="w-[512px] h-auto bg-white absolute left-[50%] top-[50%] -translate-x-1/2 -translate-y-1/2 rounded-3xl pb-[60px] opacity-1 overflow-hidden">
            <div class="mb-[32px] relative z-10 relative">
                <img :src="'../images/share-image.png'" alt="cup" class="mx-auto w-full">
                <h3 class="text-[20px] text-white font-bold mb-1 mt-4 absolute left-[20px] bottom-[15px]">Learn Figma Tool</h3>
            </div>
            <h2 class="text-[32px] font-bold mb-[24px] -tracking-[2px] text-center px-4 leading-[38px]">Share this with your social community</h2>

            <div class="flex justify-center">
                <SocialShare :isShow="false" iconWidth="lg" class="mx-auto" iconBgColor="bg-[#E5E6E7] text-[#566474]" />
            </div>
        </div>
    </div>

</template>
