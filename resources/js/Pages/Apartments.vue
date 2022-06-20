<template>
  <section id="apartiment-list">
    <!-- <h2>I miei appartamenti</h2> -->
    <nav class="navbar navbar-light bg-light">
      <form class="form-inline">
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
          v-model="searchApartment"
          @keyup="
            getApartments(searchApartment, nBath, nRooms, nBeds, nFloor, nPrice)
          "
        />
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="nBath"
          aria-label="nBath"
          v-model="nBath"
          @keyup="
            getApartments(searchApartment, nBath, nRooms, nBeds, nFloor, nPrice)
          "
        />
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="nRooms"
          aria-label="nRooms"
          v-model="nRooms"
          @keyup="
            getApartments(searchApartment, nBath, nRooms, nBeds, nFloor, nPrice)
          "
        />
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="nBeds"
          aria-label="nBeds"
          v-model="nBeds"
          @keyup="
            getApartments(searchApartment, nBath, nRooms, nBeds, nFloor, nPrice)
          "
        />
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="nFloor"
          aria-label="nFloor"
          v-model="nFloor"
          @keyup="
            getApartments(searchApartment, nBath, nRooms, nBeds, nFloor, nPrice)
          "
        />
        <input
          class="form-control mr-sm-2"
          type="search"
          placeholder="nPrice"
          aria-label="nPrice"
          v-model="nPrice"
          @keyup="
            getApartments(searchApartment, nBath, nRooms, nBeds, nFloor, nPrice)
          "
        />

        <!--<button class="btn btn-outline-success my-2 my-sm-0" type="submit" @click="getApartments(searchApartment, nBath)">Search</button>-->
      </form>
    </nav>

    <!--  <TomTomMap /> -->
    <!-- <Search @search="search" /> -->
    <Loader v-if="isLoading" />
    <div v-else>
      <!--<Pagination
        :currentPage="pagination.currentPage"
        :lastPage="pagination.lastPage"
        @onPageChange="changePage"
      />-->
      <section class="container">
        <div class="row">
          <Apartment
            v-for="apartment in apartments"
            :key="apartment.index"
            :apartment="apartment"
          />
        </div>
      </section>
      <!--<Pagination
        :currentPage="pagination.currentPage"
        :lastPage="pagination.lastPage"
        @onPageChange="getApartments(page)"
      />-->
    </div>
  </section>
</template>

<script>
import Pagination from "../components/Pagination.vue";
import Loader from "../components/Loader.vue";
import Apartment from "../components/Apartment.vue";
/* import TomTomMap from "../components/TomTomMap.vue"; */
import Search from "../components/Search.vue";

export default {
  name: "Apartments",
  components: {
    Pagination,
    Loader,
    Apartment,
    /* TomTomMap, */
    Search,
  },
  data() {
    return {
      baseUri: "http://127.0.0.1:8000",
      apartments: [],
      isLoading: false,
      pagination: {},
      isActive: 0,
      searchApartment: "",
      nBath: "",
      nRooms: "",
      nBeds: "",
      nFloor: "",
      nPrice: "",
    };
  },
  methods: {
    getApartments(){
            axios
            .get(`http://127.0.0.1:8000/api/apartments`)
            .then((results) => {
                console.log(results.data.data)
                this.apartments = results.data.data;
                // console.log(this.posts)
                // const { current_page, last_page } = results.data;
                // this.activePage = {currentPage : current_page, lastPage : last_page};
            })
            .catch((error) => {
                console.warn(error)
            });
        }
    // getApartments(title, nBath, nRooms, nBeds, nPrice) {
    //   this.isLoading = true;
    //   const params = new URLSearchParams();
    //   params.append("title", title);
    //   params.append("n_bathrooms", nBath);
    //   params.append("n_rooms", nRooms);
    //   params.append("n_beds", nBeds);
    //   params.append("price", nPrice);
    //   const request = {
    //     params: params,
    //   };
    //   axios
    //     .get(`${this.baseUri}/api/apartments/search?`, request)
    //     .then((res) => {
    //       const { data, current_page, last_page } = res;
    //       this.apartments = data;
    //       this.pagination = { currentPage: current_page, lastPage: last_page };
    //       console.log(this.apartments);
    //       //console.log(this.apartments[1].images[0].link);
    //     })
    //     .catch((err) => {
    //       console.error(err);
    //     })
    //     .then(() => {
    //       this.isLoading = false;
    //     });
    // },
    // // changePage(page) {
    // //   this.getApartments(page);
    // },
    // search() {
    //   this.getApartments();
    //   console.log("clicco la funzione");
    // },
  },
  created() {
    this.getApartments();
  },
  mounted() {
    //this.getApartments();
  },
};
</script>

<style>
</style>
