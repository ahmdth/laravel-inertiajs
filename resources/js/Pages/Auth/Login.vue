<template>
  <Head title="Register"/>
  <h2 class="text-3xl font-bold text-gray-700 text-center mt-16">Login</h2>
  <form @submit.prevent="submit" class="max-w-md mx-auto space-y-4" enctype="multipart/form-data">
    <div>
      <VLabel value="Email" for="email"/>
      <VInput id="email" type="email" v-model="form.email" autocomplete="email" autofocus/>
      <VError :message="errors.email"/>
    </div>
    <div>
      <VLabel value="Password" for="password"/>
      <VInput id="password" type="password" v-model="form.password"/>
      <VError :message="errors.password"/>
    </div>
    <div class="flex justify-between">
      <div class="flex items-center">
        <VCheckbox id="remember" v-model:checked="form.remember"/>
        <VLabel value="Remember Me" for="remember" class="inline-flex"/>
      </div>
      <Link href="/forgot-password" class="text-sm text-blue-500 hover:text-blue-700 hover:underline">Forgot password?</Link>
    </div>
    <div>
      <VButton :processing="processing">Login</VButton>
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
import VCheckbox from "@/Components/Form/VCheckbox.vue";

let props = defineProps({
  errors: Object
})

let form = useForm({
  email: "",
  password: "",
  remember: ""
})
let processing = ref(false)

let submit = () => {
  form.post("/login", {
    onStart: () => processing = true,
    onFinish: () => processing = false,
  })
}
</script>
