<script setup>
import {Head, Link, router} from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import Button from "@/Components/Button.vue";
import Pagination from "@/Components/Pagination.vue";


defineProps({
    resources: Object,
    draftResources: Object,
    userResources: Object,
    users: Number,
});

</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminAuthenticatedLayout>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between">
            <div class="pr-8 flex-col gap-8 w-full pt-6 max-w-6xl">
                <div class="text-gray-950 text-[32px] font-bold leading-[38.40px] mb-4">Dashboard</div>
                <div class="self-stretch justify-start items-start gap-4 flex mb-5">
                    <div class="grow shrink basis-0 p-6 bg-violet-50 rounded-2xl flex-col justify-start items-start gap-6 inline-flex">
                        <div class="text-slate-600 text-base font-medium leading-relaxed">Total Resources</div>
                        <div class="text-gray-950 text-5xl font-bold leading-[52.80px]">{{ resources.length }}</div>
                    </div>
                    <div class="grow shrink basis-0 p-6 bg-violet-50 rounded-2xl flex-col justify-start items-start gap-6 inline-flex">
                        <div class="text-slate-600 text-base font-medium leading-relaxed">Total Contributors</div>
                        <div class="text-gray-950 text-5xl font-bold leading-[52.80px]">{{ userResources.length }}+</div>
                    </div>
                    <div class="grow shrink basis-0 p-6 bg-violet-50 rounded-2xl flex-col justify-start items-start gap-6 inline-flex">
                        <div class="text-slate-600 text-base font-medium leading-relaxed">Total Users</div>
                        <div class="text-gray-950 text-5xl font-bold leading-[52.80px]">{{ users }}+</div>
                    </div>
                </div>

                <div class="w-[431px] text-gray-950 text-2xl font-bold leading-[33.60px]">Resource Request</div>

                <div class="self-stretch flex-col justify-start items-start gap-6 flex">
                    <div class="inline-block min-w-full py-2">
                        <div class="overflow-hidden rounded-lg border border-[#E5E6E7]">
                            <table class="min-w-full text-sm font-light overflow-hidden">
                                <thead class="text-left bg-dm-color-primary-light">
                                <tr>
                                    <th scope="col" class="text-slate-600 text-sm font-medium leading-tight px-4 py-3">#</th>
                                    <th scope="col" class="text-slate-600 text-sm font-medium leading-tight px-2 py-3">Resource Title</th>
                                    <th scope="col" class="text-slate-600 text-sm font-medium leading-tight px-2 py-3">Resource Type</th>
                                    <th scope="col" class="text-slate-600 text-sm font-medium leading-tight px-2 py-3">User</th>
                                    <th scope="col" class="text-slate-600 text-sm font-medium leading-tight px-2 py-3">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="border-dm-border-color border-t" v-for="(item, index) in  draftResources.data">
                                    <td class="whitespace-nowrap px-4 py-4 font-medium text-center">{{ index+1 }}</td>
                                    <td class="whitespace-nowrap py-2 px-2 text-dm-heading-color text-base font-medium max-w-[270px]">
                                        <span class="overflow-hidden text-ellipsis max-w-[80%] block" :title="item.title">{{ item.title }}</span>
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-2 text-dm-heading-color text-base font-medium px-2 capitalize">
                                        {{ item.type }}
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-2 text-dm-heading-color text-base font-medium">{{ item.user.name }}</td>


                                    <td class="whitespace-nowrap py-4 text-left px-2">
                                        <div class="flex gap-2">
                                            <Link  class="text-violet-600 text-base font-medium underline leading-relaxed">View</Link>
<!--                                            <button class="text-violet-600 text-base font-medium underline leading-relaxed">Approve</button>-->
<!--                                            <button class="text-violet-600 text-base font-medium underline leading-relaxed">Reject</button>-->
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :resources="draftResources" :links="draftResources.links"/>
                    </div>
                </div>
            </div>
        </div>

    </AdminAuthenticatedLayout>
</template>
