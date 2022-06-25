<template>
    <section id="apartiment-list ">

    <div class="container">
      <nav class="navbar navbar-light text-primary">
        <div class="row justify-content-between align-items-center">
          <div class="col-12 col-lg-6">
            <!-- group input search -->
            <section>
              <div class="input-group">
                <input
                  type="text"
                  aria-label="First name"
                  class="form-control w-25"
                  v-model="searchAddress"
                  @keyup.enter="getApartments(searchAddress, nRooms, nBeds, nKm)"
                  placeholder="Città"

                />
                <input
                  type="number"
                  aria-label="Last name"
                  class="form-control"
                  v-model="nRooms"
                  placeholder="N. Stanze"
                  @keyup.enter="getApartments(searchAddress, nRooms, nBeds, nKm)"
                />
                <input
                  type="number"
                  aria-label="Last name"
                  class="form-control"
                  v-model="nBeds"
                  placeholder="N. Letti"
                  @keyup.enter="getApartments(searchAddress, nRooms, nBeds, nKm)"
                />
              </div>
            </section>
          </div>
          <div
            class="
              col-12 col-lg-5
              py-3
              d-flex
              justify-content-around
              align-items-center
            "
          >
            <label class="form-check-label">Seleziona il raggio dei Km</label>
            <!--group input km -->
            <section>
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="nKm"
                  id="nKm"
                  value="5"
                  v-model="nKm"
                  checked="checked"
                />
                <label class="form-check-label" for="nKm">5 Km</label>
              </div>
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="nKm"
                  id="nKm"
                  value="10"
                  v-model="nKm"
                />
                <label class="form-check-label" for="nKm">10 Km</label>
              </div>
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="nKm"
                  id="nKm"
                  value="20"
                  v-model="nKm"
                  checked
                />
                <label class="form-check-label" for="nKm">20 Km</label>
              </div>
            </section>
          </div>
          <div class="col-12 col-lg-1">
            <button
              class="btn btn-info my-2 my-sm-0"
              @click="getApartments(searchAddress, nRooms, nBeds, nKm)"
            >
              Cerca
            </button>
          </div>
        </div>
      </nav>
      <!--group input service -->
      <a @click="getBtbActive()" class="btn text-info">
        <h6 v-if="btnActive == false">Ricerca avanzata</h6>
        <p v-else>Chiudi ricerca avanzata</p>
      </a>
      <div class="row" :class="btnActive == false ? 'd-none' : 'dblock'">
        <section class="col-12 d-flex">
          <ul class="d-lg-flex flex-wrap justify-content-start">
            <li
              class="form-check px-3 py-2"
              v-for="(service, index) in services"
              :key="index"
            >
              <input
                class="form-check-input"
                type="checkbox"
                id="gridCheck1"
                :name="service.name"
                :value="service.name"
                v-model="checkedServices"
              />
              <label
                class="form-check-label"
                for="gridCheck1"
                required
                autocomplete="on"
              >
                {{ service.name }}
              </label>
            </li>
          </ul>
        </section>
      </div>
    </div>


    <!-- top pagination -->
    <div class="container" v-if="!isSearch">
        <div class="row">
            <div class="col-12">
                <Pagination
                    :currentPage="pagination.currentPage"
                    :lastPage="pagination.lastPage"
                    @onPageChange="changePage"
                />
            </div>
        </div>
    </div>

    <!-- all apartments -->
    <Loader v-if="isLoading" />
    <div v-else>
        <section class="container" v-if="isSearch">
            <div class="row">
            <ApartmentSearch
                v-for="apartment in apartmentsSearch"
                :key="apartment.index"
                :apartment="apartment"
            />
            </div>
            <h1 v-if="isEmpty">
                <div v-if="!searchAddress == ''">
                    Nessun appartamento disponibile nell'indirizzo indicato
                </div>
                <div v-else>
                    Controllare i campi
                </div>
            </h1>
        </section>
        <section class="container" v-else>
            <div class="row">
            <Apartment
                v-for="apartment in apartments"
                :key="apartment.index"
                :apartment="apartment"
            />
            </div>
        </section>
    </div>

    <!-- bottom pagination -->
    <div class="container" v-if="!isSearch">
        <div class="row">
            <div class="col-12">
                <Pagination
                    :currentPage="pagination.currentPage"
                    :lastPage="pagination.lastPage"
                    @onPageChange="changePage"
                />
            </div>
        </div>
    </div>
    </section>
