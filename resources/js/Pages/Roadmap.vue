<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Banner from "@/Pages/Roadmap/Banner.vue";
import { Head, Link } from '@inertiajs/vue3';


const props = defineProps({
    chapters: Array,
});


console.log(props.chapters)

</script>

<template>

    <Head title="Roadmap" />

    <AuthenticatedLayout>
        <div class="max-w-[1100px] px-[15px] mx-auto">
            <Banner />

            <div class="flex justify-end mt-5">
                <select class="border rounded-xl min-w-[260px] bg-dm-bg-color border-dm-border-color text-[#566474]">
                    <option value="1">All Chapter</option>
                    <option value="2">Planned</option>
                    <option value="3">In Progress</option>
                    <option value="4">Live</option>
                    <option value="5">Closed</option>
                </select>
            </div>

            <div class="mt-5 mb-[80px]" v-for="(item, index) in props.chapters.data">
                <div>
                    <h3 class="text-dm-color-secondary font-bold text-[16px]">{{ item.chapter_name }}</h3>
                    <h2 class="font-bold text-dm-heading-color text-[32px]">{{ item.title }}</h2>
                </div>
                <div class="flex justify-between items-center">

                    <div v-html="item.sub_title"></div>
                    <div class="flex items-center gap-3 border border-dm-color-secondary px-[10px] py-[7px] bg-[#FDF1E5] rounded-4xl">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M15.8333 3.33325H4.16667C3.24619 3.33325 2.5 4.07944 2.5 4.99992V16.6666C2.5 17.5871 3.24619 18.3333 4.16667 18.3333H15.8333C16.7538 18.3333 17.5 17.5871 17.5 16.6666V4.99992C17.5 4.07944 16.7538 3.33325 15.8333 3.33325Z" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.3333 1.66675V5.00008" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.66666 1.66675V5.00008" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.5 8.33325H17.5" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.66666 11.6667H6.67499" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 11.6667H10.0083" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.3333 11.6667H13.3417" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.66666 15H6.67499" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 15H10.0083" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.3333 15H13.3417" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-dm-color-secondary text-base font-medium">{{ item.estimate_time }} days</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150" v-for="(lesson, index) in item.lesson">
                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">
                            1.1
                        </div>
                        <Link href="/chapter-single/" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">
                            {{ lesson.title}}
                        </Link>
                    </div>

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.2-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Read some UX articles-->
<!--                        </Link>-->
<!--                    </div>-->

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.3-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Watch some YouTube videos-->
<!--                        </Link>-->
<!--                    </div>-->

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.4-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Start exploring Dribbble and Behance daily for 3 months-->
<!--                        </Link>-->
<!--                    </div>-->
                </div>
            </div>

