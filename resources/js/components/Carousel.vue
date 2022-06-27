<template>
  <div
    id="carouselExampleIndicators"
    class="carousel slide carousel-scaled"
    data-bs-ride="carousel "
  >
    <div class="carousel-indicators">
      <button
        v-for="(image, index) in images"
        :key="index"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        :data-bs-slide-to="index"
        class="active"
        aria-current="true"
        :aria-label="index"
      ></button>
    </div>
    <div class="carousel-inner my-rounded-1 hover-show">
      <div
        class="carousel-item"
        :class="index == 0 ? 'active' : ''"
        v-for="(image, index) in images"
        :key="index"
      >
        <img
          v-if="image.link.startsWith('https://')"
          :src="image.link"
          class="d-block w-100"
          :alt="apartment.tile"
        />
        <img
          v-else
          :src="`http://127.0.0.1:8000/storage/${image.link}`"
          class="d-block w-100"
          :alt="apartment.tile"
        />
      </div>
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</template>

<script>
export default {
  name: "Carousel",
  props: ["images", "apartment"],
};
</script>

<style >
</style>
