<script setup>
import {defineProps, computed} from "vue";
import {Link} from '@inertiajs/vue3';

const props = defineProps({
	url: {
		type: String,
		required: true,
	},
    label: {
        type: String,
        required: true,
    },
    isActive: {
        type: Boolean,
        required: true,
        default: false,
    },
});

const publishedBooksMessage = computed(() => {
    return (
        {
            'bg-dm-color-primary border-dm-color-primary text-white': props.isActive,
            'bg-[#F7F8F8] text-[#566474] border border-[#E5E6E7]': !props.isActive,
        }
    )
})



</script>

<template>
    <Link :href="url" class="p-3 text-base hover:bg-dm-color-primary hover:border-dm-color-primary hover:text-white rounded-lg transition duration-300 ease-in-out" :class="publishedBooksMessage">
        {{ label }}
    </Link>
</template>

<style scoped>

</style>
