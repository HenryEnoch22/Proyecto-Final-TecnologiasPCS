<script setup>
const props = defineProps({
    labelText: {
        type: String,
        required: true,
    },
    inputType: {
        type: String,
        required: true,
    },
    placeholder: {
        type: String,
        required: false,
    },
    isRequired: {
        type: Boolean,
        required: true,
    },
})
</script>

<template>
    <label class="w-100">{{ labelText }}
        <input class="form-control mt-1" :required="isRequired" :placeholder="placeholder" :type="inputType" />
    </label>
</template>
