<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Banner from "@/Pages/Roadmap/Banner.vue";
import {Head, Link, router} from '@inertiajs/vue3';
import Pagination from "@/Components/Pagination.vue";

import {ref} from "vue";

const selectedSort = ref('');
const index = ref();

const props = defineProps({
    chapters: Object,
    allChapters: Array,
    lessonStatus: Object,
    user: Object,
    lessonProgress: Object,
});


console.log( props.lessonStatus )
console.log( props.lessonProgress )

// Show the lesson status of the user in lesson card
const lessonStatus = props.lessonStatus.filter((item) => {
    return item.user_id === props.user.id;
});





const handleSortChange = (selectedSort) => {
    const sortQuery = selectedSort ? `&sort=${selectedSort}` : '';


    const url = `${route('roadmap')}?${sortQuery}`;
    router.replace(url);
}

</script>

<template>

    <Head title="Roadmap" />

    <AuthenticatedLayout>
        <div class="max-w-[1100px] px-[15px] mx-auto">
            <Banner />

            <div class="flex justify-end mt-5">
                <select class="border rounded-xl min-w-[260px] bg-dm-bg-color border-dm-border-color text-[#566474]" v-model="selectedSort"  @change="() => handleSortChange(selectedSort)">
                    <option value="">All Chapter</option>
                    <option :value="item.id" v-for="(item, index) in props.allChapters" :key="item.id"> {{ item.title }}</option>
                </select>
            </div>

            <div class="mt-5 mb-[80px]" v-for="(item, index) in props.chapters.data">
                <div>
                    <h3 class="text-dm-color-secondary font-bold text-[16px]">{{ item.chapter_name }}</h3>
                    <h2 class="font-bold text-dm-heading-color text-[32px]">{{ item.title }}</h2>
                </div>

                <div class="flex justify-between items-center">
                    <div v-html="item.sub_title"></div>

                    <div class="flex items-center gap-2">
                        <div class="w-[100px] bg-gray-200 rounded-full dark:bg-purple-100">
                            <div class="bg-violet-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" :style="{ width: Math.round((lessonStatus.filter((lesson) => lesson.chapter_id === item.id && lesson.completed === 1).length / item.lesson.length) * 100) + '%' }">
                                {{
                                    Math.round((lessonStatus.filter((lesson) => {
                                        return lesson.chapter_id === item.id && lesson.completed === 1;
                                    }).length / item.lesson.length) * 100)

                                }}%
                            </div>
                        </div>
                        <div class="flex items-center gap-3 border border-[#31008B] px-[10px] py-[7px] bg-[#EAE5F3] rounded-4xl">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M15.8333 3.33325H4.16667C3.24619 3.33325 2.5 4.07944 2.5 4.99992V16.6666C2.5 17.5871 3.24619 18.3333 4.16667 18.3333H15.8333C16.7538 18.3333 17.5 17.5871 17.5 16.6666V4.99992C17.5 4.07944 16.7538 3.33325 15.8333 3.33325Z" stroke="#31008B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.3333 1.66675V5.00008" stroke="#31008B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M6.66666 1.66675V5.00008" stroke="#31008B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M2.5 8.33325H17.5" stroke="#31008B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.66666 11.6667H6.67499" stroke="#31008B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 11.6667H10.0083" stroke="#31008B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.3333 11.6667H13.3417" stroke="#31008B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.66666 15H6.67499" stroke="#31008B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 15H10.0083" stroke="#31008B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.3333 15H13.3417" stroke="#31008B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span class="text-[#31008B] text-base font-medium">{{ item.estimate_time }} </span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-6">
                    <div class="group border border-dm-border-color  py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-violet-300 hover:bg-purple-50 transition ease-in-out delay-150"
                         v-for="(lesson, lessonIndex) in item.lesson" :key="lesson.id"
                         :class="props.lessonStatus[lessonIndex]?.completed && ( item.id === props.lessonStatus[lessonIndex]?.chapter_id) ? 'border-violet-300 bg-purple-50 text-dm-color-primary' : 'border-dm-border-color bg-dm-bg-color'">

                        <div v-if="props.lessonStatus[lessonIndex]?.completed && (item.id === props.lessonStatus[lessonIndex]?.chapter_id)" class="w-8 h-8 p-5 bg-violet-600 rounded-[100px] border border-violet-600 flex-col justify-center items-center gap-2.5 inline-flex">
                            <div class="w-5 h-5">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.6668 5L7.50016 14.1667L3.3335 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>

                        <div v-else class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">
                            {{ lesson.serial }}
                        </div>

                        <Link :href="route('roadmap.show', lesson.slug)" class="text-base w-full font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">
                            {{ lesson.title}}
                        </Link>
                    </div>
                </div>
            </div>

            <Pagination :links="chapters.links" />
        </div>
    </AuthenticatedLayout>
</template>
