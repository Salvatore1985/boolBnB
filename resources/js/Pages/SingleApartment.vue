<template>
  <div class="container">
    <div class="row my-4 justify-content-between">
      <div class="col-lg-6 my-rounded-1 my-bg-card-info my-bg-card-map">
        <div class="row">
          <div class="col-12 apartment-text">
            <div class="d-flex">
              <h1 class="py-4 color-gray">
                {{ apartment.title }}
              </h1>
            </div>
            <div class="d-flex align-items-center color-green">
              <div class="avatar">
                <img
                  class="img-fluid rounded-circle"
                  src="https://i.pinimg.com/474x/4b/71/f8/4b71f8137985eaa992d17a315997791e.jpg"
                  alt=""
                />
              </div>
              <h4 class="px-3">Host: {{ apartment.user.name }}</h4>
            </div>
            <h5 class="py-4 color-green">
              <span class="font-weight-bold">Sito in via:</span>
              <span>{{ apartment.address }}</span>
            </h5>
            <h5>
              <a class="text-decoration-none color-gray" href="#info-host"
                >Contatta L'Host</a
              >
            </h5>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-5 my-3 d-flex align-items-center">
        <div>
          <div
            class="d-flex align-items-center justify-content-between color-gray"
          >
            <h2>Info</h2>
            <h3 class="py-4">{{ apartment.price }}€ /notte</h3>
          </div>
          <div class="overflow-auto description-apartment color-green my-desc">
            <p>{{ apartment.description }}</p>
          </div>
          <div class="d-flex align-items-center mt-3 color-gray">
            <h4>Servizi:</h4>
            <h5 class="ps-2" v-for="(service, index) in services" :key="index">
              {{ service.name }},
            </h5>
          </div>
        </div>
      </div>
    </div>
    <!-- Img primary -->
    <div class="row justify-content-between">
      <div class="col-12 col-lg-5">
        <Carousel :images="images" :apartment="apartment" />
      </div>
      <!-- tomtom -->
      <div class="col-12 col-lg-6 my-bg-card-map my-bg-card-info">
        <TomTomMap :lon="lon" :lat="lat" />
      </div>
      <div
        class="
          col-12 col-lg-6
          my-5 my-bg-card-map my-bg-card-info my-rounded-1
          p-3
        "
      >
        <div id="info-host">
          <form @submit.prevent="sendEmail">
            <div class="form-group">
              <label for="emailName" class="color-gray">Il tuo nome</label>
              <input
                type="text"
                class="form-control color-green"
                id="emailName"
                v-model="emailName"
                placehold="Nome"
                required
              />
            </div>
            <div class="form-group">
              <label for="email" class="color-gray">Indirizzo mail</label>
              <input
                type="email"
                class="form-control"
                id="email"
                v-model="email"
                placehold="email@gmail.com"
                required
              />
            </div>
            <div class="form-group my-3">
              <label for="emailContent" class="color-gray"
                >Inserisci il messaggio</label
              >
              <textarea
                class="form-control"
                id="emailContent"
                rows="5"
                v-model="emailContent"
                required
              ></textarea>
            </div>
            <button type="submit" class="btn btn-outline-primary">Invia</button>
          </form>
          <div v-if="this.isSent === true">
            <h1 class="text-center text-primary">
              La tua email è stata inviata
            </h1>
          </div>
        </div>
      </div>
      <div
        class="
          col-12 col-lg-6
          d-flex
          align-items-center
          my-3
          p-5
          d-flex
          align-items-center
        "
      >
        <div>
          <h3 class="py-3 text-center color-gray">Da sapere</h3>
          <div class="row">
            <div class="col-12 col-lg-4">
              <ul>
                <li class="py-4 my-list-card-alert color-gray">
                  Regole della casa
                </li>
                <li class="my-list-card-alert color-green">
                  Check-in: Dopo le ore 15:00
                </li>
                <li class="my-list-card-alert color-green">Check-out: 10:00</li>
                <li class="my-list-card-alert color-green">
                  Non è consentito fumare
                </li>
                <li class="my-list-card-alert color-green">
                  Animali non ammessi
                </li>
              </ul>
            </div>
            <div class="col-12 col-lg-4">
              <ul>
                <li class="py-4 my-list-card-alert color-gray">
                  Salute e sicurezza
                </li>
                <li class="my-list-card-alert color-green">
                  Si applicano le pratiche di sicurezza di Airbnb per
                  l'emergenza COVID-19
                </li>
                <li class="my-list-card-alert color-green">
                  Nessun rilevatore di monossido di carbonio
                </li>
                <li class="my-list-card-alert color-green">
                  Nessun rilevatore di fumo
                </li>
              </ul>
            </div>
            <div class="col-12 col-lg-4">
              <ul>
                <li class="py-4 my-list-card-alert color-gray">
                  Termini di cancellazione
                </li>
                <li class="my-list-card-alert color-green">
                  Cancella prima delle ore 15:00 del giorno 16 lug e riceverai
                  solo un rimborso dei costi di ospitalità.
                </li>
                <li class="my-list-card-alert color-green">
                  Leggi i termini di cancellazione completi dell'host, che si
                  applicano anche in caso di malattia o disagi legati alla
                  pandemia di COVID-19.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import tt from "@tomtom-international/web-sdk-maps";
import TomTomMap from "../components/TomTomMap.vue";
import Carousel from "../components/Carousel.vue";
export default {
  name: "SingleApartment",
  components: {
    TomTomMap,
    Carousel,
  },
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
      lon: "",
      lat: "",
      isSent: false,
    };
  },
  methods: {
    getSingleApartment(apartmentId) {
      axios
        .get(`${this.baseURI}/apartments/${apartmentId}`)
        .then((results) => {
          this.apartment = results.data.results;
          console.warn(this.apartment);
          this.images = results.data.results.images;
          this.services = results.data.results.services;
          this.lon = this.apartment.long;
          this.lat = this.apartment.lat;
        })
        .catch((error) => {
          console.warn(error);
        });
    },
    sendEmail() {
      axios
        .post("/api/messages", {
          name: this.emailName,
          email: this.email,
          email_content: this.emailContent,
          apartment_id: this.apartment.id,
        })
        .then((response) => {
          if (!response.data.success) {
            this.errors = response.data.errors;
            console.warn(this.errors);
          } else {
            (this.isSent = true), (this.emailName = ""), (this.email = "");
            this.emailContent = "";
          }
        });
    },
  },
  mounted() {
    this.email = this.$userEmail;
    this.emailName = this.$userName;
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
