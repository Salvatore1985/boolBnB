<template>
  <div class="col-md-6 col-lg-4 col-sm-12 justify-content-between py-4">
    <section class="my-rounded-1 p-3">
      <!-- Image Apartment -->
      <div class="card-group">
        <div class="card">
          <div
              class="text-center mb-3"
              v-if="apartment.images[0].link.startsWith('https://')"
          >
              <img
              class="card-img-top img-apartment"
              :src="apartment.images[0].link"
              :alt="apartment.title"
              />
          </div>
          <div class="text-center mb-3" v-else>
              <img
              class="card-img-top img-apartment"
              :src="`storage/${apartment.images[0].link}`"
              :alt="apartment.title"
              />
          </div>
          <!-- info Apartment -->
          <div class="card-body d-flex flex-column justify-content-between shadow rounded p-4" style="height:400px">
              <div class="d-block">
                <h6 class="py-2">
                    stelline
                </h6>
                <h5 class="card-title">
                    {{ apartment.title }}
                </h5>
                <p class="card-text">
                    {{ limitOverview(apartment) }}
                </p>
              </div>

              <div class="d-block">
                <pre>Creato il: {{ getFormattedDate(apartment.created_at) }}</pre>
                <div class="d-flex justify-content-between ">
                    <div class="d-flex avatar align-self-end">

                      <!-- src="https://i.pinimg.com/474x/4b/71/f8/4b71f8137985eaa992d17a315997791e.jpg" -->
                      <img
                          class="img-fluid rounded-circle"
                          src="https://previews.123rf.com/images/bearsky23/bearsky231608/bearsky23160800005/61158485-standard-user-icon-set-di-uomini-donne-e-pi%C3%B9-persone.jpg"
                          alt=""
                      />
                      <span class="px-3">
                          {{ apartment.user.name }}
                      </span>
                      <h5 class="px-3">{{ apartment.price }}€/Notte</h5>
                    </div>
                    
                    
                </div>
              
                
                <div>
                <router-link :to="{ name: 'apartment', params: { id: apartment.id } }">
                    Leggi questo post
                </router-link>
                </div>               
              </div>

          </div>
        </div>
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
  },

  created() {},
};
</script>

<style lang="scss" scoped>
</style>
