<script setup>
  import { RouterLink, useRoute } from 'vue-router';
  import logo from '@/assets/img/logo.png';

  const isActiveLink = (routePath) => {
    const route = useRoute();
    return route.path === routePath;
  };
</script>

<template>
  <nav class="bg-cyan-500 border-b border-cyan-900">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="flex h-20 items-center justify-between">
        <div
          class="flex flex-1 items-center justify-center md:items-stretch md:justify-start"
        >
          <!-- Logo -->
          <RouterLink class="flex flex-shrink-0 items-center mr-4" to="/">
            <img class="h-10 w-auto" :src="logo" alt="To-Do List" />
            <span class="hidden md:block text-white text-2xl font-bold ml-2"
              >To-Do List</span>
          </RouterLink>

          <div class="md:ml-auto">
            <div class="flex space-x-2">
              <RouterLink
                to="/"
                :class="[isActiveLink('/') ? 'bg-blue-600' : 'hover:bg-blue-900 hover:text-white', 'text-white', 'px-3', 'py-2', 'rounded-md']"
                
              >
                Home
              </RouterLink>

              <RouterLink
                to="/tasks"
                :class="[isActiveLink('/tasks') ? 'bg-blue-600' : 'hover:bg-blue-900 hover:text-white', 'text-white', 'px-3', 'py-2', 'rounded-md']"
              >
                Tasks
              </RouterLink>

              <RouterLink
                to="/tasks/add"
                :class="[isActiveLink('/tasks/add') ? 'bg-blue-600' : 'hover:bg-blue-900 hover:text-white', 'text-white', 'px-3', 'py-2', 'rounded-md']"
              >
                Add Task
              </RouterLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>