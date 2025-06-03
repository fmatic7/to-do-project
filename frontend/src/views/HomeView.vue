<script setup>
  import Welcome from '@/components/Welcome.vue';
  import HomeCards from '@/components/HomeCards.vue';
  import TaskListings from '@/components/TaskListings.vue';

</script>

<template>
  <Welcome title="Welcome" subtitle="The more tasks you complete, the more you improve"/>
  <HomeCards />
  <TaskListings :limit="3" :showButton="true" />
</template>