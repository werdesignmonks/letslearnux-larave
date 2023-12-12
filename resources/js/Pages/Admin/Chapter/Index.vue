<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import Pagination from "@/Components/Pagination.vue";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';


const $toast = useToast();


const props = defineProps({
    chapters: Array,
});

function destroy(id) {
    router.delete(route('chapter.destroy', id));

    $toast.open({
        message: 'Lesson Deleted Successfully!',
        type: 'success',
        position: 'top-right',
        duration: 5000,
        style: {
            background: 'linear-gradient(to right, #00b09b, #96c93d)',
        },
    });
}

// Auto hide flash message
// setTimeout(function() {
//     document.getElementById('flash-message').style.display = 'none';
// }, 3000);

</script>

<template>
    <Head title="Chapters"/>

    <AdminAuthenticatedLayout>
        <template #header>
            <h1 class="font-bold text-dm-heading-color text-4xl">Chapter</h1>
        </template>

        <div class="py-8">
            <div class="">
                <div class="flex gap-2 mb-6">
                    <Button :href="route('chapter.index')" :active="route().current('chapter.index')">
                        Chapter List
                    </Button>
                    <Button :href="route('chapter.create')" :active="route().current('chapter.create')">
                        Add New Chapter
                    </Button>
                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
<!--                            <div class="bg-green-500 text-white p-4 mb-4 rounded-lg" id="flash-message" :class="$page.props.flash.type" v-if="$page.props.flash.message">-->
<!--                                <p>{{ $page.props.flash.message }}</p>-->
<!--                            </div>-->
                            <div class="overflow-hidden rounded-lg border border-[#E5E6E7]">
                                <table class="min-w-full text-sm font-light overflow-hidden">
                                    <thead class="text-left bg-dm-color-primary-light">
                                        <tr>
                                            <th scope="col" class="px-3 py-4 w-[80px] text-center">#</th>
                                            <th scope="col" class="py-4">Chapter Name</th>
                                            <th scope="col" class="py-4">Title</th>
                                            <th scope="col" class="px-4 py-4 text-left w-[160px]">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-dm-border-color border-t" v-for="(chapter, index) in props.chapters.data">
                                            <td class="whitespace-nowrap px-3 py-4 font-medium text-center">{{ index + 1 }}</td>
                                            <td class="whitespace-nowrap py-4 text-dm-heading-color text-base font-medium">{{ chapter.chapter_name }}</td>
                                            <td class="whitespace-nowrap py-4 text-dm-heading-color text-base font-medium">{{ chapter.title }}</td>
                                            <td class="whitespace-nowrap py-4 text-left px-4">
                                                <Link :href="route('chapter.edit', chapter.id)" class="mr-2 inline-block">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 20H21" stroke="#643EF3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M16.5 3.5C16.8978 3.10217 17.4374 2.87868 18 2.87868C18.2786 2.87868 18.5544 2.93355 18.8118 3.04015C19.0692 3.14676 19.303 3.30301 19.5 3.5C19.697 3.69698 19.8532 3.93083 19.9598 4.1882C20.0665 4.44557 20.1213 4.72142 20.1213 5C20.1213 5.27857 20.0665 5.55442 19.9598 5.81179C19.8532 6.06916 19.697 6.30301 19.5 6.5L7 19L3 20L4 16L16.5 3.5Z" stroke="#643EF3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                </Link>

                                                <button class="inline-block" @click.prevent="destroy(chapter.id)">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 6H21" stroke="#FF4747" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M19 6V20C19 21 18 22 17 22H7C6 22 5 21 5 20V6" stroke="#FF4747" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M8 6V4C8 3 9 2 10 2H14C15 2 16 3 16 4V6" stroke="#FF4747" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10 11V17" stroke="#FF4747" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M14 11V17" stroke="#FF4747" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <Pagination :links="props.chapters.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminAuthenticatedLayout>
</template>
