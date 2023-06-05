<template>
  <Head title="Register"/>
  <h2 class="text-3xl font-bold text-gray-700 text-center mt-16">Register</h2>
  <form @submit.prevent="submit" class="max-w-md mx-auto space-y-6" enctype="multipart/form-data">
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
      <VButton :processing="processing">Register</VButton>
    </div>
  </form>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import {ref} from "vue";
import VError from "@/Components/Form/VError.vue";
import VInput from "@/Components/Form/VInput.vue";
import VLabel from "@/Components/Form/VLabel.vue";
import VButton from "@/Components/Form/VButton.vue";

defineProps({
  errors: Object
})

let form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: ""
})
let processing = ref(false)

let submit = () => {
  form.post("/register", {
    onStart: () => processing = true,
    onFinish: () => processing = false,
  })
}
</script>
