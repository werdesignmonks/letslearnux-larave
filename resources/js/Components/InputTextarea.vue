<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: {
        type: String,
        required: true,
    },
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <textarea
        ref="input"
        v-model="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
    ></textarea>
</template>
