<script setup>
import { reactive, computed } from 'vue'
import {Link} from "@inertiajs/vue3";

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import {faFacebookF, faTwitter, faLinkedinIn, faPinterestP} from '@fortawesome/free-brands-svg-icons'
import {faLink} from '@fortawesome/free-solid-svg-icons'
library.add(faFacebookF, faTwitter, faLinkedinIn, faPinterestP, faLink);

const props = defineProps(
    {
        isShow: {
            type: Boolean,
            required: true,
            default: true,
        },
        iconWidth: {
            type: String,
            default: 'sm',
        },
        iconBgColor: {
            type: String,
            default: 'bg-[#999DA1] text-white',
        },
    }
)


const socialSize = computed(() => {
    return (
        {
            'h-6 w-6 text-[12px]': props.iconWidth === 'sm',
            'h-8 w-8': props.iconWidth === 'md',
            'h-[48px] w-[48px] text-base': props.iconWidth === 'lg',
        }
    )
})

</script>

<template>
    <div class="flex items-center gap-3">
        <h4 class="text-dm-color-heading font-bold hover:text-dm-color-primary" v-if="isShow" >Share On:</h4>
        <ul>
            <li class="inline-block mx-0.5">
                <Link href="#" class="inline-flex items-center justify-center rounded-full hover:bg-dm-color-primary hover:text-white transition ease-in-out delay-150" :class="[socialSize, iconBgColor]">
                    <font-awesome-icon icon="fa-brands fa-facebook-f" />
                </Link>
            </li>

            <li class="inline-block mx-0.5">
                <Link href="#" class="inline-flex items-center justify-center h-6 w-6 bg-[#999DA1] rounded-full hover:bg-dm-color-primary hover:text-white transition ease-in-out delay-150" :class="[socialSize, iconBgColor]">
                    <font-awesome-icon icon="fa-brands fa-twitter" />
                </Link>
            </li>

            <li class="inline-block mx-0.5">
                <Link href="#" class="inline-flex items-center justify-center h-6 w-6 bg-[#999DA1] rounded-full hover:bg-dm-color-primary hover:text-white transition ease-in-out delay-150" :class="[socialSize, iconBgColor]">
                    <font-awesome-icon icon="fa-brands fa-linkedin-in" />
                </Link>
            </li>
            <li class="inline-block mx-0.5">
                <Link href="#" class="inline-flex items-center justify-center h-6 w-6 bg-[#999DA1] rounded-full hover:bg-dm-color-primary hover:text-white transition ease-in-out delay-150" :class="[socialSize, iconBgColor]">
                    <font-awesome-icon icon="fa-solid fa-link" />
                </Link>
            </li>
        </ul>
    </div>
</template>

<style scoped>

</style>
