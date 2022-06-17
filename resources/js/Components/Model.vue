<template>
  <Transition name="modal">
    <div v-if="show"
         class="fixed z-50 inset-0 w-full h-full bg-black bg-opacity-50 table transition-opacity duration-300 ease-in">
      <div class="table-cell align-middle">
        <div class="max-w-md my-0 mx-auto p-7 bg-white rounded-2xl shadow-2xl transition-all duration-300 ease-in">
          <div class="flex justify-between items-center font-bold mb-4">
            <slot name="header">
              <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <span>Warning</span>
              </div>
              <button @click="$emit('close')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
              </button>
            </slot>
          </div>
          <div class="mb-4">
            <slot name="body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ipsa cumque vero unde enim?
            </slot>
          </div>
          <div class="flex justify-end">
            <slot name="footer">
              <button class="text-sm font-bold px-4 py-2 rounded-lg mr-4 bg-yellow-400" @click="$emit('close')">
                CANCEL
              </button>
              <button class="text-sm font-bold px-4 py-2 rounded-lg border" @click="$emit('close')">
                OK
              </button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </Transition>
</template>

<script setup>
defineProps({
  show: {
    type: Boolean,
    default: false
  },
})
</script>

<style>
.modal-enter-from,
.modal-leave-to {
  opacity: 0;
}

.modal-enter-from .modal-container,
.modal-leave-to .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
