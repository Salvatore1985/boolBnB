<template>
    <div class="container w-75">
        
        
        <div class="row">
            <div class="col-12 p-3">
            Single Apartment
            </div>
            <div class="col-12 p-3">
                <h1>
                    {{apartment.title}}
                </h1>
                <h6>
                    {{apartment.address}}
                </h6>
                
            </div>
            <div class="col-6 p-1">
                <img class="rounded-left w-100 p-1" :src="apartment.images[0].link" alt="">
            </div>
            <div class="col-6 d-flex p-1 flex-wrap">

                <!-- v-for img ok -->

                <!-- <img class="rounded-1 w-50 p-1" 
                :src="image.link" alt="image" 
                v-for="(image, index) in apartment.images"
                :key="index"
                > -->

                <!-- prova con solo un img -->

                <!-- <img class="rounded w-50 p-1" :src="apartment.images[0].link" alt="">
                <img class="rounded-right w-50 p-1" :src="apartment.images[0].link" alt="">
                <img class="rounded w-50 p-1" :src="apartment.images[0].link" alt="">
                <img class="rounded-right w-50 p-1" :src="apartment.images[0].link" alt=""> -->
            </div>



            <div class="col-6 d-flex  justify-content-between">
                <div>
                    <h3> Host: {{apartment.user.name}} </h3>
                    <div class="d-flex">
                        <div class=""> {{apartment.n_rooms}} camera da letto - </div>
                        <div class="ml-1"> {{apartment.n_beds}} letti - </div>
                        <div class="ml-1"> {{apartment.n_bathrooms}} bagni</div>
                    </div>
                </div>
                
                <div class="d-flex avatar">
                    <img class="img-fluid rounded-circle" src="https://i.pinimg.com/474x/4b/71/f8/4b71f8137985eaa992d17a315997791e.jpg" alt="">
                </div>
                
            </div>

            <div class="col-6 d-flex">
                <span>{{apartment.price}}€ /notte</span>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-6">
                <p>Ogni prenotazione include una protezione gratuita in caso di cancellazione da parte dell'host, di inesattezze dell'annuncio e di altri problemi come le difficoltà in fase di check-in.</p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-6">
                <h4>Cosa troverai</h4>
                <div class="w-50"> {{apartment.services[0].name}} </div>

                <!-- v-for service non va -->

                <!-- <div class="w-50" 
                alt="service" 
                v-for="(service, index) in apartment.services.name"
                :key="index"
                >
                </div> -->
                
            </div>
            
        </div>  

        <hr>

        <div class="row">
            <div class="col-12">
                <h4>Info</h4>
                <div class="w-50"> {{apartment.description}} </div>
            </div>

            <div class="col-12 text-end my-4">
                <a class="btn btn-sm btn-success" href="http://127.0.0.1:8000/user/apartments/create ">
                Contatta Host
                </a>
            </div>
            
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
        },
    },
    created(){
        console.warn(this.$route.params.id);
        this.getSingleApartment(this.$route.params.id);
    }
}
</script>

<style>

</style>
