<template>
  <Head title="Create User"/>
  <h2 class="text-3xl font-bold text-gray-700">Edit user</h2>
  <form @submit.prevent="submit" class="max-w-md mx-auto space-y-6 mt-8">
    <div>
      <VLabel value="Name" for="name"/>
      <VInput type="text" v-model="form.name" autofocus/>
      <VError :message="errors.name"/>
    </div>
    <div>
      <VLabel value="Email" for="email"/>
      <VInput id="email" type="email" v-model="form.email" autocomplete="email"/>
      <VError :message="errors.email"/>
    </div>
    <div>
      <VLabel value="Password" for="password"/>
      <VInput id="password" type="password" v-model="form.password"/>
      <VError :message="errors.password"/>
    </div>
    <div>
      <VLabel value="Password Confirmation" for="password_confirmation"/>
      <VInput id="password_confirmation" type="password" v-model="form.password_confirmation"/>
      <VError :message="errors.password_confirmation"/>
    </div>
    <div>
      <VButton :processing="processing">Update</VButton>
    </div>
  </form>
</template>

<script setup>
import {ref} from 'vue'
import {useForm} from '@inertiajs/inertia-vue3'
import VLabel from "@/Components/Form/VLabel";
import VInput from "@/Components/Form/VInput";
import VError from "@/Components/Form/VError";
import VButton from "@/Components/Form/VButton";

let props = defineProps({
  errors: Object,
  user: Object
})

let form = useForm({
  name: props.user.name,
  email: props.user.email,
})

let processing = ref(false);
let submit = () => {
  form.put(`/users/${props.user.id}`, {
    preserveScroll: true,
    onSuccess: () => alert("user updated successfully"),
    onStart: () => processing.value = true,
    onFinish: () => processing.value = false
  })
}
</script>
