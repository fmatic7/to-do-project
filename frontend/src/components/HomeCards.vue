<script setup>
  import { RouterLink } from 'vue-router';
  import Card from '@/components/Card.vue';
</script>

<template>
  <section class="py-4">
    <div class="container-xl lg:container m-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 rounded-lg">
        <Card bg="bg-blue-100">
          <h2 class="text-2xl font-bold">Explore</h2>
          <p class="mt-2 mb-4">
            Browse your tasks and start completing them
          </p>
          <RouterLink
            to="/tasks"
            class="inline-block bg-blue-500 text-white rounded-lg px-4 py-2 hover:bg-blue-700"
          >
            Browse Tasks
          </RouterLink>
        </Card>

        <Card bg="bg-green-100">
          <h2 class="text-2xl font-bold">New Task</h2>
          <p class="mt-2 mb-4">
            List new task with the description here
          </p>
          <RouterLink
            to="/tasks/add"
            class="inline-block bg-green-500 text-white rounded-lg px-4 py-2 hover:bg-green-700"
          >
            Add Task
          </RouterLink>
        </Card>
      </div>
    </div>
  </section>
</template>