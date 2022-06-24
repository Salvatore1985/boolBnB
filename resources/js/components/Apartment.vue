<template>
  <div class="col-md-6 col-lg-4 col-sm-12 justify-content-between py-4">
    <section class="my-rounded-1 p-3">
      <!-- Image Apartment -->
      <div
        class="text-center mb-3 "
        v-if="apartment.images[0].link.startsWith('https://')"
      >
     
        <img
          class="img-apartment my-rounded-1"
          :src="apartment.images[0].link"
          :alt="apartment.title"
        />
      </div>
      <div class="text-center mb-3 " v-else>
       
        <img
          class="img-apartment my-rounded-1"
          :src="`storage/${apartment.images[0].link}`"
          :alt="apartment.title"
        />
      </div>
      <!-- info Apartment -->
      <h6 class="py-2">stelline</h6>
      <h5 class="card-title">
        {{ apartment.title }}
      </h5>
      <p class="card-text">
        {{ limitOverview(apartment) }}
      </p>
      <pre>Creato il: {{ getFormattedDate(apartment.created_at) }}</pre>      
      <div class="d-flex ">
        <div class=" avatar position-relative">
          <div class="position-absolute initials">
            {{initials(apartment)}}
        </div>
      </div>   
      <div class="px-3 align-self-center">
            {{ apartment.user.name }}
          </div>
      </div>      
          <!-- <img
            class="img-fluid rounded-circle"
            src="https://i.pinimg.com/474x/4b/71/f8/4b71f8137985eaa992d17a315997791e.jpg"
            alt=""
          /> -->
      <div class="px-3">
            {{ apartment.user.name }}
          </div>      
      <h5 class="px-3">{{ apartment.price }} €/Notte</h5>
      <div>
        <router-link :to="{ name: 'apartment', params: { id: apartment.id } }">
          Leggi questo post
        </router-link>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "HeaderIndex",
  props: ["apartment"],
  methods: {
    getFormattedDate(data) {
      //*creao una funzione per convertire la data dal database
      const apartmentdate = new Date(data);
      let day = apartmentdate.getDate();
      let month = apartmentdate.getMonth() + 1; //* sggiungo +1 perche il mesi vengono considerati come un array per questo aggiungo 1
      const year = apartmentdate.getFullYear();
      //? aggiungo una condistione in caso il giorno e minore di 10
      if (day < 10) {
        day = "0" + day;
      }
      //? aggiungo una condistione in caso il mese e minore di 10
      if (month < 10) {
        month = "0" + month;
      }
      return `${day}/${month}/${year}`;
    },
    limitOverview(apartment) {
      if (apartment.description.length > 150) {
        return apartment.description.slice(0, 100) + "...";
      } else {
        return apartment.description;
      }
    },
    initials(apartment){
      const name = apartment.user.name.split(' ')
      return `${name[0].charAt(0)}`;
    }
  },

  created() {},
};
</script>

<style lang="scss" scoped>
.avatar{
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
    @keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
}
.initials{
  top: 2%;
  left: 30%;
  font-size: 2rem;
}

</style>
