<template>
    <div class="container-fluid main-layout">
        <header-component/>
        <concurso-component/>
        <footer-component/>
    </div>
</template>

<script>
import headerComponent from './header.vue'
import concursoComponent from './concurso.vue'
import footerComponent from './footer.vue'

export default {
    name: 'main-layout',
    components: {
        headerComponent,
        concursoComponent,
        footerComponent,
    }
}
</script>

<style>
    .main-layout {
        padding: 0;
        min-height: 100vh;
    }
</style>