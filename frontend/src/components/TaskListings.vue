 <script setup>
  import { RouterLink } from 'vue-router';
  import TaskListing from '@/components/TaskListing.vue'
  import { reactive, defineProps, onMounted } from 'vue';
  import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
  import axios from 'axios';

  defineProps({
    limit: Number,
    showButton: {
      type: Boolean,
      default: false
    }
  });

  const state = reactive({
    tasks: [],
    isLoading: true
  });

  onMounted(async () => {
    try {
      const response = await axios.get('/api/tasks');
      state.tasks = response.data;
    } catch (error) {
      console.error('Error fetching tasks', error); 
    } finally {
      state.isLoading = false;
    }
  });
</script>

 <template>

  <section class="bg-gray-50 px-4 py-10">
    <div class="container-xl lg:container m-auto">
      <h2 class="text-3xl font-bold text-green-600 mb-6 text-center">Browse Tasks</h2>
      <!-- Loading spinner -->
      <div v-if="state.isLoading" class="text-center text-gray-500 py-6">
        <PulseLoader />
      </div>
      
      <!-- Show task listing when loaded -->
      <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <TaskListing v-for="(task, index) in state.tasks.slice(0, limit || state.tasks.length)" :key="index" :task="task" />
      </div>
    </div> 
  </section>
  <section v-if="showButton" class="m-auto max-w-lg my-10 px-6">
    <RouterLink
      to="/tasks"
      class="block bg-black text-white text-center py-4 px-6 rounded-xl hover:bg-gray-700"
    >
      View All Tasks
    </RouterLink>
  </section>
 </template>