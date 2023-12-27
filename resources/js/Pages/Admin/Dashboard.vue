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
            <div class="pr-8 flex-col gap-8 w-full pt-6">
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

                <div class="w-[431px] text-gray-950 text-2xl font-bold font-['Cera Pro'] leading-[33.60px]">Resource Request</div>

                <div class="self-stretch h-[516px] flex-col justify-start items-start gap-6 flex">
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

            <div class="w-[340px] p-6 bg-stone-50 flex-col justify-start items-start gap-8 inline-flex">
                <div class="self-stretch h-[204px] flex-col justify-start items-start gap-2 flex">
                    <div class="text-gray-950 text-xl font-bold leading-7">Top Contributors</div>
                    <div class="self-stretch h-[168px] bg-white rounded-xl border border-neutral-200 flex-col justify-start items-start flex">
                        <div class="self-stretch bg-violet-50 justify-start items-start inline-flex">
                            <div class="w-[196px] self-stretch px-3 py-2 justify-start items-center flex">
                                <div class="text-slate-600 text-sm font-medium leading-tight">Name</div>
                            </div>
                            <div class="w-[72px] self-stretch px-3 py-2 justify-start items-center flex">
                                <div class="text-slate-600 text-sm font-medium leading-tight">Total</div>
                            </div>
                        </div>
                        <div class="self-stretch py-2 border-b border-neutral-200 justify-start items-center inline-flex">
                            <div class="h-7 px-3 justify-start items-center gap-2 flex">
                                <img class="w-7 h-7 rounded-full" src="https://via.placeholder.com/28x28" />
                                <div class="text-slate-600 text-base font-normal leading-relaxed">Arlene McCoy</div>
                            </div>
                            <div class="h-[26px] px-3 justify-start items-center flex">
                                <div class="grow shrink basis-0 text-slate-600 text-base font-normal leading-relaxed">135</div>
                            </div>
                        </div>
                        <div class="self-stretch py-2 border-b border-neutral-200 justify-start items-center inline-flex">
                            <div class="h-7 px-3 justify-start items-center gap-2 flex">
                                <img class="w-7 h-7 rounded-full" src="https://via.placeholder.com/28x28" />
                                <div class="text-slate-600 text-base font-normal leading-relaxed">Arlene McCoy</div>
                            </div>
                            <div class="h-[26px] px-3 justify-start items-center flex">
                                <div class="grow shrink basis-0 text-slate-600 text-base font-normal leading-relaxed">135</div>
                            </div>
                        </div>
                        <div class="self-stretch py-2 border-b border-neutral-200 justify-start items-center inline-flex">
                            <div class="h-7 px-3 justify-start items-center gap-2 flex">
                                <img class="w-7 h-7 rounded-full" src="https://via.placeholder.com/28x28" />
                                <div class="text-slate-600 text-base font-normal leading-relaxed">Arlene McCoy</div>
                            </div>
                            <div class="h-[26px] px-3 justify-start items-center flex">
                                <div class="grow shrink basis-0 text-slate-600 text-base font-normal leading-relaxed">135</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="self-stretch h-[546px] flex-col justify-start items-start gap-2 flex">
                    <div class="text-gray-950 text-xl font-bold leading-7">Notifications</div>
                    <div class="self-stretch h-[510px] bg-white rounded-xl border border-neutral-200 flex-col justify-start items-start flex">
                        <div class="self-stretch p-4 border-b border-neutral-200 justify-start items-start gap-1 inline-flex">
                            <div class="pt-1.5 justify-start items-start gap-2.5 flex">
                                <div class="justify-start items-start gap-3 flex">
                                    <div class="w-3 h-3 bg-violet-100 rounded-full"></div>
                                    <div class="w-1.5 h-1.5 bg-violet-600 rounded-full"></div>
                                </div>
                            </div>
                            <div class="grow shrink basis-0 flex-col justify-start items-start gap-1 inline-flex">
                                <div class="self-stretch justify-between items-center inline-flex">
                                    <div class="grow shrink basis-0 text-gray-950 text-base font-medium leading-relaxed">100 new members joined...</div>
                                    <div class="text-right text-slate-600 text-sm font-normal leading-tight">1m</div>
                                </div>
                                <div class="self-stretch text-slate-600 text-sm font-normal leading-tight">Our learning community is expanding rapidly! We're excited to...</div>
                            </div>
                        </div>
                        <div class="self-stretch p-4 border-b border-neutral-200 justify-start items-start gap-1 inline-flex">
                            <div class="pt-1.5 justify-start items-start gap-2.5 flex">
                                <div class="justify-start items-start gap-3 flex">
                                    <div class="w-3 h-3 bg-violet-100 rounded-full"></div>
                                    <div class="w-1.5 h-1.5 bg-violet-600 rounded-full"></div>
                                </div>
                            </div>
                            <div class="grow shrink basis-0 flex-col justify-start items-start gap-1 inline-flex">
                                <div class="self-stretch justify-between items-center inline-flex">
                                    <div class="grow shrink basis-0 text-gray-950 text-base font-medium leading-relaxed">100 new members joined...</div>
                                    <div class="text-right text-slate-600 text-sm font-normal leading-tight">1m</div>
                                </div>
                                <div class="self-stretch text-slate-600 text-sm font-normal leading-tight">Our learning community is expanding rapidly! We're excited to...</div>
                            </div>
                        </div>
                        <div class="self-stretch p-4 border-b border-neutral-200 justify-start items-start gap-1 inline-flex">
                            <div class="pt-1.5 justify-start items-start gap-2.5 flex">
                                <div class="justify-start items-start gap-3 flex">
                                    <div class="w-3 h-3 bg-violet-100 rounded-full"></div>
                                    <div class="w-1.5 h-1.5 bg-violet-600 rounded-full"></div>
                                </div>
                            </div>
                            <div class="grow shrink basis-0 flex-col justify-start items-start gap-1 inline-flex">
                                <div class="self-stretch justify-between items-center inline-flex">
                                    <div class="grow shrink basis-0 text-gray-950 text-base font-medium leading-relaxed">100 new members joined...</div>
                                    <div class="text-right text-slate-600 text-sm font-normal leading-tight">1m</div>
                                </div>
                                <div class="self-stretch text-slate-600 text-sm font-normal leading-tight">Our learning community is expanding rapidly! We're excited to...</div>
                            </div>
                        </div>
                        <div class="self-stretch p-4 border-b border-neutral-200 justify-start items-start gap-1 inline-flex">
                            <div class="pt-1.5 justify-start items-start gap-2.5 flex">
                                <div class="justify-start items-start gap-3 flex">
                                    <div class="w-3 h-3 bg-neutral-200 rounded-full"></div>
                                    <div class="w-1.5 h-1.5 bg-slate-600 rounded-full"></div>
                                </div>
                            </div>
                            <div class="grow shrink basis-0 flex-col justify-start items-start gap-1 inline-flex">
                                <div class="self-stretch justify-between items-center inline-flex">
                                    <div class="grow shrink basis-0 text-gray-950 text-base font-medium leading-relaxed">100 new members joined...</div>
                                    <div class="text-right text-slate-600 text-sm font-normal leading-tight">1m</div>
                                </div>
                                <div class="self-stretch text-slate-600 text-sm font-normal leading-tight">Our learning community is expanding rapidly! We're excited to...</div>
                            </div>
                        </div>
                        <div class="self-stretch p-4 rounded-bl-xl rounded-br-xl border-b border-neutral-200 justify-start items-start gap-1 inline-flex">
                            <div class="pt-1.5 justify-start items-start gap-2.5 flex">
                                <div class="justify-start items-start gap-3 flex">
                                    <div class="w-3 h-3 bg-neutral-200 rounded-full"></div>
                                    <div class="w-1.5 h-1.5 bg-slate-600 rounded-full"></div>
                                </div>
                            </div>
                            <div class="grow shrink basis-0 flex-col justify-start items-start gap-1 inline-flex">
                                <div class="self-stretch justify-between items-center inline-flex">
                                    <div class="grow shrink basis-0 text-gray-950 text-base font-medium leading-relaxed">100 new members joined...</div>
                                    <div class="text-right text-slate-600 text-sm font-normal leading-tight">1m</div>
                                </div>
                                <div class="self-stretch text-slate-600 text-sm font-normal leading-tight">Our learning community is expanding rapidly! We're excited to...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AdminAuthenticatedLayout>
</template>
