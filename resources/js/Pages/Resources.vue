<script setup>
// import Layout from "../Lauouts/Layout.vue";

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, router, Link} from '@inertiajs/vue3';
import FilterCheckbox from "@/Pages/Resources/FilterCheckbox.vue";
import Card from "@/Pages/Roadmap/Card.vue";
import FilterButton from "@/Pages/Resources/FilterButton.vue";

import { ref} from "vue";

const active = ref(true);

const props = defineProps({
	resources: Array
})


const lessons = [];
const type = '';

function filterByType(type) {

}

</script>

<template>

	<Head title="Resources" />

    <AuthenticatedLayout>
        <Head title="Resources" />
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-row gap-4">
                <div class="basis-1/4 bg-[#F7F8F8] p-6 rounded-xl mb-[12px] h-[max-content]">
                    <h3 class="font-bold text-[20px] leading-[28px] mb-3">Filter by topics</h3>

                    <div>
                        <FilterCheckbox value="all" label="All chapters" />
                        <FilterCheckbox value="basic" label="Getting started with basic" />
                        <FilterCheckbox value="tool" label="Learn & practice the tool" />
                        <FilterCheckbox value="design" label="Learn UI design" />
                        <FilterCheckbox value="practice" label="Practice, prepare and apply" />
                        <FilterCheckbox value="all" label="Getting started with basic" />
                        <FilterCheckbox value="all" label="Learn & practice the tool" />
                        <FilterCheckbox value="all" label="Learn UI design" />
                        <FilterCheckbox value="all" label="Practice, prepare and apply" />
                    </div>
                </div>

                <div class="px-4 basis-3/4">
                    <div class="mb-4 flex justify-between items-center mb-6">
                        <div class="flex jus gap-2">
<!--	                        <Link :href="resources" class="underline font-bold text-dm-color-primary -tracking-[0.5px] ">All Resources</Link>-->
	                        <Link :href="'resources/?type=article'" class="underline font-bold text-dm-color-primary -tracking-[0.5px]">Articles</Link>
	                        <Link :href="'resources/?type=book'" class="underline font-bold text-dm-color-primary -tracking-[0.5px] ">Books</Link>
	                        <Link :href="'resources/?type=video'" class="underline font-bold text-dm-color-primary -tracking-[0.5px] ">Video</Link>
<!--                            <FilterButton label="Books" :isActive=true />-->
<!--                            <FilterButton label="Articles"  />-->
<!--                            <FilterButton label="Video"  />-->
                        </div>

                        <div>
                            <select class="border py-[11px] px-[15px] rounded-xl min-w-[260px] bg-dm-bg-color border-dm-border-color text-[#566474] focus:outline-0">
                                <option value="1">All Resources</option>
                                <option value="2">A Two Z</option>
                                <option value="3">Recent</option>
                                <option value="4">Most Viewed</option>
                            </select>
                        </div>
                    </div>
                    <p class="font-medium font-base -tracking-[-0.5px] mb-3">15,489+ Articles found</p>
                    <div class="grid grid-cols-3 gap-5">
                        <Card :title="item.title" :src="item.image" :url="item.url" v-for="(item, index) in props.resources.data" />
<!--                        <Card title="How Good Is Your Eye For UI Design Details?" src="../images/card-2.png" url="https://www.cambridgeenglish.org/test-your-english/" />-->
<!--                        <Card title="How Good Is Your Eye For UI Design Details?" src="../images/card-2.png" url="https://www.cambridgeenglish.org/test-your-english/" />-->
<!--                        <Card title="21 Google Search Tips You'll Want to Learn PCMag" src="../images/card-2.png" url="https://www.cambridgeenglish.org/test-your-english/" />-->
<!--                        <Card title="21 Google Search Tips You'll Want to Learn PCMag" src="../images/card-2.png" url="https://www.cambridgeenglish.org/test-your-english/" />-->
<!--                        <Card title="21 Google Search Tips You'll Want to Learn PCMag" src="../images/card-2.png" url="https://www.cambridgeenglish.org/test-your-english/" />-->
                    </div>
                </div>

            </div>



        </div>
    </AuthenticatedLayout>

</template>

<style scoped>

</style>
