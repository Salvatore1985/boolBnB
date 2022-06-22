<template>
    <div>
        <div id="map-div"></div>
    </div>
</template>

<script>
import tt from '@tomtom-international/web-sdk-maps';

export default {
    name: 'TomTomMap',
    props: ['mainPosition'],
    data: function(){
        return{
            'API_KEY': 'tlI6fGKvUCfBh91AG1PKyRZwhaxoGIWp',
            'APPLICATION_NAME': 'My Application',
            'APPLICATION_VERSION': '1.0',
            'positions': [
                { lat: 6.4434, lng: 3.3553 },
                { lat: 6.4442, lng: 3.3561 },
                { lat: 6.4451, lng: 3.3573 },
                { lat: 6.4459, lng: 3.3520 }
            ],
            'searchPosition': this.mainPosition
        }
    },
    methods: {
        getMap(){
            let mainCenter;
            if(this.searchPosition === null){
                mainCenter = { lat: 6.4434, lng: 3.3553 }
            } else {
                mainCenter = this.searchPosition
            }
            const map = tt.map({
            key: this.API_KEY,
            container: 'map-div',
            center: mainCenter,
            zoom: 14
            });
            //this.addMarker(map)
        },
        addMarker(map) {
            this.positions.forEach((position) => {
            const marker = new tt.Marker().setLngLat(position).addTo(map);
            const popup = new tt.Popup({ anchor: 'top' }).setText('Apartment')
            marker.setPopup(popup).togglePopup()
        });
        },
    },
    mounted(){
        if(this.searchPosition === null){
            this.getMap();
            console.warn(this.searchPosition);
        }
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
