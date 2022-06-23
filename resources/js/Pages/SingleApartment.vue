<template>
  <div class="container">
    <div class="row mb-3 justify-content-around">
      <div
        class="
          col-5
          d-flex
          align-items-center
          shadow
          my-rounded-1 my-bg-card-info
        "
      >
        <section>
          <div :class="alert" class="alert" id="alert-message">
            {{ callResponse }}
          </div>
          <h1 class="py-4">
            {{ apartment.title }}
          </h1>
          <span>{{ apartment.price }}€ /notte</span>
          <div class="d-flex avatar">
            <img
              class="img-fluid rounded-circle"
              src="https://i.pinimg.com/474x/4b/71/f8/4b71f8137985eaa992d17a315997791e.jpg"
              alt=""
            />
            <h5>Host: {{ apartment.user.name }}</h5>
          </div>

          <h6>
            <span class="font-weight-bold">Sito in via:</span>
            <span>{{ apartment.address }}</span>
          </h6>
        </section>
      </div>
      <div
        class="
          col-5
          d-flex
          align-items-center
          shadow
          my-rounded-1 my-bg-card-info
        "
      >
        <!-- service\ -->
        <div>
          <h5>Servizi</h5>
          <ul>
            <li v-for="(service, index) in services" :key="index">
              <h5>{{ service.name }}</h5>
            </li>
          </ul>
        </div>
        <div class="col-12">
          <div class="">{{ apartment.n_rooms }} camera da letto -</div>
          <div class="ml-1">{{ apartment.n_beds }} letti -</div>
          <div class="ml-1">{{ apartment.n_bathrooms }} bagni</div>
        </div>
      </div>
    </div>
    <!-- Img primary -->
    <div class="row">
      <div class="col-6">
        <div>
          <img
            class="my-rounded-1 w-100"
            :src="apartment.images[0].link"
            :alt="apartment.tile"
          />
        </div>
      </div>
      <!-- tomtom -->
      <div class="col-6 border border-danger">Inseriamo il tomtom</div>
      <!-- Img secondary -->
      <div class="row mt-2 shadow">
        <div
          class="col-3 g-3 d-flex"
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

    <div class="row mt-3">
      <div class="col-5 d-flex align-items-center">
        <div>
          <h4>Info</h4>
          <div>{{ apartment.description }}</div>
        </div>
      </div>
      <div class="col-6 shadow my-rounded-1">
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
          <div class="form-group">
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
      <!--  <div class="col-12 text-end my-4">
        <a
          class="btn btn-sm btn-success"
          href="http://127.0.0.1:8000/user/apartments/create "
        >
          Contatta Host
        </a>
      </div> -->
    </div>
  </div>
</template>

<script>
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
</style>
