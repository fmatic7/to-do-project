<script setup>
import { onMounted } from 'vue';
import { ref } from 'vue';

  const name = ref('Milan');
  const status = ref('active');
  const tasks = ref(['Task 1', 'Task 2', 'Task 3']);
  const newTask = ref('');
  const link = ref('https://google.com');

  const toggleStatus = () => {
    status.value = (status.value === 'active') ? 'pending' : 
             (status.value === 'pending') ? 'inactive' :
             'active';
  };
  const addTask = () => {
    if (newTask.value.trim() !== '') {
      tasks.value.push(newTask.value);
      newTask.value = '';
    }
  };
  const deleteTask = (index) => {
    tasks.value.splice(index, 1);
  }

  // onMounted(async () => {
  //   try {
  //     const response = await fetch('https://jsonplaceholder.typicode.com/todos');
  //     const data = await response.json();
  //     tasks.value = data.map((task) => task.title);
  //   } catch (error) {
  //     console.log('Error fetching tasks');
  //   }
  // });
</script>

<template>
  
  <h1>{{ name }}</h1>
  <p>User is {{ status }}</p>
  <button @click="toggleStatus">Change Status</button>

  <br>
  <br>

  <form @submit.prevent="addTask">
    <label for="newTask">Add Task</label>
    <input type="text" name="newTask" id="newTask" v-model="newTask">
    <button type="submit">Submit</button>
  </form>

  <h3>Tasks:</h3>
  <ul>
    <li v-for="(task, index) in tasks" :key="index">
      <span>{{ task }}</span>
      <button @click="deleteTask(index)">X</button>
    </li>
  </ul>
  
  <br>

  <a :href="link">Click for Google</a>

</template>

