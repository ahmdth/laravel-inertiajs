<template>
  <header class=" bg-gray-100 p-6">
    <div class="max-w-5xl mx-auto flex justify-between">
      <div class="flex">
        <h3 class="text-xl font-bold">My App</h3>
        <p class="ml-4">welcome back {{ $page.props.user?.name }}!</p>
      </div>
      <Nav/>
    </div>
  </header>
  <div class="max-w-5xl mx-auto py-6">
    <div v-if="$page.props.message.success"
         class="bg-green-100 text-green-600 text-sm px-4 py-2 border border-green-600 rounded-2xl fixed bottom-6 right-6">
      {{ $page.props.message.success }}
    </div>
    <slot/>
  </div>
</template>

<script>
import Nav from "./Nav.vue";

export default {
  name: "Layout",
  components: {Nav},
}
</script>
