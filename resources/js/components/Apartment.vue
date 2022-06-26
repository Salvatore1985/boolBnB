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
    <p >{{ apartment.user.name }}</p>
    <ul>
      <li>
          
      </li>
    </ul>
    <h6 class="fw-bold">{{ apartment.price }}<span class="fw-light">€/Notte</span></h6>
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
  //   initials(apartment){
  //     const name = apartment.user.name.split(' ')
  //     return `${name[0].charAt(0)}`;
  //   }
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
  font-size: .5rem !important;
}
ul{
  list-style-type: none;
}

</style>
