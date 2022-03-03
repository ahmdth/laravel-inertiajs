<template>
  <Head title="Create User"/>
  <h2 class="text-3xl font-bold text-gray-700">Create New user</h2>
  <form @submit.prevent="submit" class="max-w-md mx-auto" enctype="multipart/form-data">
    <div class="mt-6">
      <label for="name" class="block mb-2 text-sm">Name</label>
      <input
        type="text"
        v-model="form.name"
        id="name"
        class="px-4 py-2 w-full border border-gray-300 focus:outline-none focus:ring focus:border-blue-500"
      />
      <div v-if="errors.name" v-text="errors.name" class="text-red-500 text-sm mt-1"></div>
    </div>
    <div class="mt-6">
      <label for="email" class="block mb-2 text-sm">Email</label>
      <input
        type="email"
        v-model="form.email"
        id="email"
        class="px-4 py-2 w-full border border-gray-300 focus:outline-none focus:ring focus:border-blue-500"
      />
      <div v-if="errors.email" v-text="errors.email" class="text-red-500 text-sm mt-1"></div>
    </div>
    <div class="mt-6">
      <label for="avatar" class="block mb-2 text-sm">Avatar</label>
      <input
        type="file"
        @input="form.avatar = $event.target.files[0]"
        id="avatar"
        class="file:px-4 file:py-2 file:bg-blue-100 file:font-semibold file:text-blue-600 file:border-0 file:rounded-md file:mr-4 file:pointer bg-gray-50 text-sm w-full focus:outline-none focus:ring focus:border-blue-500"
      />
      <div v-if="errors.avatar" v-text="errors.avatar" class="text-red-500 text-sm mt-1"></div>
    </div>
    <div class="mt-6">
      <label for="password" class="block mb-2 text-sm">Password</label>
      <input
        type="password"
        v-model="form.password"
        id="password"
        class="px-4 py-2 w-full border border-gray-300 focus:outline-none focus:ring focus:border-blue-500"
      />
      <div v-if="errors.password" v-text="errors.password" class="text-red-500 text-sm mt-1"></div>
    </div>
    <div class="mt-6">
      <button type="submit"
              :disabled="processing"
              :class='{"bg-blue-400 cursor-not-allowed hover:bg-blue-400":processing}'
              class="px-4 py-2 w-full bg-blue-600 text-white cursor-pointer hover:bg-blue-500 focus:outline-none focus:ring focus:border-blue-500">
        <svg v-show="processing" role="status"
             class="inline mr-2 w-5 h-5 text-white animate-spin dark:text-gray-600 fill-blue-600"
             viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
            fill="currentColor"/>
          <path
            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
            fill="currentFill"/>
        </svg>
        Create
      </button>
    </div>
  </form>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

defineProps({
  errors: Object
})

let form = useForm({
  name: '',
  email: '',
  password: '',
  avatar: '',
})
let processing = ref(false);
let submit = () => {
  // form.post('/users', {
  //   forceFormData: true,
  // })
  processing.value = true;
  Inertia.post('/users', form, {
    forceFormData: true,
    onStart: () => {
      processing.value = true;
    },
    onFinish: () => {
      processing.value = false;
    }
  })
}
</script>
