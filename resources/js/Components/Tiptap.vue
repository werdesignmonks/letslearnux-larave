<script setup lang="ts">
import {useEditor, Editor, EditorContent} from '@tiptap/vue-3'
import StarterKit from '@tiptap/starter-kit'
import editorbutton from './EditorButton.vue'
import {isActive} from "@tiptap/vue-3";

const editor = useEditor({
    extensions: [
        StarterKit,
    ],
    content: `
      <p>
        I'm <span style="color: #e60000">red</span>!
      </p>
    `,
})

// const buttons = [
//     {
//         icon: 'remixicon-bold',
//         command: 'bold',
//         title: 'Bold',
//         isActive: () => isActive(editor, 'bold'),
//     },
//     {
//         icon: 'remixicon-italic',
//         command: 'italic',
//         title: 'Italic',
//         isActive: () => isActive(editor, 'italic'),
//     },
//     {
//         icon: 'remixicon-underline',
//         command: 'underline',
//         title: 'Underline',
//         isActive: () => isActive(editor, 'underline'),
//     },
//     {
//         icon: 'remixicon-strikethrough',
//         command: 'strike',
//         title: 'Strike',
//         isActive: () => isActive(editor, 'strike'),
//     },
//     {
//         type: 'divider',
//     },
//     {
//         icon: 'remixicon-align-left',
//         command: 'setAlignment',
//         param: 'left',
//         title: 'Align left',
//         isActive: () => isActive(editor, 'setAlignment', 'left'),
//     },
//     {
//         icon: 'remixicon-align-center',
//         command: 'setAlignment',
//         param: 'center',
//         title: 'Align center',
//         isActive: () => isActive(editor, 'setAlignment', 'center'),
//     },
//     {
//         icon: 'remixicon-align-right',
//         command: 'setAlignment',
//         param: 'right',
//         title: 'Align right',
//         isActive: () => isActive(editor, 'setAlignment', 'right'),
//     },
//     {
//         icon: 'remixicon-align-justify',
//         command: 'setAlignment',
//         param: 'justify',
//         title: 'Align justify',
//         isActive: () => isActive(editor, 'setAlignment', 'justify'),
//     },
//     {
//         type: 'divider',
//     },
//     {
//         icon: 'remixicon-list-unordered',
//         command: 'toggleBulletList',
//         title: 'Bullet list',
//         isActive: () => isActive(editor, 'toggleBulletList'),
//     },
//     {
//         icon: 'remixicon-list-ordered',
//         command: 'toggleOrderedList',
//         title: 'Ordered list',
//         isActive: () => isActive(editor, 'toggleOrderedList'),
//     },
//     {
//         icon: 'remixicon-list-check',
//         command: 'toggleTaskList',
//         title: 'Task list',
//         isActive: () => isActive(editor, 'toggleTaskList'),
//     }
// ]

function isActive(editor: Editor, command: string, param: string | null = null) {
    if (param) {
        return editor.isActive(command, {alignment: param})
    }

    return editor.isActive(command)
}



</script>

<template>
    <div class="bg-green-900 py-5 flex">
        <template v-for="(item, index) in editorbutton" :key="`divider-${index}`">
           <div class="divider">
                <EditorButton :key="index" v-bind="item" />
           </div>
        </template>
    </div>
    <!--    <editor-content :editor="editor"/>-->
    <EditorContent :editor="editor" />
</template>
