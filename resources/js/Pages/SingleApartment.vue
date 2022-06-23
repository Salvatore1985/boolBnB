<template>
  <div class="container border border-danger">
    <h1 class="py-4">
      {{ apartment.title }}
    </h1>
    <h6>
      <span class="font-weight-bold">Sito in via:</span>
      <span>{{ apartment.address }}</span>
    </h6>
    <div class="row">
      <!-- <div class="col-6">
        <img
          class="my-rounded-1 w-100"
          :src="apartment.images[0].link"
          :alt="apartment.tile"
        />
      </div> -->

      <div class="col-6 border border-danger" style="height: 600px">
        <!-- <TomTomMap
        :long = 'long'
        :lat = 'lat'
        :address = 'address'/> -->
        <div class="map" id="map" ref="mapRef" style="height: 100%"></div>
      </div>
      <div class="row">
        <div class="col-12"></div>
      </div>
      <!-- img secondary -->
       <div class="col-6">
        <div class="row h-100">
          <div class="col-12 h-100">
            <div class="row h-100">
              <div class="col-8 d-flex border-dark">
                <div class="row">
                  <div
                    class="w-100 col-12 d-flex"
                    v-for="(image, index) in images"
                    :key="index"
                  >
                    <img
                      v-if="image.link.startsWith('https://')"
                      class="img-fluid mb-3"
                      :src="image.link"
                      :alt="apartment.title"
                    />
                    <img
                      v-else
                      class="img-fluid mb-3"
                      :src="`storage/${image.link}`"
                      :alt="apartment.title"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--  <div class="col-6 d-flex justify-content-between">
        <div>
          <h3>Host: {{ apartment.user.name }}</h3>
          <div class="d-flex">
            <div class="">{{ apartment.n_rooms }} camera da letto -</div>
            <div class="ml-1">{{ apartment.n_beds }} letti -</div>
            <div class="ml-1">{{ apartment.n_bathrooms }} bagni</div>
          </div>
        </div>

        <div class="d-flex avatar">
          <img
            class="img-fluid rounded-circle"
            src="https://i.pinimg.com/474x/4b/71/f8/4b71f8137985eaa992d17a315997791e.jpg"
            alt=""
          />
        </div>
      </div>
 -->
      <!--   <div class="col-6 d-flex">
        <span>{{ apartment.price }}€ /notte</span>
      </div> -->
    </div>
    <!-- service\ -->
    <div>
      <ul>
        <li v-for="(service, index) in services" :key="index">
          <h5>{{ service.name }}</h5>
        </li>
      </ul>
    </div>
    <!--   <div class="row">
      <div class="col-6">
        <p>
          Ogni prenotazione include una protezione gratuita in caso di
          cancellazione da parte dell'host, di inesattezze dell'annuncio e di
          altri problemi come le difficoltà in fase di check-in.
        </p>
      </div>
    </div> -->

    <!--     <div class="row">
      <div class="col-6">
        <h4>Cosa troverai</h4>
        <div class="w-50">{{ apartment.services[0].name }}</div>
      </div>
    </div> -->

    <!--
    <div class="row">
      <div class="col-12">
        <h4>Info</h4>
        <div class="w-50">{{ apartment.description }}</div>
      </div>

      <div class="col-12 text-end my-4">
        <a
          class="btn btn-sm btn-success"
          href="http://127.0.0.1:8000/user/apartments/create "
        >
          Contatta Host
        </a>
      </div>
    </div> -->
    <div>
        <h3 class="mt-5 h2">Contatta il proprietario</h3>
        <form @submit.prevent="sendEmail">
                <div class="form-group">
                <label for="emailName">Il tuo nome</label>
                    <input type="text" class="form-control" id="emailName" v-model="emailName" placehold="Nome" required>
                </div>
                <div class="form-group">
                    <label for="email">Indirizzo mail</label>
                    <input type="email" class="form-control" id="email" v-model="email" placehold="email@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="emailContent">Example textarea</label>
                    <textarea class="form-control" id="emailContent" rows="5" v-model="emailContent" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark">
                    Invia
                </button>
        </form>
        <div v-if="this.isSent === true">
            Il tuo email è stato inviato
        </div>
    </div>
  </div>
</template>

<script>
import tt from "@tomtom-international/web-sdk-maps";

export default {
  name: "SingleApartment",
  data: function () {
    return {
        apartment: [],
        images: [],
        services: [],
        emailName: '',
        email: '',
        emailContent: '',
        callResponse: '',
        baseURI : 'http://127.0.0.1:8000/api',

        isSent : false,
    }
  },
  methods: {
    getSingleApartment(apartmentId) {
      axios
        .get(`${this.baseURI}/apartments/${apartmentId}`)
        .then((results) => {
          this.apartment = results.data.results;
          console.warn(this.apartment);
          this.initializeMap(this.apartment.lat,this.apartment.long);
          this.images = results.data.results.images;
          this.services = results.data.results.services;
          console.log("images: ", this.images);
          console.log("service: ", this.services);
        })
        .catch((error) => {
          console.warn(error);
        });
    },
    initializeMap(lat,lon) {
        const map = tt.map({
          key: "tlI6fGKvUCfBh91AG1PKyRZwhaxoGIWp",
          container: this.$refs.mapRef,
          center: [lon, lat],
          zoom: 9,
    });
        new tt.Marker()
        .setLngLat([lon, lat])
        .addTo(map);
        this.map = Object.freeze(map);
    },
    sendEmail() {
        axios.post('/api/messages', {
          'name':this.emailName,
          'email':this.email,
          'email_content':this.emailContent,
          'apartment_id':this.apartment.id,
        }).then((response) => {
          if(!response.data.success) {
              this.errors = response.data.errors;
              console.warn(this.errors)
          } else {
              this.isSent= true,
              this.emailName = "",
              this.email = '';
              this.emailContent = '';
          }
        // })
        // if(emailName != '' && email != '' && emailContent != '') {
        //     axios.post( `${this.baseURI}/messages/?name=${this.emailName}&email=${this.email}&email_content=${this.emailContent}&apartment_id=${this.apartment.id}`).then(response => {
        //         if(!response.data.success) {
        //         this.errors = response.data.errors;
        //     } else {
        //         this.isSent= true,
        //         this.name = "",
        //         this.surname = "",
        //         this.email = '';
        //         this.message_content = '';
        //     }
        })
    }
    },
    mounted() {
        console.warn(this.$route.params.id);
        this.getSingleApartment(this.$route.params.id);
    },
};
</script>

<style>
</style>
