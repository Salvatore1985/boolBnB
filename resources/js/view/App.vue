<template>
    <div>
        <h1>Questo è la FRONT OFFICE</h1>
        <Header/>
        <Main/>
        <Footer/>
    </div>
</template>

<script>
import Header from '../components/Header';
import Main from '../components/Main';
import Footer from '../components/Footer'
export default {
    name:'App',
    components : {
        Header,
        Main,
        Footer
    }
}
</script>


<style lang="scss">

</style>
