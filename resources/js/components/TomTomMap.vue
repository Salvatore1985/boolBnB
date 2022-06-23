<template>
    <div>
        <div id="map-div"></div>
    </div>
</template>

<script>
import tt from '@tomtom-international/web-sdk-maps';

export default {
    name: 'TomTomMap',
    props: ['coordinates', 'address'],
    data: function(){
        return{
            'API_KEY': 'tlI6fGKvUCfBh91AG1PKyRZwhaxoGIWp',
            'APPLICATION_NAME': 'My Application',
            'APPLICATION_VERSION': '1.0',
            'positions': ["45.4442769", "9.0941081"],
            // 'searchPosition': this.mainPosition,
            'apartmentAddress' : this.address,
        }
    },
    methods: {
        getMap(mainCenter){
            const map = tt.map({
            key: this.API_KEY,
            container: 'map-div',
            center: mainCenter,
            zoom: 14
            });
            this.addMarker(map, this.apartmentAddress)
        },
        addMarker(map, address) {
            const marker = new tt.Marker().setLngLat(this.positions).addTo(map);
            const popup = new tt.Popup({ anchor: 'top' }).setText(address);
            marker.setPopup(popup).togglePopup()
        },
    },
    mounted(){
        // if(this.searchPosition === null){
            this.getMap(this.positions);
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
