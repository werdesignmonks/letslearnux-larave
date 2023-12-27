<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen h-screen relative">
            <div class="bg-[#F7F8F8] w-[300px] min-h-screen h-screen absolute left-0 top-0">
                <div class="px-[40px] py-[22px] border-b border-[#E5E6E7]">
                    <Link :href="route('admin.dashboard')">
                        <ApplicationLogo
                            class="block h-9 w-auto fill-current text-gray-800"
                        />
                    </Link>
                </div>

                <nav class="px-[40px] py-[22px]">
                    <NavLink :href="route('admin.dashboard')" :active="route().current('admin.dashboard')" class="block">
                        Dashboard
                    </NavLink>

                    <NavLink :href="route('onboarding.index')" :active="route().current('onboarding.index')" class="block">
                        Onboarding
                    </NavLink>

                    <NavLink :href="route('chapter.index')" :active="route().current('chapter.index')" class="block">
                        Chapter
                    </NavLink>

                    <NavLink :href="route('lesson.index')" :active="route().current('lesson.index')" class="block">
                        Lesson
                    </NavLink>

                    <NavLink :href="route('resource.index')" :active="route().current('resource.index')" class="block">
                        Resource
                    </NavLink>

                    <NavLink :href="route('user.index')" :active="route().current('user.index')" class="block">
                        User Management
                    </NavLink>

<!--                    <NavLink :href="route('onboarding.index')" :active="route().current('onboarding.index')" class="block">-->
<!--                        Notification-->
<!--                    </NavLink>-->

                </nav>
            </div>


            <!-- Page Content -->
            <main class="w-[calc(100%_-_300px)] absolute left-[300px]">
                <div class="w-full">
                    <nav class="border-b border-gray-100">
                        <!-- Primary Navigation Menu -->
                        <div class="py-3">
                            <div class="flex justify-end">
                                <div class="hidden sm:flex sm:items-center sm:ms-6">
                                    <!-- Settings Dropdown -->
                                    <div class="ms-3 relative flex items-center">
                                        <div class="justify-start items-center gap-8 inline-flex">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 8C6 6.4087 6.63214 4.88258 7.75736 3.75736C8.88258 2.63214 10.4087 2 12 2C13.5913 2 15.1174 2.63214 16.2426 3.75736C17.3679 4.88258 18 6.4087 18 8C18 15 21 17 21 17H3C3 17 6 15 6 8Z" stroke="#000913" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M10.3 21C10.4674 21.3044 10.7135 21.5583 11.0125 21.7352C11.3116 21.912 11.6526 22.0053 12 22.0053C12.3475 22.0053 12.6885 21.912 12.9876 21.7352C13.2866 21.5583 13.5327 21.3044 13.7 21" stroke="#000913" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>

                                        </div>
                                        <Dropdown align="right" width="48">
                                            <template #trigger>

                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                    <img :src="$page.props.auth.user.avatar_path" class="h-12 w-12 rounded-full object-cover ml-4" alt="avatar">
                                                    <svg
                                                        class="ms-2 -me-0.5 h-4 w-4"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"
                                                        />
                                                    </svg>
                                                </button>
                                            </span>
                                            </template>

                                            <template #content>
                                                <DropdownLink :href="route('profile.profile')"> {{ $page.props.auth.user.name }}</DropdownLink>
                                                <DropdownLink :href="route('profile.edit')">Profile</DropdownLink>
                                                <DropdownLink :href="route('logout')" method="post" as="button">
                                                    Log Out
                                                </DropdownLink>
                                            </template>
                                        </Dropdown>
                                    </div>
                                </div>
                                <!-- Hamburger -->
                                <div class="-me-2 flex items-center sm:hidden">
                                    <button
                                        @click="showingNavigationDropdown = !showingNavigationDropdown"
                                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                    >
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path
                                                :class="{
                                                hidden: showingNavigationDropdown,
                                                'inline-flex': !showingNavigationDropdown,
                                            }"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16"
                                            />
                                            <path
                                                :class="{
                                                hidden: !showingNavigationDropdown,
                                                'inline-flex': showingNavigationDropdown,
                                            }"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Responsive Navigation Menu -->
                        <div
                            :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                            class="sm:hidden"
                        >
                            <div class="pt-2 pb-3 space-y-1">
                                <ResponsiveNavLink :href="route('admin.dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </ResponsiveNavLink>
                            </div>

                            <!-- Responsive Settings Options -->
                            <div class="pt-4 pb-1 border-t border-gray-200">
                                <div class="px-4">
                                    <div class="font-medium text-base text-gray-800">
                                        {{ $page.props.auth.user.name }}
                                    </div>
                                    <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                                </div>

                                <div class="mt-3 space-y-1">
                                    <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                                    <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                        Admin Log Out
                                    </ResponsiveNavLink>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <div class="sm:px-6 lg:px-[60px]">
                        <!-- Page Heading -->
                        <header v-if="$slots.header">
                            <div class="pt-7">
                                <slot name="header" />
                            </div>
                        </header>

                        <slot />
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>
