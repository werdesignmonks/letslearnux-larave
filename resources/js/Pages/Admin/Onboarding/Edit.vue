<script setup>
// import { Head } from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import Button from "@/Components/Button.vue";
import {router, useForm} from "@inertiajs/vue3";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';


const $toast = useToast();

const props = defineProps(
    {
        onboarding: Object,
        errors: Object,
        options: Array
    }
)

// Form Data
const formData = useForm({
    title: props.onboarding.title,
    type: props.onboarding.type,
})

function submit(id) {
    // router.put(route('lesson.update', id), form);

    formData.put(route('onboarding.update', id), {
        preserveScroll: true,
        onSuccess: (page) => {
            $toast.open({
                message: 'Lesson Update Successfully!',
                type: 'success',
                position: 'top-right',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #00b09b, #96c93d)',
                },
            });
        },
        onError: (errors) => {
            $toast.open({
                message: 'All fields are required!',
                type: 'error',
                position: 'top-right',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #FF0000, #FF6347)',
                },
            });
        }
    })

    //Dismissing the Toast after 5 seconds
    setTimeout(() => {
        $toast.clear();
    }, 3000);

}

function destroy(id) {
    router.delete(route('option.destroy', id));

    $toast.open({
        message: 'Option Deleted Successfully!',
        type: 'success',
        position: 'top-right',
        duration: 5000,
        style: {
            background: 'linear-gradient(to right, #00b09b, #96c93d)',
        },
    });
}

</script>

<template>
    <Head title="Onboarding"/>

    <AdminAuthenticatedLayout>
        <template #header>
            <h1 class="font-bold text-dm-heading-color text-4xl">Add New Onboarding Questions</h1>
        </template>

        <div class="py-8">
            <div class="">
                <div class="flex gap-2 mb-6">
                    <Button :href="route('onboarding.index')" :active="route().current('onboarding.index')">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M15.8327 10H4.16602" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          <path d="M9.99935 15.8333L4.16602 9.99999L9.99935 4.16666" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Go back
                    </Button>
                </div>

            </div>

            <form @submit.prevent="submit(onboarding.id)" class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]">
                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Question Title</label>
                    <input type="text" name="onboarding" id="onboarding" v-model="formData.title" class="dm-input-field__input w-full">
                    <div class="text-red-500 text-sm mt-1" v-if="errors.title" v-text="errors.title[0]"></div>
                </div>

                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Answer Type</label>
                    <select name="type" id="type" v-model="formData.type" class="dm-input-field__input w-full">
                        <option value="radio">Radio</option>
                        <option value="checkbox">Checkbox</option>
                    </select>

                    <div class="text-red-500 text-sm mt-1" v-if="errors.type" v-text="errors.type[0]"></div>
                </div>


                <div class="dm-input-repeater-field">
                    <label for="radio-1" class="dm-input-field__label block">Answer Input Field</label>
                    <div class="dm-input-field flex items-center gap-2 mb-3" v-for="(item, index) in options">
                        <input type="text" name="onboarding" id="onboarding" v-model="item.title" class="dm-input-field__input w-full">
                        <button class="border border-dm-border-color rounded-md px-3 py-3 text-dm-heading-color" @click.prevent="destroy(item.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M4.16675 10H15.8334" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <div class="dm-input-field flex items-center gap-2 mb-3">
                        <input type="text" name="onboarding" id="onboarding" class="dm-input-field__input w-full">
                        <button class="border border-dm-border-color rounded-md px-3 py-3 text-dm-heading-color">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M10 4.16667V15.8333" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.16675 10H15.8334" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        </button>
                    </div>
                </div>

                <div class="dm-input-field">
                    <button type="submit" class="dm-btn dm-button--primary">Update</button>
                </div>

            </form>

        </div>
    </AdminAuthenticatedLayout>
</template>

<style scoped>

</style>
