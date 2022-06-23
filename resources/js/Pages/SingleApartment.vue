<template>
  <div class="container">
    <div class="row my-4 justify-content-between">
      <div class="col-lg-6 shadow my-rounded-1 my-bg-card-info">
        <div class="row">
          <div class="col-12">
            <div class="d-flex">
              <h1 class="py-4">
                {{ apartment.title }}
              </h1>
            </div>
            <div class="d-flex align-items-center">
              <div class="avatar">
                <img
                  class="img-fluid rounded-circle"
                  src="https://i.pinimg.com/474x/4b/71/f8/4b71f8137985eaa992d17a315997791e.jpg"
                  alt=""
                />
              </div>
              <h4 class="px-3">Host: {{ apartment.user.name }}</h4>
            </div>
            <h5 class="py-4">
              <span class="font-weight-bold">Sito in via:</span>
              <span>{{ apartment.address }}</span>
            </h5>
            <div class="d-flex align-items-center">
              <h4>Servizi:</h4>
              <h5
                class="ps-2"
                v-for="(service, index) in services"
                :key="index"
              >
                {{ service.name }},
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-5 my-3 d-flex align-items-center">

        <div>
          <div class="d-flex align-items-center justify-content-between">
            <h2>Info</h2>
            <h3 class="py-4">{{ apartment.price }}€ /notte</h3>
          </div>
          <div>
            <p>{{ apartment.description }}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Img primary -->
    <div class="row">
      <div class="col-12 col-lg-6">
        <div>
          <img
            class="my-rounded-1 w-100"
            :src="apartment.images[0].link"
            :alt="apartment.tile"
          />
        </div>
      </div>
      <!-- tomtom -->
      <div class="col-6 border border-danger" style="height: 600px">
        <div class="map" id="map" ref="mapRef" style="height: 100%"></div>
      </div>
      <!-- Img secondary -->
      <div class="row mt-2">
        <div
          class="col-3 g-3 pb-3 d-flex"
          v-for="(image, index) in images"
          :key="index"
        >
          <div class="wraper-cover-apartment-small">
            <img
              v-if="image.link.startsWith('https://')"
              class="cover-apartment-small my-rounded-1"
              :src="image.link"
              :alt="apartment.title"
            />
            <img
              v-else
              class="cover-apartment-small my-rounded-1"
              :src="`storage/${image.link}`"
              :alt="apartment.title"
            />
          </div>
        </div>
      </div>
    </div>
    <!-- message -->
    <div class="row my-3 justify-content-between">
      <div class="col-12 col-lg-6 shadow my-rounded-1 p-3">
        <div>
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
          this.initializeMap(this.apartment.lat, this.apartment.long);
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
.my-tom {
  height: 420px;
}
</style>
