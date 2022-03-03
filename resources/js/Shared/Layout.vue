<template>
  <header class=" bg-gray-200 p-6">
    <div class="max-w-5xl mx-auto flex justify-between">
      <div class="flex">
        <h3 class="text-xl font-bold">My App</h3>
        <p class="ml-4">welcome back {{ $page.props.username }}!</p>
      </div>
      <Nav/>
    </div>
  </header>
  <div class="max-w-5xl mx-auto py-6">
    <slot/>
  </div>
</template>

<script>
import Nav from "./Nav";

export default {
  name: "Layout",
  components: {Nav},
}
</script>
