<template>
  <Link :href="href" class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition" :class="classes">
    <slot/>
  </Link>
</template>

<script setup>
import {computed} from "vue";

let props = defineProps({
  href: String,
  active: Boolean
})

let classes = computed(() => props.active
  ? 'text-gray-900 focus:outline-none focus:border-indigo-700 border-indigo-400'
  : 'text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 border-transparent'
)
</script>
