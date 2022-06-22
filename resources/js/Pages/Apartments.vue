<template>
    <section id="apartiment-list">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-light bg-light">
                        <!--<form class="form-inline">-->
                            <input
                            class="form-control mr-sm-2"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                            v-model="searchAddress"
                            />
                            <input
                            class="form-control mr-sm-2"
                            type="number"
                            placeholder="Numero Stanze"
                            aria-label="nRooms"
                            v-model="nRooms"
                            />
                            <input
                            class="form-control mr-sm-2"
                            type="number"
                            placeholder="Numero Letti"
                            aria-label="nBeds"
                            v-model="nBeds"
                            />

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="nKm" id="nKm" value="5" v-model="nKm">
                                <label class="form-check-label" for="nKm">5 Km</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="nKm" id="nKm" value="10" v-model="nKm">
                                <label class="form-check-label" for="nKm">10 Km</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="nKm" id="nKm" value="20" v-model="nKm" checked>
                                <label class="form-check-label" for="nKm">20 Km</label>
                            </div>

                            <div class="form-check" v-for="(service, index) in services" :key="index">
                                <input class="form-check-input"
                                    type="checkbox" id="gridCheck1" :name="service.name" :value="service.name" v-model="checkedServices">
                                <label class="form-check-label" for="gridCheck1" required autocomplete="on">
                                    {{ service.name }}
                                </label>
                            </div>

                            <button class="btn btn-outline-success my-2 my-sm-0" @click="getApartments(searchAddress, nRooms, nBeds, nKm)">Search</button>
                        <!--</form>-->
                    </nav>
                </div>
            </div>
        </div>

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
                <h1 v-if="isEmpty">Nessun appartamento disponibile nell'indirizzo indicato</h1>
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
    </section>
</template>

<script>
import Loader from "../components/Loader.vue";
import Apartment from "../components/Apartment.vue";
import ApartmentSearch from '../components/ApartmentSearch.vue';


export default {

    name: "Apartments",
    components: {
        Loader,
        Apartment,
        ApartmentSearch
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
            checkedServices: []
        };
    },
    watch: {
        checkedServices: {
            handler: function (){
                this.filteredApartments()
            },
            deep: true
        }
    },
    methods: {
        getServices(){
            axios
                .get(`${this.baseUri}/api/services`)
                .then((results) => {
                    console.log(results.data)
                    this.services = results.data;
                })
                .catch((error) => {
                    console.warn(error)
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
                    this.apartmentsSearch = res.data[0];
                    this.isEmpty = false
                })
                .catch((err) => {
                    console.error(err);
                    this.apartmentsSearch = [];
                    this.isEmpty = true
                })
                .then(() => {
                    this.isLoading = false;
                });
        },
        getAllApartments(){
            axios
                .get(`${this.baseUri}/api/apartments`)
                .then((results) => {
                    console.log(results.data.data)
                    this.apartments = results.data.data;
                })
                .catch((error) => {
                    console.warn(error)
                });
        },
        filteredApartments(){
            const filteredApartments = [];
            if (this.checkedServices.length) {
                this.apartmentsSearch.forEach((apartment) => {
                    let counter = 0;
                    apartment.services.forEach((service) => {
                        if (this.checkedServices.includes(service.name)){
                            counter++;
                            if (!filteredApartments.includes(apartment) && counter == this.checkedServices.length) {
                                filteredApartments.push(apartment);
                            }
                        }
                    });
                });
                this.apartmentsSearch = filteredApartments;
            } else {
                this.getApartments(this.searchAddress, this.nRooms, this.nBeds);
                console.log('qui funziona!');
            }

        }
    },
    mounted(){
        this.getAllApartments();
        this.getServices();
        console.log(this.nKm);
    }

};
</script>

<style>
</style>
