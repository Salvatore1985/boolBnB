<template>
    <header>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <router-link class="nav-link"
                :to="{ name: 'apartments'}">
                    Apartments
                </router-link>
            </li>
        </ul>
    </header>
</template>

<script>
export default {
    name:'Header'
}
</script>

<style lang="scss" scoped>

</style>
