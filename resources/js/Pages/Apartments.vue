<template>
  <section id="apartiment-list">
    <h2>I miei appartamenti</h2>

    <TomTomMap />
    <Search @search="search" />
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
import TomTomMap from "../components/TomTomMap.vue";
import Search from "../components/Search.vue";

export default {
  name: "Apartments",
  components: {
    Pagination,
    Loader,
    Apartment,
    TomTomMap,
    Search,
  },
  data() {
    return {
      baseUri: "http://localhost:8000",
      apartments: [],
      isLoading: false,
      pagination: {},
      isActive: 0,
      searchApartment: [],
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
          console.log(this.apartments[1].images[0].link);
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
    search() {
      this.getApartments();
      console.log("clicco la funzione");
    },
  },
  created() {
    /* this.getApartments(); */
  },
  mounted() {
    this.getApartments();
  },
};
</script>

<style>
</style>
