<script setup>
import {Head, router} from '@inertiajs/vue3';
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import {Link} from '@inertiajs/vue3';
import Button from "@/Components/Button.vue";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import {ref} from 'vue';

defineProps({
  user: Array,
});

</script>

<template>
  <Head title="All Admin Users"/>

  <AdminAuthenticatedLayout>
    <template #header>
      <h1 class="font-bold text-dm-heading-color text-4xl">User Info</h1>
    </template>

    <div class="py-8">
      <div class="">
        <div class="flex gap-2 mb-6">
          <Button :href="route('user.index')" :active="route().current('user.index')">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.8327 10H4.16602" stroke="#566474" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"/>
              <path d="M9.99935 15.8333L4.16602 9.99999L9.99935 4.16666" stroke="#566474" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Go back
          </Button>
        </div>
        <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
              <div class="overflow-hidden">
                <div class="">
                  <div class="w-[100px] w-full">
                    <img :src="user.avatar_path" alt="Placeholder" class="w-[100px]"/>
                  </div>
                  <div class="grid grid-cols-2 gap-4">

                    <div class="dm-input-field">
                      <label for="users_name" class="dm-input-field__label block">Name</label>
                      <p class="grow shrink basis-0 text-slate-600 text-base leading-relaxed mb-0 px-4 py-3.5 bg-zinc-100 rounded-xl border border-neutral-200 justify-start items-center gap-2 inline-flex w-full">
                        {{ user.name }}
                      </p>
                    </div>
                    <div class="dm-input-field">
                      <label for="email" class="dm-input-field__label block">Email</label>
                      <p class="grow shrink basis-0 text-slate-600 text-base leading-relaxed mb-0 px-4 py-3.5 bg-zinc-100 rounded-xl border border-neutral-200 justify-start items-center gap-2 inline-flex w-full">
                        {{ user.email }}
                      </p>
                    </div>


                    <div class="dm-input-field" v-if="user.date_of_birth">
                      <label for="users_name" class="dm-input-field__label block">Date Of Birth</label>
                      <p class="grow shrink basis-0 text-slate-600 text-base leading-relaxed mb-0 px-4 py-3.5 bg-zinc-100 rounded-xl border border-neutral-200 justify-start items-center gap-2 inline-flex w-full">
                        {{ user.date_of_birth }}
                      </p>
                    </div>
                    <div class="dm-input-field" v-if="user.gender">
                      <label for="email" class="dm-input-field__label block">Gender</label>
                      <p class="grow shrink basis-0 text-slate-600 text-base leading-relaxed mb-0 px-4 py-3.5 bg-zinc-100 rounded-xl border border-neutral-200 justify-start items-center gap-2 inline-flex w-full">
                        {{ user.gender }}
                      </p>
                    </div>
                  </div>


                  <div class="flex">
                    <Button :href="route('user.edit', user.id)" :active="route().current('user.edit', user.id)">
                      Edit User Information
                    </Button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminAuthenticatedLayout>
</template>
