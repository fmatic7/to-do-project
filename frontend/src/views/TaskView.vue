<script setup>
  import BackButton from '@/components/BackButton.vue';
  import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
  import { reactive, onMounted } from 'vue';
  import { useRoute, RouterLink, useRouter } from 'vue-router';
  import { useToast } from 'vue-toastification';
  import axios from 'axios';

  const route = useRoute();
  const router = useRouter();
  const toast = useToast();

  const taskId = route.params.id;

  const state = reactive({
    task: {},
    isLoading: true
  });

  const deleteTask = async () => {
    try {
      const confirm = window.confirm('Are you sure you want to delete this task?');
      if (confirm) {
        await axios.delete(`/api/tasks/${taskId}`);
        toast.success('Task deleted successfully');
        router.push('/tasks');
      }
      
    } catch (error) {
      console.error('Errod deleting job', error);
      toast.error('Job was not deleted');
    }
  };

  onMounted(async () => {
    try {
      const response = await axios.get(`/api/tasks/${taskId}`);
      state.task = response.data;
    } catch (error) {
      console.error('Error fetching task', error); 
    } finally {
      state.isLoading = false;
    }
  });
</script>

<template>
  <section class="bg-gray-50">
    <BackButton />
    <section v-if="!state.isLoading">
      <div class="max-w-2xl mx-auto mt-10 px-4" v-if="state.task">
        <div class="bg-white rounded-xl shadow-md relative border">
          <div class="p-4">
            <div class="mb-6">
              <h3 class="text-xl font-bold">{{ state.task.title }}</h3>
            </div>

            <div class="mb-5">
              {{ state.task.details }}
            </div>

            <div class="flex justify-between items-center">
              <div
              class="h-[36px] px-4 py-2 rounded-lg text-center text-sm text-white bg-gray-500 flex items-center"
              >
                Status: {{ state.task.is_completed ? 'finished' : 'pending' }}
                <span v-if="state.task.is_completed" class="text-xs opacity-80 mx-2">
                  ({{ state.task.completed_at }})
                </span>

                <i :class="state.task.is_completed ? 'pi pi-check-circle ml-2' : 'pi pi-hourglass ml-2'"></i>
              </div>
              
              <div class="flex space-x-2">
                <RouterLink
                  :to="`/tasks/${state.task.id}/edit`"
                  class="h-[36px] bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm"
                >
                  Edit Task
                </RouterLink>

                <button @click="deleteTask"
                  class="h-[36px] bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm"
                >
                  Delete Task
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div v-else class="text-center text-gray-500 py-6">
      <PulseLoader />
    </div>
  </section>
</template>