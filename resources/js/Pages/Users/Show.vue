<template>
  <Head :title="`User ${user.name}`" />
  <div>
    <h3 class="font-bold">{{ user.name }}</h3>
    <p class="text-gray-600">{{ user.email }}</p>
  </div>
</template>

<script setup>
import {Head} from "@inertiajs/inertia-vue3"
let props = defineProps({
  user: Array
})
</script>
