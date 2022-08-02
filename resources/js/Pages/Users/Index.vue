<template>
  <Head title="Users"/>
  <div class="flex justify-between items-center">
    <div class="flex items-center">
      <h1 class="text-4xl font-bold mr-4">Users</h1>
      <Link href="/users/create" class="text-blue-500 text-sm">Create user</Link>
    </div>
    <input
      type="text"
      v-model="search"
      placeholder="Search..."
      class="placeholder:text-sm px-4 py-1 rounded-lg border border-gray-300 focus:ring focus:outline-none">
  </div>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Avatar
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="user in users.data" :key="user.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="w-24 h-24">
                  <img :src="user.avatar" :alt="user.name">
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class=" items-center">
                  <div class="font-medium text-gray-900">{{ user.name }}</div>
                  <p class="text-sm text-gray-500">{{ user.email }}</p>
                </div>
              </td>
              <td
                class="flex items-center h-full px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end space-x-3">
                <Link :href="route('users.edit', user.id)" class="text-indigo-600 hover:text-indigo-900">
                  <PencilAltIcon class="h-5 w-5 text-blue-500"/>
                </Link>
                <Link :href="route('users.show', user.id)" class="text-indigo-600 hover:text-indigo-900">
                  <EyeIcon class="h-5 w-5 text-green-500"/>
                </Link>
                <button @click="destroy(user.id)" class="text-indigo-600 hover:text-indigo-900">
                  <TrashIcon class="h-5 w-5 text-red-500"/>
                </button>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--  Paginator -->
  <div class="mt-6">
    <Pagination :links="users.links"/>
  </div>

</template>
<script setup>
import Pagination from "@/Shared/Pagination";
import {ref, watch} from 'vue'
import {Inertia} from '@inertiajs/inertia'
import debounce from "lodash/debounce"
import {PencilAltIcon, TrashIcon, EyeIcon} from "@heroicons/vue/outline"

let props = defineProps({
  users: Object,
  filters: Object
})

let destroy = id => {
  if (confirm('Are you sure?')) {
    Inertia.delete(`/users/${id}`)
  }
}

let search = ref(props.filters.search)
watch(search, debounce(function (value) {
  Inertia.get('/users', {search: value}, {
    preserveState: true,
    replace: true
  })
}, 500))
</script>
