<template>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li
        class="page-item"
        v-if="currentPage > 1"
        @click="$emit('onPageChange', currentPage - 1)"
      >
        <a class="page-link">Precedente</a>
      </li>

      <li
        v-for="page in lastPage"
        :key="page"
        class="page-item"
        :class="page === currentPage ? 'active' : ''"
        @click="$emit('onPageChange', page)"
      >
        <a class="page-link">{{ page }}</a>
      </li>

      <li
        class="page-item"
        v-if="lastPage > currentPage"
        @click="$emit('onPageChange', currentPage + 1)"
      >
        <a class="page-link">Successiva</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "Pagination",
  props: ["currentPage", "lastPage"],
};
</script>

<style scoped lang="scss">
.page-item {
  cursor: pointer;
}
</style>
