<template>
    <header>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"
            v-for="(navLink, index) in navLinks" :key="index">
                <router-link class="nav-link"
                :to="{ name: 'Apartments'}">
                    Apartments
                </router-link>
            </li>
        </ul>
    </header>
</template>

<script>
export default {
    name:'HeaderIndex'
}
</script>

<style lang="scss" scoped>

</style>
