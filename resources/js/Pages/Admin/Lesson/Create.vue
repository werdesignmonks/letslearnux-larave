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
            <h1 class="font-bold text-dm-heading-color text-4xl">Add New Lesson</h1>
        </template>

        <div class="py-8">
            <div class="">
                <div class="flex gap-2 mb-6">
                    <Button :href="route('lesson.index')" :active="route().current('lesson.index')">
                        Lesson List
                    </Button>
                    <Button :href="route('lesson.create')" :active="route().current('lesson.create')">
                        Add New Lesson
                    </Button>

                </div>

            </div>

            <div class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]">
                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Lesson Title</label>
                    <input type="text" name="question" id="question" class="dm-input-field__input w-full">
                </div>


                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Short Description</label>
                    <textarea name="description" id="description" class="dm-input-field__input w-full"></textarea>
                </div>


                <div class="dm-input-field">
                    <label for="radio-1" class="dm-input-field__label block">Duration</label>
                    <input type="text" name="question" id="question" class="dm-input-field__input w-full">
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
