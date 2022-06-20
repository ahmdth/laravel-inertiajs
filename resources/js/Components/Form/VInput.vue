<template>
  <input
    :type="type"
    class="px-4 py-2 w-full border border-gray-300 focus:outline-none focus:ring focus:border-blue-500"
    @input="$emit('update:modelValue', $event.target.value)"
    :value="modelValue"
  >
</template>

<script setup>
defineProps({
  modelValue: {
    default: ''
  },
  type: {
    type: String
  }
})
defineEmits(['update:modelValue'])

</script>
