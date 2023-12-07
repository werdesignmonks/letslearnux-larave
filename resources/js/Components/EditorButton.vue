<script setup>
import {isActive} from "@tiptap/vue-3";
import {defineProps} from "vue";
import remixiconUrl from 'remixicon/fonts/remixicon.symbol.svg'


const props = defineProps({
    icon: {
        type: String,
        required: true
    },
    editor: {
        type: Object,
        required: true
    },
    // command: {
    //     type: String,
    //     required: true
    // },
    // param: {
    //     type: String,
    //     default: null
    // },
    title: {
        type: String,
        default: null
    },
    action: {
        type: Function,
        default: null
    },
    isActive: {
        type: Function,
        default: null
    }
})

// const isActive = () => {
//     if (props.action) {
//         return props.action()
//     }
//
//     if (props.param) {
//         return isActive(props.command, props.param)
//     }
//
//     return isActive(props.command)
// }

// const execute = () => {
//     if (props.action) {
//         return props.action()
//     }
//
//     if (props.param) {
//         return props.editor.chain().focus().toggleMark(props.command, props.param).run()
//     }
//
//     return props.editor.chain().focus().toggleMark(props.command).run()
// }


</script>

<template>
<!--    <button class="editor-btn" :class="{'is-active': isActive() : null }" @click="action" :title="title">-->
<!--        <svg class="remix">-->
<!--            <use :xlink:href="`${remixiconUrl}#ri-${icon}`"></use>-->
<!--        </svg>-->
<!--    </button>-->
    <button class="editor-btn" :class="{'is-active': isActive() ? isActive() : null}" @click="action" :title="title">
        <svg class="remix">
<!--            <use :xlink:href="`${remixiconUrl}#ri-${icon}`"></use>-->
        </svg>
    </button>
</template>

<style scoped lang="scss">
.editor-btn {
    background: none;
    border: none;
    cursor: pointer;
    outline: none;
    padding: 10px;
    width: 32px;
    height: 32px;
    border-radius: 4px;
    margin-right: 10px;
    transition: background-color 0.3s ease;

    svg {
        fill: currentColor;
        width: 100%;
        height: 100%;
    }

    &.is-active, &:hover {
        background-color: #3d3c3c;
    }
}


</style>
