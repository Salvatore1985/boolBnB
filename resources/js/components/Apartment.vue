<template>
<!-- immagini -->
<div class="card col-md-6 col-lg-4 col-sm-6 mb-3" >
  <router-link :to="{ name: 'apartment', params: { id: apartment.id } }"> 
  <div class="imgHover mb-1"  v-if="apartment.images[0].link.startsWith('https://')">
  <img :src="apartment.images[0].link" class="img-fluid myImgContainer rounded" alt="" >
</div>
<div class="mb-1"  v-else>
  <img :src="`storage/${apartment.images[0].link}`" class="img-fluid myImgContainer rounded" alt="" >    
</div>
    </router-link>  
  <!-- corpo  -->
    <div>
    <p >{{ apartment.title }}</p>
    <p class="d-flex justify-content-between align-items-center">{{ apartment.user.name }} <span class="userImg d-flex justify-content-center"><span>{{initials(apartment)}}</span></span></p>
    <h6 class="fw-bold">{{ apartment.price }}<span class="fw-light">€/Notte</span></h6>
    <ul>
      <li v-for="(service, index) in services" :key="index">{{service.name}}</li>
    </ul>
  </div>
</div>
</template>

<script>
export default {
  name: "HeaderIndex",
  props: ["apartment"],
  methods: {
    // getFormattedDate(data) {
      //*creao una funzione per convertire la data dal database
      // const apartmentdate = new Date(data);
      // let day = apartmentdate.getDate();
      // let month = apartmentdate.getMonth() + 1; //* sggiungo +1 perche il mesi vengono considerati come un array per questo aggiungo 1
      // const year = apartmentdate.getFullYear();
      //? aggiungo una condistione in caso il giorno e minore di 10
      // if (day < 10) {
      //   day = "0" + day;
      // }
      //? aggiungo una condistione in caso il mese e minore di 10
  //     if (month < 10) {
  //       month = "0" + month;
  //     }
  //     return `${day}/${month}/${year}`;
  //   },
  //   limitOverview(apartment) {
  //     if (apartment.description.length > 150) {
  //       return apartment.description.slice(0, 100) + "...";
  //     } else {
  //       return apartment.description;
  //     }
  //   },
  initials(apartment)
    {
      const name = apartment.user.name.split(' ')
      return `${name[0].charAt(0)}`;
    }
  },
  created() {},
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

}
.imgHover:hover {
  box-shadow: 0 0 12px rgba(31, 220, 249, 0.869); 
  filter: brightness(105%);
}
p,span,h6{
  margin-bottom: .2rem !important;
  font-size: 1rem !important;
}
ul{
  list-style-type: none;
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
