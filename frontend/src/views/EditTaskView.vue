<script setup>
  import { reactive, computed, onMounted } from 'vue';
  import { useRoute } from 'vue-router';
  import { useToast } from 'vue-toastification';
  import router from '@/router';
  import axios from 'axios';

  const route = useRoute();

  const taskId = route.params.id;

  const form = reactive({
    title: '',
    details: '',
    is_completed: false,
    completed_at: null
  });

  const state = reactive({
    task: {},
    isLoading: true
  });

  const toast = useToast();

  const statusString = computed({
    get() {
      return form.is_completed ? 'finished' : 'pending';
    },
    set(value) {
      form.is_completed = value === 'finished';
      if (!form.is_completed) {
        form.completed_at = null;
      }
    }
  });

  const handleSubmit = async () => {
    if (form.title.trim() === '' || form.details.trim() === '') {
      toast.warning(
        'Please fill out both Title and Details fields',
        {
          timeout: 5000,
          position: 'top-right'
        }
      );
      return;
    }

    const updatedTask = {
      title: form.title,
      details: form.details,
      is_completed: form.is_completed,
      completed_at: form.completed_at
    };

    try {
      const response = await axios.put(`/api/tasks/${taskId}`, updatedTask);
      toast.success('Task updated successfully');
      router.push(`/tasks/${response.data.task.id}`);
    } catch (error) {
      console.error('Error updating task', error); 
      toast.error('Task was not updated');

    }
  }

  onMounted(async () => {
    try {
      const response = await axios.get(`/api/tasks/${taskId}`);
      state.task = response.data;

      form.title = state.task.title;
      form.details = state.task.details;
      form.is_completed = state.task.is_completed; 
      form.completed_at = state.task.completed_at;
    } catch (error) 
    {
        console.error('Error fetching task', error);
        
    } finally {
      state.isLoading = false;
    }
  });
</script>

<template>
  <section class="min-h-screen bg-blue-50">
    <form @submit.prevent="handleSubmit" class="max-w-md mx-auto pt-5 pb-3 px-3 bg-white mt-10 border-1 border rounded-xl shadow-md space-y-6">
      <h2 class="text-2xl font-bold text-center">
        Edit Task
      </h2>

      <!-- Title -->
      <div>
        <label for="title" class="block text-sm font-medium text-gray-500">Title</label>
        <input v-model="form.title" type="text" id="title" name="title"
          class="px-2 py-1 mt-1 block w-full rounded-md text-sm border shadow focus:ring-blue-500 focus:border-blue-500" />
      </div>

      <!-- Details -->
      <div>
        <label for="details" class="block text-sm font-medium text-gray-500">Details</label>
        <textarea v-model="form.details" id="details" name="details" rows="4"
          class="px-2 py-1 mt-1 block w-full rounded-md text-sm border shadow focus:ring-1 focus:ring-blue-500 focus:border-blue-500"></textarea>
      </div>

      <!-- Status -->
      <div>
        <label for="status" class="block text-sm font-medium text-gray-500">Status</label>
        <select v-model="statusString" id="status" name="status"
          class="px-2 py-1 mt-1 block w-full rounded-md text-sm border shadow focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
          <option value="pending">pending</option>
          <option value="finished">finished</option>
        </select>
      </div>

      <!-- Completed At -->
      <div>
        <label for="completed_at" class="block text-sm font-medium text-gray-500">Completed At</label>
        <input v-model="form.completed_at" type="datetime-local" :disabled="!form.is_completed" id="completed_at" name="completed_at"
          class="px-2 py-1 mt-1 block w-full rounded-md border text-sm shadow focus:ring-blue-500 focus:border-blue-500" />
      </div>

      <!-- Submit Button -->
      <div class="text-center">
        <button 
          type="submit"
          class="px-6 py-2 bg-blue-600 
          text-white font-semibold rounded-md 
          hover:bg-blue-700 transition"
          >
            Update Task
        </button>
      </div>
    </form>
  </section>
</template>