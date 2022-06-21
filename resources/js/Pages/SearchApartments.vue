<template>
    <div>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
                <input
                class="form-control mr-sm-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
                v-model="searchAddress"
                @keyup="
                    getApartments(searchAddress, nRooms, nBeds)
                "
                />
                <input
                class="form-control mr-sm-2"
                type="search"
                placeholder="nRooms"
                aria-label="nRooms"
                v-model="nRooms"
                @keyup="
                    getApartments(searchAddress, nRooms, nBeds)
                "
                />
                <input
                class="form-control mr-sm-2"
                type="search"
                placeholder="nBeds"
                aria-label="nBeds"
                v-model="nBeds"
                @keyup="
                    getApartments(searchAddress, nRooms, nBeds)
                "
                />

                <!--<button class="btn btn-outline-success my-2 my-sm-0" type="submit" @click="getApartments(searchApartment, nBath)">Search</button>-->
            </form>
        </nav>
        <section class="container">
                <div class="row">
                    <div class="col-12" v-if="isSearch">
                        Cerca una destinazione
                    </div>
                <ApartmentSearch
                    v-for="apartment in apartmentsSearch"
                    :key="apartment.index"
                    :apartment="apartment"
                    v-else
                />
                </div>
        </section>
    </div>
</template>

<script>
import ApartmentSearch from '../components/ApartmentSearch.vue';
export default {
    name: "SearchApartments",
    components: {
        ApartmentSearch
    },
    data() {
        return {
        baseUri: "http://127.0.0.1:8000",
        apartmentsSearch: [],
        isSearch: true,
        isLoading: false,
        pagination: {},
        isActive: 0,
        searchAddress: "",
        nRooms: "",
        nBeds: "",
        };
    },
    methods: {
        getApartments(address, nRooms, nBeds) {
            this.isLoading = true;
            this.isSearch = false;
            const params = new URLSearchParams();
            params.append("address", address);
            params.append("n_rooms", nRooms);
            params.append("n_beds", nBeds);
            const request = {
                params: params,
            };
            axios
                .get(`${this.baseUri}/api/apartments/search?`, request)
                .then((res) => {
                    console.log(res.data);
                    this.apartmentsSearch = res.data[0];
                    console.log('funziona');
                })
                .catch((err) => {
                console.error(err);
                })
                .then(() => {
                this.isLoading = false;
                });
        },
    },
}
</script>

<style>

</style>
