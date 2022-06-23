<template>
    <div>
        <div id="map"></div>
    </div>
</template>

<script>
import tt from '@tomtom-international/web-sdk-maps';

export default {
    name: 'TomTomMap',
    props: ['long', 'lat', 'address'],
    data: function(){
        return{
            'API_KEY': 'tlI6fGKvUCfBh91AG1PKyRZwhaxoGIWp',
            'APPLICATION_NAME': 'My Application',
            'APPLICATION_VERSION': '1.0',
            'positions': {
                lng: this.long,
                lat : this.lat,
                },
            // 'searchPosition': this.mainPosition,
            'apartAddress' : this.address,
        }
    },
    methods: {
        getMap(){
            const map = tt.map({
                key: this.API_KEY,
            container: 'map',
            center: this.positions,
            zoom: 20,
            });
            console.log(this.positions),
            this.addMarker(map, this.apartAddress)
        },
        addMarker(map, address) {
            const marker = new tt.Marker().setLngLat(this.positions[0]).addTo(map);
            const popup = new tt.Popup({ anchor: 'top' }).setHTML(address);
            marker.setPopup(popup).togglePopup()
        },
    },
    mounted(){
        // if(this.searchPosition === null){
            this.getMap();
        //     console.warn(this.searchPosition);
        // }
    }
}
</script>

<style lang="scss" scoped>
@import url('https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css');
#map-div{
    width: 40vw;
    height: 50vh;
}
</style>
