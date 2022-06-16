<template>
  <div class="py-4">
    <input
      type="text"
      placeholder="Inserisci qui l'appartamento"
      v-model.trim="inputSearch"
      @keyup.enter="emitSearch()"
    />
    <input
      type="number"
      placeholder="Inserisci il numero dei letti"
      v-model.trim="beds"
      @keyup.enter="emitSearch()"
    />
    <input
      type="number"
      placeholder="Inserisci il numero delle stanze"
      v-model.trim="rooms"
      @keyup.enter="emitSearch()"
    />
    <section class="d-flex mt-2">
      <div
        class="form-check form-switch px-4"
        v-for="service in services"
        :key="service.id"
      >
        <input
          class="form-check-input"
          type="checkbox"
          v-model="checkedServices"
          id="my-flexSwitchCheckDefault"
          :name="service.name"
          :value="service.name"
        />
        <label class="form-check-label" for="flexSwitchCheckDefault">{{
          service.name
        }}</label>
      </div>
    </section>
    <button @click="emitSearch()" class="bg-light" type="submit">Cerca</button>
  </div>
</template>

<script>
export default {
  name: "SearchHome",

  data() {
    return {
      inputSearch: "",
      services: [],
      baseUri: "http://127.0.0.1:8000/api/service",
      checkedService: [],
      beds: 0,
      rooms: 0,
      range: "20",
    };
  },
  created() {},
  methods: {
    emitSearch() {
      this.$emit("search", [
        this.inputSearch,
        this.checkedServices,
        this.range,
      ]);
    },
    getServices() {
      axios.get(`${this.baseUri}`).then((res) => {
        this.services = res.data;
        console.log("sono i servi", this.services);
      });
    },
  },
  created() {
    this.getServices();
  },
  computed: {},
};
</script>

<style lang="scss">
/* @import "../components/style/main-style.scss"; */
</style>
