<script>
import TodoList from './components/TodoList.vue'

export default {
  name: "App",
  components: {
    TodoList
  }
}
</script>

<template>

  <TodoList />
</template>

<style lang="scss">
@use './styles/generals.scss' as*;
</style>
