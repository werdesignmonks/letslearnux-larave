<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import FilterButton from "@/Pages/Resources/FilterButton.vue";
import {Head, router} from "@inertiajs/vue3";
import {ref} from "vue";

const type = ref('');
const selectedSort = ref('');

const props = defineProps({
	resources: Object
})

const handleTypeFilter = (selectedType) => {
    type.value = selectedType;

    const url = `${route('my-contribution')}?type=${type.value}`;
    router.get(url);
};

const handleSortChange = (selectedSort) => {
    const sortQuery = selectedSort ? `&sort=${selectedSort}` : '';
    const typeQuery = type.value ? `&type=${type.value}` : '';

    const url = `${route('my-contribution')}?${typeQuery}${sortQuery}`;
    router.get(url);
};


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
<!--                            <FilterButton label="All" :isActive=true class="rounded-xl border border-neutral-200 leading-relaxed" />-->
<!--                            <FilterButton label="Books"  class="bg-stone-50 rounded-xl border border-neutral-200 leading-relaxed" />-->
<!--                            <FilterButton label="Articles"  class="bg-stone-50 rounded-xl border border-neutral-200 leading-relaxed" />-->
<!--                            <FilterButton label="Videos"  class="bg-stone-50 rounded-xl border border-neutral-200 leading-relaxed" />-->

                            <FilterButton label="All" :url="`${route('my-contribution')}`" :isActive=true class="rounded-xl border border-neutral-200 leading-relaxed" />

                            <FilterButton
                                :url="`${route('my-contribution')}/?type=book`"
                                label="Book"
                                @click="() => handleTypeFilter('book')"
                            />

                            <FilterButton
                                :url="`${route('my-contribution')}/?type=article`"
                                label="Article"
                                @click="() => handleTypeFilter('article')"
                            />

                            <FilterButton
                                :url="`${route('my-contribution')}/?type=video`"
                                label="Video"
                                @click="() => handleTypeFilter('video')"
                            />
                        </div>
                    </div>
                    <div class="">
<!--                        <select class="w-[200px] h-12 px-4 py-3 bg-stone-50 rounded-xl border border-neutral-200 justify-start items-center flex">-->
<!--                            <option value="1">All Resources</option>-->
<!--                            <option value="2">A Two Z</option>-->
<!--                            <option value="3">Recent</option>-->
<!--                            <option value="4">Most Viewed</option>-->
<!--                        </select>-->

                        <select
                            v-model="selectedSort"
                            @change="() => handleSortChange(selectedSort)"
                            class="w-[200px] h-12 px-4 py-3 bg-stone-50 rounded-xl border border-neutral-200 justify-start items-center flex"
                        >
                            <option value="">Sort By</option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-hidden w-full rounded-lg border border-[#E5E6E7]">
                <table class="min-w-full text-sm font-light overflow-hidden">
                    <thead class="text-left bg-dm-color-primary-light">
                        <tr class="">
                            <th class="px-5 py-4 w-[82px]"><span class="text-zinc-700 text-sm font-medium leading-tight">SL</span></th>
                            <th class="px-5 py-4"><span class="text-zinc-700 text-sm font-medium leading-tight">Resources Info</span></th>
                            <th class="w-[120px]"><span class="text-zinc-700 text-sm font-medium leading-tight">Status</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in resources.data" :key="index" class="border-t border-dm-border-color">
                            <td class="px-5 py-[17px]">{{ index+1 }}</td>
                            <td class="px-5 py-[17px]">
                                <p class="self-stretch text-gray-950 text-sm font-medium leading-tight mb-0">{{ item.title }}</p>
                                <p class="self-stretch text-slate-600 text-xs font-normal leading-none mb-0">{{ item.url }}</p>
                            </td>
                            <td>
                                <div class="w-[100px]">
	                                <div :class="{
		                                'text-red-500 bg-red-50': item.status === 'rejected',
		                                'text-emerald-600 bg-emerald-50': item.status === 'approved',
		                                'text-yellow-500 bg-yellow-50': item.status === 'draft',
	                                }" class="text-center text-xs font-medium leading-none px-2 py-[6px] rounded capitalize">
		                                {{ item.status === 'draft' ? 'Pending' : item.status }}
	                                </div>

                                </div>
                            </td>
                        </tr>
<!--                        <tr class="bg-stone-50 border-t border-neutral-200">-->
<!--                            <td class="px-5 py-[17px]">2</td>-->
<!--                            <td class="px-5 py-[17px]">-->
<!--                                <p class="self-stretch text-gray-950 text-sm font-medium leading-tight mb-0">UX Research</p>-->
<!--                                <p class="self-stretch text-slate-600 text-xs font-normal leading-none mb-0">https://careerfoundry.com/en/blog/ux-design/ux-resources/</p>-->
<!--                            </td>-->
<!--                            <td class="py-[17px]">-->
<!--                                <div class="w-[100px]">-->
<!--                                    <div class="text-center text-xs font-medium leading-none px-2  py-[6px] bg-rose-50 text-red-500 rounded ">Approved</div>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr class=" border-t border-neutral-200">-->
<!--                            <td class="px-5 py-[17px]">3</td>-->
<!--                            <td class="px-5 py-[17px]">-->
<!--                                <p class="self-stretch text-gray-950 text-sm font-medium leading-tight mb-0">Practical UI Book</p>-->
<!--                                <p class="self-stretch text-slate-600 text-xs font-normal leading-none mb-0">https://www.practical-ui.com/</p>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <div class="w-[100px]">-->
<!--                                    <div class="text-center text-emerald-600 text-xs font-medium leading-none px-2  py-[6px] bg-emerald-50 rounded ">Approved</div>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                        </tr>-->

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
