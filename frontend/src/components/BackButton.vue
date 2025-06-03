<script setup>
  import { RouterLink } from 'vue-router';

</script>

<template>
  <section>
    <div class="container m-auto px-2 py-6">
      <RouterLink to="/tasks" class="text-blue-500 hover:text-blue-600 flex items-center">
        <i class="pi pi-arrow-circle-left mr-2"></i> Back to Task Listings
      </RouterLink>
    </div>
  </section>
</template>