<!--            <div class="mt-[80px]">-->
<!--                <div>-->
<!--                    <h3 class="text-dm-color-secondary font-bold text-[16px]">Chapter 2</h3>-->
<!--                    <h2 class="font-bold text-dm-heading-color text-[32px]">Learn & practice the tool</h2>-->
<!--                </div>-->
<!--                <div class="flex justify-between items-center">-->
<!--                    <p><span class="text-dm-heading-color font-medium">Expected Learning Outcomes:</span> Know yourself and be confident about the next steps towards being a UXer.</p>-->
<!--                    <div class="flex items-center gap-3 border border-dm-color-secondary px-[10px] py-[7px] bg-[#FDF1E5] rounded-4xl">-->
<!--                        <div class="flex items-center gap-2">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">-->
<!--                                <path d="M15.8333 3.33325H4.16667C3.24619 3.33325 2.5 4.07944 2.5 4.99992V16.6666C2.5 17.5871 3.24619 18.3333 4.16667 18.3333H15.8333C16.7538 18.3333 17.5 17.5871 17.5 16.6666V4.99992C17.5 4.07944 16.7538 3.33325 15.8333 3.33325Z" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M13.3333 1.66675V5.00008" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M6.66666 1.66675V5.00008" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M2.5 8.33325H17.5" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M6.66666 11.6667H6.67499" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M10 11.6667H10.0083" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M13.3333 11.6667H13.3417" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M6.66666 15H6.67499" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M10 15H10.0083" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M13.3333 15H13.3417" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                            </svg>-->
<!--                            <span class="text-dm-color-secondary text-base font-medium">40 days</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="mt-6">-->
<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.1-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Evaluate your English language skill, IQ, Mindset-->
<!--                        </Link>-->
<!--                    </div>-->

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.2-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Read some UX articles-->
<!--                        </Link>-->
<!--                    </div>-->

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.3-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Watch some YouTube videos-->
<!--                        </Link>-->
<!--                    </div>-->

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.4-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Start exploring Dribbble and Behance daily for 3 months-->
<!--                        </Link>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="mt-[80px]">-->
<!--                <div>-->
<!--                    <h3 class="text-dm-color-secondary font-bold text-[16px]">Chapter 3</h3>-->
<!--                    <h2 class="font-bold text-dm-heading-color text-[32px]">Learn UI design</h2>-->
<!--                </div>-->
<!--                <div class="flex justify-between items-center">-->
<!--                    <p><span class="text-dm-heading-color font-medium">Expected Learning Outcomes:</span> Know yourself and be confident about the next steps towards being a UXer.</p>-->
<!--                    <div class="flex items-center gap-3 border border-dm-color-secondary px-[10px] py-[7px] bg-[#FDF1E5] rounded-4xl">-->
<!--                        <div class="flex items-center gap-2">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">-->
<!--                                <path d="M15.8333 3.33325H4.16667C3.24619 3.33325 2.5 4.07944 2.5 4.99992V16.6666C2.5 17.5871 3.24619 18.3333 4.16667 18.3333H15.8333C16.7538 18.3333 17.5 17.5871 17.5 16.6666V4.99992C17.5 4.07944 16.7538 3.33325 15.8333 3.33325Z" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M13.3333 1.66675V5.00008" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M6.66666 1.66675V5.00008" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M2.5 8.33325H17.5" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M6.66666 11.6667H6.67499" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M10 11.6667H10.0083" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M13.3333 11.6667H13.3417" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M6.66666 15H6.67499" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M10 15H10.0083" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M13.3333 15H13.3417" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                            </svg>-->
<!--                            <span class="text-dm-color-secondary text-base font-medium">40 days</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="mt-6">-->
<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.1-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Evaluate your English language skill, IQ, Mindset-->
<!--                        </Link>-->
<!--                    </div>-->

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.2-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Read some UX articles-->
<!--                        </Link>-->
<!--                    </div>-->

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.3-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Watch some YouTube videos-->
<!--                        </Link>-->
<!--                    </div>-->

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.4-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Start exploring Dribbble and Behance daily for 3 months-->
<!--                        </Link>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="mt-[80px]">-->
<!--                <div>-->
<!--                    <h3 class="text-dm-color-secondary font-bold text-[16px]">Chapter 4</h3>-->
<!--                    <h2 class="font-bold text-dm-heading-color text-[32px]">Practice, prepare and apply</h2>-->
<!--                </div>-->
<!--                <div class="flex justify-between items-center">-->
<!--                    <p><span class="text-dm-heading-color font-medium">Expected Learning Outcomes:</span> Know yourself and be confident about the next steps towards being a UXer.</p>-->
<!--                    <div class="flex items-center gap-3 border border-dm-color-secondary px-[10px] py-[7px] bg-[#FDF1E5] rounded-4xl">-->
<!--                        <div class="flex items-center gap-2">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">-->
<!--                                <path d="M15.8333 3.33325H4.16667C3.24619 3.33325 2.5 4.07944 2.5 4.99992V16.6666C2.5 17.5871 3.24619 18.3333 4.16667 18.3333H15.8333C16.7538 18.3333 17.5 17.5871 17.5 16.6666V4.99992C17.5 4.07944 16.7538 3.33325 15.8333 3.33325Z" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M13.3333 1.66675V5.00008" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M6.66666 1.66675V5.00008" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M2.5 8.33325H17.5" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M6.66666 11.6667H6.67499" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M10 11.6667H10.0083" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M13.3333 11.6667H13.3417" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M6.66666 15H6.67499" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M10 15H10.0083" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                                <path d="M13.3333 15H13.3417" stroke="#EA7600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>-->
<!--                            </svg>-->
<!--                            <span class="text-dm-color-secondary text-base font-medium">40 days</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="mt-6">-->
<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.1-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Evaluate your English language skill, IQ, Mindset-->
<!--                        </Link>-->
<!--                    </div>-->

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.2-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Read some UX articles-->
<!--                        </Link>-->
<!--                    </div>-->

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.3-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Watch some YouTube videos-->
<!--                        </Link>-->
<!--                    </div>-->

<!--                    <div class="group border border-dm-border-color bg-dm-bg-color py-[19px] px-[20px] flex items-center gap-4 rounded-3xl mb-[12px] hover:border-dm-color-primary hover:bg-[#F7F5FE] transition ease-in-out delay-150">-->
<!--                        <div class="border border-dm-border-color text-base font-bold rounded-full w-[32px] h-[32px] flex items-center justify-center group-hover:border-dm-color-primary group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            1.4-->
<!--                        </div>-->
<!--                        <Link href="#" class="text-base font-bold text-dm-heading-color tracking-[-0.5px] group-hover:text-dm-color-primary transition ease-in-out delay-150">-->
<!--                            Start exploring Dribbble and Behance daily for 3 months-->
<!--                        </Link>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
