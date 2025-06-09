<script setup>
  import { RouterLink } from 'vue-router';
  import { defineProps, ref, computed } from 'vue';

  const props = defineProps({
    task: Object
  });

  const showFullDetails = ref(false);

  const truncatedDetails = computed(() => {
    let details = props.task.details;
    if (!showFullDetails.value) {
      details = details.substring(0, 100) + '...';
      return details;
    }
  });
</script>

<template>
  <div class="bg-white rounded-xl shadow-md relative border">
    <div class="p-4">
      <div class="mb-6">
        <h3 class="text-xl font-bold">{{ props.task.title }}</h3>
      </div>

      <div class="mb-5">
        {{ truncatedDetails }}
      </div>

      <div class="flex justify-between items-center">
        <div
        class="h-[36px] px-4 py-2 rounded-lg text-center text-sm text-white bg-gray-500 flex items-center"
        >
          Status: {{ props.task.is_completed ? 'finished' : 'pending' }}
          
          <i :class="props.task.is_completed ? 'pi pi-check-circle ml-2' : 'pi pi-hourglass ml-2'"></i>
        </div>

        <!-- "Read More" button -->
        <RouterLink
          :to="`/tasks/${task.id}`"
          class="h-[36px] bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-center text-sm"
        >
          More
        </RouterLink>
      </div>

    </div>
  </div>
</template>