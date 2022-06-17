<template>
  <div v-if="message" v-text="message" class="text-red-500 text-sm mt-1"></div>
</template>

<script setup>
defineProps({
  message: {
    type: [String, Number],
    default: null
  }
})
</script>
