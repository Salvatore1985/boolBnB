<template>
    <div class="container w-75">
        Single Apartment
        <div class="col-6 p-4">
            <h1>
                {{apartment.title}}
            </h1>
            <h6>
                {{apartment.address}}
            </h6>
            <p>
                {{apartment.n_beds}}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "SingleApartment",
    data: function (){
        return{
            apartment : [],
        }
    },
    methods:{
        getSingleApartment(apartmentId){
            axios
            .get(`http://127.0.0.1:8000/api/apartments/${apartmentId}`)
            .then((results) => {
                // console.log(results.data.results)
                this.apartment = results.data.results;
                console.log(this.apartment)
                // console.log(this.posts)
                // const { current_page, last_page } = results.data;
                // this.activePage = {currentPage : current_page, lastPage : last_page};
            })
            .catch((error) => {
                console.warn(error)
            });
        }
    },
    created(){
        console.warn(this.$route.params.id);
        this.getSingleApartment(this.$route.params.id);
    }
}
</script>

<style>

</style>
