<template>
    <div>
        <div class="bg-yellow">
            <div class="container">
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <form ref="formConcurso" class="form-concurso shadow p-3 mb-5 bg-white rounded-lg" @submit.prevent="enviarDatos">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center h4 my-3">Diligencia el formulario para participar</div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="cedula">Cédula</label>
                                        <input type="text" class="form-control" id="cedula" v-model="form.cedula">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" class="form-control text-uppercase" id="nombres" v-model="form.nombre">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" class="form-control text-uppercase" id="apellidos" v-model="form.apellido">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="celular">Celular</label>
                                        <input type="text" class="form-control text-uppercase" id="celular" v-model="form.celular">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Correo electrónico</label>
                                        <input type="email" class="form-control text-lowercase" id="email" v-model="form.email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="departamento">Departamento</label>
                                        <select class="form-control" id="departamento" v-model="dpto" @change.prevent="cargaCiudad">
                                            <template v-for="(dpto, dptoKey) in this.dptos">
                                                <option :key="dptoKey" :value="dpto.id">{{ dpto.nombre }}</option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <select class="form-control" id="ciudad" v-model="form.ciudad">
                                            <template v-for="(city, cityKey) in this.ciudades">
                                                <option :key="cityKey" :value="city.id">{{ city.nombre }}</option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="habeas_data" v-model="form.habeas_data">
                                        <label class="form-check-label" for="habeas_data">
                                            Autorizo el tratamiento de mis datos personales de acuerdo con la finalidad establecida en la <a href="/politica" target="_blank">política de protección de datos personales</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-warning py-2 px-5 my-3">Enviar datos</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="h1 text-white mt-3 text-shadow">EN ESTE 2020<br>ESTRENA CARRO NUEVO 0 KM</div>
                        <div class="text-center mt-5 mb-5">
                            <img :src="imgCar">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center my-5">
                        <div class="display-3">El ganador del concurso es:</div>
                        <div class="h2">{{ganador}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import imgCar from '../../images/car.png'

export default {
    name: 'concurso',
    components: {},
    data() {
        return {
            imgCar: imgCar,
            form: {
                cedula: '',
                nombre: '',
                apellido: '',
                celular: '',
                email: '',
                ciudad: '',
                habeas_data: false,
            },
            dptos: [],
            ciudades: [],
            dpto: null,
            ganador: ''
        }
    },
    methods: {
        getGanador() {
            axios
                .get('/api/concurso/usuario/ganador')
                .then(response => {
                    if(response.data.success) {
                        this.ganador = `CC. ${response.data.data.cedula} ${response.data.data.nombre} ${response.data.data.apellido}`
                    } else {
                        this.ganador = response.data.message
                    }
                })
        },
        enviarDatos() {
            //Vue.swal('hola')
            let loading = this.$loading.show({
                container: null,
            })

            axios
                .post('/api/concurso/usuario/registrar', this.form)
                    .then(response => {
                        if(response.data.success) {
                            Vue.swal({
                                title: 'Ok',
                                icon: 'success',
                                html: 'Tu registro se ha realizado exitósamente.'
                            })
                            this.form.cedula = ''
                            this.form.nombre = ''
                            this.form.apellido = ''
                            this.form.celular = ''
                            this.form.email = ''
                            this.form.ciudad = ''
                            this.form.habeas_data = false

                            this.getGanador()
                        } else {
                            let errors = response.data.errors
                            Vue.swal({
                                title: 'Error',
                                icon: 'warning',
                                html: response.data.message
                            })
                        }

                        loading.hide()
                    })
        },
        cargaCiudad() {
            this.ciudades = []

            // obtener data de ciudades
            if(this.dpto > 0) {
                axios
                    .get(`/api/departamentos/${this.dpto}/ciudades` )
                    .then(response => {
                        this.ciudades = response.data
                    })
            }
        },
    },
    mounted() {
        // obtener data de departamentos
        axios
            .get('/api/departamentos')
            .then(response => {
                this.dptos = response.data
            })

        this.getGanador()
    }
}
</script>

<style>
    .bg-yellow {
        background: #ffbf00;
    }
    .text-shadow {
        text-shadow: 2px 2px #555555;
    }
    .form-concurso {
        padding: 25px;
        margin: 20px;
    }
</style>