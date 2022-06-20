<template>
  <input
    type="checkbox"
    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    @input="$emit('update:modelValue', $event.target.value)"
    :value="modelValue"
  />
</template>

<script setup>
defineProps({
  modelValue: {
    type: [Array, Boolean],
    default: false,
  },
});
defineEmits(["update:modelValue"]);
</script>