</template>

<script>
import Loader from "../components/Loader.vue";
import Apartment from "../components/Apartment.vue";
import ApartmentSearch from "../components/ApartmentSearch.vue";
import Pagination from "../components/Pagination.vue";

export default {
    name: "Apartments",
    components: {
        Loader,
        Apartment,
        ApartmentSearch,
        Pagination,
    },
  data() {
    return {
      baseUri: "http://127.0.0.1:8000",
      apartments: [],
      apartmentsSearch: [],
      isSearch: false,
      isLoading: false,
      pagination: {},
      isActive: 0,
      searchAddress: "",
      nRooms: "",
      nBeds: "",
      nKm: "",
      isEmpty: false,
      services: [],
      checkedServices: [],
      btnActive: false,
    };
  },
  watch: {
    checkedServices: {
      handler: function () {
        this.filteredApartments();
      },
      deep: true,
    },
  },
  methods: {
    getServices() {
      axios
        .get(`${this.baseUri}/api/services`)
        .then((results) => {

          this.services = results.data;
        })
        .catch((error) => {
          console.warn(error);
        });
    },
    getApartments(address, nRooms, nBeds, nKm) {
        this.isLoading = true;
        this.isSearch = true;
        const params = new URLSearchParams();
        params.append("address", address);
        params.append("n_rooms", nRooms);
        params.append("n_beds", nBeds);
        params.append("nKm", nKm);
        const request = {
            params: params,
        };
        axios
            .get(`${this.baseUri}/api/apartments/search?`, request)
            .then((res) => {
            //this.apartmentsSearch = res.data[0];
            console.log(res.data[0]);
            this.isEmpty = false;
            })
            .catch((err) => {
            console.error(err);
            this.apartmentsSearch = [];
            this.isEmpty = true;
            })
            .then(() => {
            this.isLoading = false;
            });
    },
    getAllApartments(page) {
        this.isLoading = true;
        axios
        .get(`${this.baseUri}/api/apartments?page=${page}`)
        .then((results) => {
            console.log(results.data);
            const { data, current_page, last_page } = results.data;
            this.apartments = data;
            this.pagination = { currentPage: current_page, lastPage: last_page };
        })
        .catch((error) => {
          console.warn(error);
        })
        .then(() => {
            this.isLoading = false;
        });
    },
    changePage(page) {
        this.getAllApartments(page);
    },
    filteredApartments() {
      const filteredApartments = [];
      if (this.checkedServices.length) {
        this.apartmentsSearch.forEach((apartment) => {
          let counter = 0;
          apartment.services.forEach((service) => {
            if (this.checkedServices.includes(service.name)) {
              counter++;
              if (
                !filteredApartments.includes(apartment) &&
                counter == this.checkedServices.length
              ) {
                filteredApartments.push(apartment);
              }
            }
          });
        });
        this.apartmentsSearch = filteredApartments;
      } else {
        this.getApartments(this.searchAddress, this.nRooms, this.nBeds);
      }
    },
    getBtbActive() {
      if (this.btnActive) {
        this.btnActive = false;
      } else {
        this.btnActive = true;
      }
      console.log(this.btnActive);
    },
  },
  created(){
    //this.getAllApartments();
    setTimeout(this.getAllApartments(), 3000);
  },
  mounted() {
    //this.getAllApartments();
    this.getServices();
  },
};
</script>

<style>
</style>
