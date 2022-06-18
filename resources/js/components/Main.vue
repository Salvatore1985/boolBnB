<template>
  <div>
    <Apartments />
    <router-view> </router-view>
  </div>
</template>

<script>
import Apartments from "../Pages/Apartments.vue";
export default {
  name: "MainIndex",
  components: {
    Apartments,
  },
};
</script>

<style lang="scss" scoped>
</style>
