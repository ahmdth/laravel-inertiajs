<template>
  <Head title="Register"/>
  <h2 class="text-3xl font-bold text-gray-700 text-center my-10">Reset Password</h2>
  <form @submit.prevent="submit" class="max-w-md mx-auto space-y-6">
    <div>
      <VLabel value="Email" for="email"/>
      <VInput id="email" type="email" v-model="email" autocomplete="email"/>
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

let props = defineProps({
  email: String,
  token: String,
  errors: Object
})

let form = useForm({
  email: props.email,
  password: "",
  password_confirmation: "",
  token: props.token
})
let processing = ref(false)

let submit = () => {
  form.post("/reset-password", {
    onStart: () => processing = true,
    onFinish: () => processing = false,
  })
}
</script>
