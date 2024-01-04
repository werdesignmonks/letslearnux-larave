<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from '@inertiajs/vue3';
import FilterCheckbox from "@/Pages/Resources/FilterCheckbox.vue";
import Card from "@/Pages/Roadmap/Card.vue";
import FilterButton from "@/Pages/Resources/FilterButton.vue";
import {ref, defineProps, computed} from "vue";

const active = ref(true);
const lessons = ref([]);
const type = ref('');
const selectedSort = ref('');

const props = defineProps({
	resources: Object,
	lessons: Object,
});

const handleCheckboxClick = (value) => {
	const index = lessons.value.indexOf(value);

	if (index === -1) {
		lessons.value.push(value);
	} else {
		lessons.value.splice(index, 1);
	}

	const lessonQuery = lessons.value.length > 0 ? `&lesson=${lessons.value.join(',')}` : '';
	const typeQuery = type.value ? `&type=${type.value}` : '';

	const url = `${route('resources')}?${lessonQuery}${typeQuery}`;
	router.get(url);
};
const handleSortChange = (selectedSort) => {
    const lessonQuery = lessons.value.length > 0 ? `&lesson=${lessons.value.join(',')}` : '';
    const typeQuery = type.value ? `&type=${type.value}` : '';
    const sortQuery = selectedSort ? `&sort=${selectedSort}` : '';


    const url = `${route('resources')}?${lessonQuery}${typeQuery}${sortQuery}`;
    router.get(url);
};

const resetFilters = () => {
	lessons.value = [];
	type.value = '';

	const checkboxes = document.querySelectorAll('.filter-checkbox');
	checkboxes.forEach((checkbox) => {
		checkbox.checked = false;
	});

	const url = `${route('resources')}`;
	router.get(url);
};


const handleTypeFilter = (selectedType) => {
	type.value = selectedType;

	const lessonQuery = lessons.value.length > 0 ? `&lesson=${lessons.value.join(',')}` : '';
	const typeQuery = type.value ? `&type=${type.value}` : '';
	const sortQuery = selectedSort.value ? `&sort=${selectedSort.value}` : '';

	const url = `${route('resources')}?${lessonQuery}${typeQuery}${sortQuery}`;
	router.get(url);
};

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
	                    <button class="text-blue-500 cursor-pointer underline" @click="resetFilters">Reset Filters</button>

	                    <FilterCheckbox
		                    :value="item.id"
		                    :label="item.title"
		                    v-for="(item, index) in props.lessons"
		                    @click="() => handleCheckboxClick(item.id)"
		                    :key="index"
	                    />
                    </div>
                </div>

                <div class="px-4 basis-3/4">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex jus gap-2">
	                        <FilterButton
                                :url="`${route('resources')}/?type=article`"
                                label="Article"
                                @click="() => handleTypeFilter('article')"

                            />
	                        <FilterButton
                                :url="`${route('resources')}/?type=book`"
                                label="Book"
                                @click="() => handleTypeFilter('book')"
                            />
	                        <FilterButton
                                :url="`${route('resources')}/?type=video`"
                                label="Video"
                                @click="() => handleTypeFilter('video')"
                            />
                        </div>

                        <div>

                            <select
                                v-model="selectedSort"
                                @change="() => handleSortChange(selectedSort)"
                                class="border py-[11px] px-[15px] rounded-xl min-w-[260px] bg-dm-bg-color border-dm-border-color text-[#566474] focus:outline-0"
                            >
                                <option value="">Sort By</option>
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>
                        </div>



                    </div>
                    <p class="font-medium font-base -tracking-[-0.5px] mb-3">{{ props.resources.data.length }} Articles found</p>
                    <div class="grid grid-cols-3 gap-5">
                        <Card :title="item.title" :src="item.image" :url="item.url" v-for="(item, index) in props.resources.data" :key="index" />
                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
