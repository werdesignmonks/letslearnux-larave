<script setup>
import { Link } from '@inertiajs/vue3'

const logo = '/images/logo.svg';


</script>

<template>
    <header class="border-b-[1px] border-dm-border-color">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-wrap justify-between items-center">
                <div class="site-logo">
                    <Link href="/">
                        <img src="/images/logo.png" alt="logo" />
                    </Link>
                </div>

                <div class="nav-right flex items-center gap-4">
                    <Link href="/resources">UX Resources</Link>
                    <!-- User Dropdown-->

                    <div class="search-form">
                        <form action="" class="relative">
                            <input type="text" class="outline-0 border border-dm-border-color outline-0 rounded-3xl py-[11px] pl-9 pr-3" />
                            <span class="absolute left-3 top-3.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.5 17.5L13.875 13.875" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </form>
                    </div>
                    <div class="dropdown hidden">
                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/resources/images/user.png" alt="user" />
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><Link href="/login">Login</Link></li>
                            <li><Link href="/register">Register</Link></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </header>
</template>

<style scoped>

</style>
