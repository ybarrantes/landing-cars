<template>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img :src="imgLogo" height="30" class="d-inline-block align-top" alt="">
                    CarAutos - Concurso Sorteo Vehículo
                </a>
            </div>
        </nav>
    </header>
</template>

<script>
import logo from '../../images/carautos.png'
export default {
    name: 'header',
    components: {
        logo,
    },
    data() {
        return {
            imgLogo: logo,
        }
    },
}
</script>

<style>
    header > .navbar {
        height: 70px;
    }
</style>