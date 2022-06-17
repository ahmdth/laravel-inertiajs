<template>
  <button
    :type="type"
    :disabled="processing"
    :class='{"bg-blue-400 cursor-not-allowed hover:bg-blue-400":processing}'
    class="px-4 py-2 w-full bg-blue-600 text-white hover:bg-blue-500 focus:outline-none focus:ring focus:border-blue-500">
    <LoadingIcon :processing="processing"/>
    <slot></slot>
  </button>
</template>

<script setup>
import LoadingIcon from "@/Components/LoadingIcon";

defineProps({
  type: {
    type: String,
    default: "submit",
  },
  processing: {
    type: Boolean,
    default: false
  }
});
</script>
