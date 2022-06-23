<template>
  <div class="container border border-danger">
    <div class="alert" id="alert-message">
        {{callResponse}}
    </div>
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

      <div class="col-6 border border-danger">
        <TomTomMap
        :long = 'long'
        :lat = 'lat'
        :address = 'address'/>
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
        <div class="form-group">
            <label for="mail">Il tuo nome</label>
            <input type="email" class="form-control" id="mail" v-model="emailName">
            </div>
            <div class="form-group">
            <label for="mail">Indirizzo mail</label>
            <input type="email" class="form-control" id="mail" v-model="email">
            </div>
            <div class="form-group">
            <label for="emailContent">Example textarea</label>
            <textarea class="form-control" id="emailContent" rows="5" v-model="emailContent"></textarea>
            </div>
            <button class="btn btn-dark" @click="sendMessage(emailName,email,emailContent)">Invia</button>
        </div>
  </div>
</template>

<script>
import TomTomMap from '../components/TomTomMap.vue';
export default {
  name: "SingleApartment",
  components : {
    TomTomMap,
  },
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
        long: '',
        lat : '',
        address: '',
    }
  },
  methods: {
    getSingleApartment(apartmentId) {
      axios
        .get(`${this.baseURI}/apartments/${apartmentId}`)
        .then((results) => {
          // console.log(results.data.results)
          this.apartment = results.data.results;
          console.warn(this.apartment);
          this.long = results.data.results.long;
          this.lat = results.data.results.lat;
          this.address = results.data.results.address;
          console.log(this.lat, this.long);
          this.images = results.data.results.images;
          this.services = results.data.results.services;
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
    sendMessage(emailName, email, emailContent) {
        if(emailName != '' && email != '' && emailContent != '') {
            axios.post( `${this.baseURI}/messages/?name=${this.emailName}&email=${this.email}&email_content=${this.emailContent}&apartment_id=${this.apartment.id}`).then(res => {
                console.log(res);
                    this.callResponse = "Messaggio inviato con successo";
            }).catch(() => {
                        this.callResponse = "Messaggio non inviato";
            })
        }
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
