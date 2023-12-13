<script setup>
// import { Head } from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import NavLink from "@/Components/NavLink.vue";
import { Link } from '@inertiajs/vue3';
import Button from "@/Components/Button.vue";
import RadioGroupInput from "@/Components/RadioGroupInput.vue";
import RadioInput from "@/Components/RadioInput.vue";
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
                      <Button :href="route('chapter.index')" :active="route().current('chapter.index')">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M15.8327 10H4.16602" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          <path d="M9.99935 15.8333L4.16602 9.99999L9.99935 4.16666" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Go back
                      </Button>
                    </Button>
                </div>

            </div>

            <div class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]">
                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Question Title</label>
                    <input type="text" name="question" id="question" class="dm-input-field__input w-full">
                </div>

                <div class="dm-radio-field-wrapper">
                    <label for="radio-1" class="dm-input-field__label block">Answer Type</label>
                    <div class="dm-input-field flex items-center gap-2 mb-3">
                        <RadioInput label="Radio Button" name="button_type[]" />
                        <RadioInput label="Checkbox Button" name="button_type[]" />
                    </div>
                </div>

                <div class="dm-input-repeater-field">
                    <label for="radio-1" class="dm-input-field__label block">Answer Input Field</label>
                    <div class="dm-input-field flex items-center gap-2 mb-3">
                        <input type="text" name="question" id="question" class="dm-input-field__input w-full">
                        <button class="border border-dm-border-color rounded-md px-3 py-3 text-dm-heading-color">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M4.16675 10H15.8334" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <div class="dm-input-field flex items-center gap-2 mb-3">
                        <input type="text" name="question" id="question" class="dm-input-field__input w-full">
                        <button class="border border-dm-border-color rounded-md px-3 py-3 text-dm-heading-color">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M10 4.16667V15.8333" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.16675 10H15.8334" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        </button>
                    </div>
                </div>

                <div class="dm-input-field">
                    <button type="button" class="dm-btn dm-button--primary">Add Now</button>
                </div>

            </div>

        </div>
    </AdminAuthenticatedLayout>
</template>

<style scoped>

</style>
