<template>
  <section id="apartiment-list">
    <h2>I miei appartamenti</h2>
    <Loader v-if="isLoading" />
    <div v-else>
      <Pagination
        :currentPage="pagination.currentPage"
        :lastPage="pagination.lastPage"
        @onPageChange="changePage"
      />
      <Apartment
        v-for="apartment in apartments"
        :key="apartment.index"
        :apartment="apartment"
      />
      <Pagination
        :currentPage="pagination.currentPage"
        :lastPage="pagination.lastPage"
        @onPageChange="getApartments(page)"
      />
    </div>
  </section>
</template>

<script>
import Pagination from "../components/Pagination.vue";
import Loader from "../components/Loader.vue";
import Apartment from "../components/Apartment.vue";
export default {
  name: "Apartments",
  component: {
    Pagination,
    Loader,
    Apartment,
  },
  data() {
    return {
      baseUri: "http://localhost:8000",
      apartments: [],
      isLoading: false,
      pagination: {},
      isActive: 0,
    };
  },
  methods: {
    getApartments(page) {
      this.isLoading = true;
      axios
        .get(`${this.baseUri}/api/apartments?page=${page}`)
        .then((res) => {
          const { data, current_page, last_page } = res.data;
          this.apartments = data;
          this.pagination = { currentPage: current_page, lastPage: last_page };
          console.log(this.apartments);
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
    changePage(page) {
      this.getApartments(page);
    },
  },
  created() {
    this.getApartments();
  },
};
</script>

<style>
</style>
