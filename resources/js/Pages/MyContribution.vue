<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import FilterButton from "@/Pages/Resources/FilterButton.vue";
import {Head} from "@inertiajs/vue3";
</script>

<template>
    <Head title="Contribution" />
    <AuthenticatedLayout>
        <div class="w-[850px] mx-auto">
            <div class="self-stretch text-center text-gray-950 text-[32px] mb-[24px] font-bold leading-[38.40px]">Resources that you contribute</div>
            <div class="flex-col justify-center items-center gap-4 flex">
                <div class="self-stretch justify-start items-end gap-4 inline-flex">
                    <div class="grow shrink basis-0 flex-col justify-end items-start gap-1 inline-flex">
                        <div class="justify-start items-end gap-2 inline-flex">
                            <FilterButton label="All" :isActive=true class="rounded-xl border border-neutral-200 leading-relaxed" />
                            <FilterButton label="Books"  class="bg-stone-50 rounded-xl border border-neutral-200 leading-relaxed" />
                            <FilterButton label="Articles"  class="bg-stone-50 rounded-xl border border-neutral-200 leading-relaxed" />
                            <FilterButton label="Videos"  class="bg-stone-50 rounded-xl border border-neutral-200 leading-relaxed" />
                        </div>
                    </div>
                    <div class="">
                        <select class="w-[200px] h-12 px-4 py-3 bg-stone-50 rounded-xl border border-neutral-200 justify-start items-center flex">
                            <option value="1">All Resources</option>
                            <option value="2">A Two Z</option>
                            <option value="3">Recent</option>
                            <option value="4">Most Viewed</option>
                        </select>
                    </div>
                </div>

                <table class="w-full text-left rounded-lg border border-neutral-200">
                    <thead class="bg-neutral-200 py-3 rounded-lg overflow-hidden">
                        <tr class="">
                            <th class="px-5 py-4 w-[82px]"><span class="text-zinc-700 text-sm font-medium leading-tight">SL</span></th>
                            <th class="px-5 py-4"><span class="text-zinc-700 text-sm font-medium leading-tight">Resources Info</span></th>
                            <th class="w-[120px]"><span class="text-zinc-700 text-sm font-medium leading-tight">Status</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-5 py-[17px]">1</td>
                            <td class="px-5 py-[17px]">
                                <p class="self-stretch text-gray-950 text-sm font-medium leading-tight mb-0">Practical UI Book</p>
                                <p class="self-stretch text-slate-600 text-xs font-normal leading-none mb-0">https://www.practical-ui.com/</p>
                            </td>
                            <td>
                                <div class="w-[100px]">
                                    <div class="text-center text-emerald-600 text-xs font-medium leading-none px-2 py-[6px] bg-emerald-50 rounded ">Approved</div>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-stone-50 border-t border-neutral-200">
                            <td class="px-5 py-[17px]">2</td>
                            <td class="px-5 py-[17px]">
                                <p class="self-stretch text-gray-950 text-sm font-medium leading-tight mb-0">UX Research</p>
                                <p class="self-stretch text-slate-600 text-xs font-normal leading-none mb-0">https://careerfoundry.com/en/blog/ux-design/ux-resources/</p>
                            </td>
                            <td class="py-[17px]">
                                <div class="w-[100px]">
                                    <div class="text-center text-xs font-medium leading-none px-2  py-[6px] bg-rose-50 text-red-500 rounded ">Approved</div>
                                </div>
                            </td>
                        </tr>
                        <tr class=" border-t border-neutral-200">
                            <td class="px-5 py-[17px]">3</td>
                            <td class="px-5 py-[17px]">
                                <p class="self-stretch text-gray-950 text-sm font-medium leading-tight mb-0">Practical UI Book</p>
                                <p class="self-stretch text-slate-600 text-xs font-normal leading-none mb-0">https://www.practical-ui.com/</p>
                            </td>
                            <td>
                                <div class="w-[100px]">
                                    <div class="text-center text-emerald-600 text-xs font-medium leading-none px-2  py-[6px] bg-emerald-50 rounded ">Approved</div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
