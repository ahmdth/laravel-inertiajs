<template>
  <Head title="Forgot Password"/>
  <h2 class="text-3xl font-bold text-gray-700 text-center my-10">Send reset password link</h2>
  <form v-if="!$page.props.message.success" @submit.prevent="submit" class="max-w-md mx-auto space-y-6">
    <div>
      <VLabel value="Email" for="email"/>
      <VInput id="email" type="email" v-model="form.email" autocomplete="email" autofocus/>
      <VError :message="errors.email"/>
    </div>
    <div>
      <VButton :processing="processing">Reset Password</VButton>
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
  email: "",
})
let processing = ref(false)

let submit = () => {
  form.post("/forgot-password", {
    onStart: () => processing = true,
    onFinish: () => processing = false,
  })
}
</script>
