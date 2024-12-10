<script setup>
const props = defineProps({
    text: {
        type: String,
        required: true,
    },
    action: {
        type: Function,
        required: false,
    },
    typeButton: {
        type: String,
        required: true,
    },
    hierarchy: {
        type: String,
        required: true,
    }
})
</script>

<template>
    <div>
        <button
            type={{typeButton}}
            :class="[
        'btn',
        hierarchy === 'primary' ? 'btn-primary' : '',
        hierarchy === 'secondary' ? 'btn-secondary' : ''
      ]"
            @click="action()">{{ text }}
        </button>
    </div>
</template>
