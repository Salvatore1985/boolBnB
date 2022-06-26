<template>
    <div class="col-md-6 col-lg-4 col-sm-12 justify-content-between py-4"
    v-if="apartment.sponsorships.length == true">
    <section class="my-rounded-1 p-3">
      <!-- Image Apartment -->
      <div
        class="text-center mb-3"
        v-if="apartment.images[0].link.startsWith('https://')"
      >
        <img
          class="img-apartment my-rounded-1"
          :src="apartment.images[0].link"
          :alt="apartment.title"
        />
      </div>
      <div class="text-center mb-3" v-else>
        <img
          class="img-apartment my-rounded-1"
          :src="`storage/${apartment.images[0].link}`"
          :alt="apartment.title"
        />
      </div>
      <!-- info Apartment -->
      <h6 class="py-2">stelline</h6>
      <h5 class="card-title">
        {{ apartment.title }}
      </h5>
      <p class="card-text">
        {{ limitOverview(apartment) }}
      </p>
      <pre>Creato il: {{ getFormattedDate(apartment.created_at) }}</pre>
      <div class="d-flex justify-content-between">
        <div class="d-flex avatar">
          <img
            class="img-fluid rounded-circle"
            src="https://i.pinimg.com/474x/4b/71/f8/4b71f8137985eaa992d17a315997791e.jpg"
            alt=""
          />
          <span class="px-3">
            {{ apartment.user.name }}
          </span>
        </div>
      </div>
      <h5 class="px-3">{{ apartment.price }} €/Notte</h5>
      <div>
        <router-link :to="{ name: 'apartment', params: { id: apartment.id } }">
          Leggi questo post
        </router-link>
      </div>
    </section>
  </div>
</template>

<script>
export default {
    name: 'ApartmentSpons',
    props:['Apartment'],
}
</script>

<style lang="scss">

</style>
