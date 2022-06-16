<template>
  <div class="container">
    <div class="card mb-3 rounded" style="max-width: 540px">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img
            class="w-100 h-100 rounded-left"
            :src="apartment.images[0].link"
            :alt="'img to' + apartment.title"
          />
        </div>
        <!--   <pre class="text-darger">{{ apartment.images[0].link }}</pre> -->
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{ apartment.title }}</h5>
            <p class="card-text">
              {{ apartment.description }}
            </p>
            <pre>numeri letti {{ apartment.n_beds }}</pre>
            <p class="card-text">
              <small class="text-muted"
                >Creato il: {{ getFormattedDate(apartment.created_at) }}</small
              >
            </p>
          </div>
        </div>
      </div>
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
