<script setup>
const props = defineProps({
    title: {
        type: String,
        required: true
    },
    NRC: {
        type: String,
        required: true,
    },
    teacher: {
        type: String,
        required: true,
    }
})
</script>

<template>
    <div class="card m-2">
        <div class="card-header">{{NRC}}</div>
        <div class="card-body">{{title}}</div>
        <div class="card-footer">{{teacher}}</div>
    </div>
</template>
