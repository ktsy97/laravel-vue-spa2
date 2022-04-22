<template>
  <button class="btn btn-sm btn-primary">
    <router-link
      v-bind:to="{ name: 'cities.current' }"
      class="text-white text-decoration-none"
      >一覧</router-link
    >
  </button>
</template>
<script>
export default {};
</script>
