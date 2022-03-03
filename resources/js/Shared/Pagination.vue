<template>
  <div>
    <Component
      :is="link.url?'Link':'Span'"
      v-for="link in links"
      v-html="link.label"
      class="px-1"
      preserve-scroll
      :class="link.url?'text-blue-700':'text-gray-400', link.active?'font-bold':''"
      :href="link.url"/>
  </div>
</template>

<script>
export default {
  name: "Pagination",
  props: {
    links: Array
  }
}
</script>
