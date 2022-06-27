<template>
<!-- immagini -->
<div class="card col-md-6 col-lg-4 col-sm-6 mb-3 me-5">
    <router-link :to="{ name: 'apartment', params: { id: singleApartment.id } }">
    <div class="imgHover mb-1"  v-if="singleApartment.images[0].link.startsWith('https://')">
    <img :src="singleApartment.images[0].link" class="img-fluid myImgContainer rounded" alt="" >
    <ul class="d-flex flex-column justify-content-center my-overflow">
        <li v-for="(service, index) in singleApartment.services" :key="index">
            <span class="bg-icon">
                <i :class="service.link"></i>
            </span>
            <span class="icon-text">
                {{service.name}}
            </span>
        </li>
    </ul>
    </div>
    <div class="imgHover mb-1"  v-else>
        <img :src="`storage/${singleApartment.images[0].link}`" class="img-fluid myImgContainer rounded" alt="" >
    </div>
    </router-link>
    <!-- corpo  -->
    <div>
        <p>{{ singleApartment.title }}</p>
        <p class="d-flex justify-content-between align-items-center">{{ singleApartment.user.name }}
        <span class="userImg d-flex justify-content-center text-white"><span>{{initials(singleApartment)}}
        </span></span></p>
        <h6 class="fw-bold">{{ singleApartment.price }}<span class="fw-light">€/Notte</span></h6>
    </div>
    </div>
</template>
<script>
export default {
    name: "ApartmentSponsored",
    props: ["apartment"],
    data(){
        return{
            baseURI: "http://127.0.0.1:8000/api",
            singleApartment: null
        }
    },
    methods: {
        getSingleApartment(apartmentId) {
        axios
            .get(`${this.baseURI}/apartments/${apartmentId}`)
            .then((results) => {
                this.singleApartment = results.data.results;
                console.warn(this.singleApartment);
            //this.images = results.data.results.images;
            //this.services = results.data.results.services;
            })
            .catch((error) => {
            console.warn(error);
            });
        },
        initials(apartment){
            const name = apartment.user.name.split(' ')
            return `${name[0].charAt(0)}`;
        }
    },
    mounted() {
        this.getSingleApartment(this.apartment.id);
    },
};
</script>

<style lang="scss" scoped>
.myImgContainer{
    height: 200px;
    width: 100%;
}
.card {
    border: none!important;
  // height: 300px;
    background-color: rgb(248, 250, 252) ;
}
.imgHover{

  border-radius: 10px;
  transition: all .5s ease;
  filter: brightness(100%);
  position: relative;
}
.imgHover:hover {
    box-shadow: 0 0 12px rgba(31, 220, 249, 0.869);
    filter: brightness(105%);
}
p,span,h6{

  margin-bottom: .2rem ;
  font-size: 1rem ;
}
ul{
  list-style-type: none;
  position: absolute;
  top: 30%;
  left: 0%;
  padding-left: 0;
  width: 100%;
  height: 6.5rem;
}
li{
    display: flex;
    align-items: center;
    justify-content: end;
    position: relative;
    margin-bottom: 1rem;
    color: azure;
}
li:hover{

    .bg-icon{
        opacity: 0;
    }

    .icon-text{
        //display: block;
        opacity: 1;
    }
}

.userImg{
    background-size: 300% 300%;
    background-image: linear-gradient(
            -45deg,
            rgba(59,173,227,1) 0%,
            rgba(87,111,230,1) 25%,
            rgba(152,68,183,1) 51%,
            rgba(255,53,127,1) 100%,
    );
    animation: AnimateBG 5s ease infinite;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    padding-top: .4rem;
}
@keyframes AnimateBG {
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}

</style>
