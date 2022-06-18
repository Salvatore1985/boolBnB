<template>
  <div class="col-md-6 col-lg-4 col-sm-12 justify-content-between py-4">
    <img
      class="my-rounded-1 img-apartment"
      :src="apartment.images[0].link"
      :alt="'img to' + apartment.title"
    />
    <h6 class="py-2">stelline</h6>
    <h5 class="card-title">{{ apartment.title }}</h5>
    <p class="card-text myp">
      {{ apartment.description }}
    </p>
    <pre>Creato il: {{ getFormattedDate(apartment.created_at) }}</pre>
    <div class="d-flex justify-content-between">
      <div class="d-flex avatar">
        <img
          class="img-fluid rounded-circle"
          src="https://i.pinimg.com/474x/4b/71/f8/4b71f8137985eaa992d17a315997791e.jpg"
          alt=""
        />
        <span class="px-3">Nome host</span>
      </div>
      <h5 class="px-3">{{ apartment.price }} €/Notte</h5>
    </div>
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
  },
  created() {},
};
</script>

<style lang="scss" scoped>
</style>
