<template>
    <div style="height: 100%">
        <div class="map" id="map" ref="mapRef" style="height: 100%"></div>
    </div>
</template>

<script>
export default {
    name: "TomTomMap",
    props: ["lon", "lat"],
    methods: {
        initializeMap(lon, lat) {
        const map = tt.map({
            key: "tlI6fGKvUCfBh91AG1PKyRZwhaxoGIWp",
            container: this.$refs.mapRef,
            center: [lon, lat],
            zoom: 9,
        });
        new tt.Marker().setLngLat([lon, lat]).addTo(map);
        this.map = Object.freeze(map);
        },
    },
    mounted() {
        this.initializeMap(this.lon, this.lat);
    },
};
</script>

<style>
</style>
