<template>
  <div class="container">
    <div class="row my-4 justify-content-between">
      <div class="col-lg-6 shadow my-rounded-1 my-bg-card-info">
        <!--    <div :class="alert" class="alert" id="alert-message">
          {{ callResponse }}
        </div> -->
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
            <h5 class="py-4">Servizi</h5>
          </div>
          <!--  <div class="col-6 d-flex">
            <h1 class="py-4">{{ apartment.price }}€ /notte</h1>
          </div> -->
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
      <div class="my-tom col-12 col-lg-6 shadow my-rounded-1">
        <div class="map h-100" id="map" ref="mapRef">
          <!--  Inseriamo il tomtom -->
        </div>
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
          <h3 class="mt-5 h2">Contatta il proprietario</h3>
          <div class="form-group">
            <label for="mail">Il tuo nome</label>
            <input
              type="email"
              class="form-control"
              id="mail"
              v-model="emailName"
            />
          </div>
          <div class="form-group">
            <label for="mail">Indirizzo mail</label>
            <input
              type="email"
              class="form-control"
              id="mail"
              v-model="email"
            />
          </div>
          <div class="form-group mb-3">
            <label for="emailContent">Example textarea</label>
            <textarea
              class="form-control"
              id="emailContent"
              rows="5"
              v-model="emailContent"
            ></textarea>
          </div>
          <button
            class="btn btn-dark"
            @click="sendMessage(emailName, email, emailContent)"
          >
            Invia
          </button>
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
      emailName: "",
      email: "",
      emailContent: "",
      callResponse: "",
      baseURI: "http://127.0.0.1:8000/api",
    };
  },
  methods: {
    getSingleApartment(apartmentId) {
      axios
        .get(`${this.baseURI}/apartments/${apartmentId}`)
        .then((results) => {
          // console.log(results.data.results)
          this.apartment = results.data.results;
          this.images = results.data.results.images;
          this.services = results.data.results.services;
          this.initializeMap(this.apartment.lat, this.apartment.long);
          console.log("images: ", this.images);
          console.log("service: ", this.service);
          // console.log(this.posts)
          // const { current_page, last_page } = results.data;
          // this.activePage = {currentPage : current_page, lastPage : last_page};
        })
        .catch((error) => {
          console.warn(error);
        });
    },
    initializeMap(lat, lon) {
      const map = tt.map({
        key: "tlI6fGKvUCfBh91AG1PKyRZwhaxoGIWp",
        container: this.$refs.mapRef,
        center: [lon, lat],
        zoom: 9,
      });
      new tt.Marker().setLngLat([lon, lat]).addTo(map);
      this.map = Object.freeze(map);
    },
    sendMessage(emailName, email, emailContent) {
      if (emailName != "" && email != "" && emailContent != "") {
        axios
          .post(
            `${this.baseURI}/messages/?name=${this.emailName}&email=${this.email}&email_content=${this.emailContent}&apartment_id=${this.apartment.id}`
          )
          .then((res) => {
            console.log(res);
            this.callResponse = "Messaggio inviato con successo";
          })
          .catch(() => {
            this.callResponse = "Messaggio non inviato";
          });
      }
    },
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
