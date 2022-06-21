<template>
    <section id="apartiment-list">
        <Loader v-if="isLoading" />
        <div v-else>
            <section class="container">
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

export default {
    name: "Apartments",
    components: {
        Loader,
        Apartment,
    },
    data() {
        return {
            baseUri: "http://127.0.0.1:8000",
            apartments: [],
            isLoading: false,
            pagination: {},
            isActive: 0,
        };
    },
    methods: {
        getAllApartments(){
            axios
                .get(`${this.baseUri}/api/apartments`)
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
        },
    },
    mounted(){
        this.getAllApartments();
    }
};
</script>

<style>
</style>
