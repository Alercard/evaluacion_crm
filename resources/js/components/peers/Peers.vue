<template>
    <h1>PARES (Vue Version)</h1>
    <a href="/documentation?bash#pares-de-nmeros" target="_blank">Ver Documentación</a>
    <div class="form-group p-fluid w-full" >
        <label>Data <strong style="color: red"> *</strong>:</label>
        <textarea
            class="form-control w-full"
            v-model.trim.lazy="data"
            required
            rows="4"
        >
        </textarea>
    </div>

    <div class="form-group p-fluid w-full" >
        <button
            type="button"
            class="p-button p-component text-center p-button-success justify-content-center"
            @click=" requestApiPeers()"
            :disabled="processing"
        >
            <i :class="['pi pi-cog text-light pr-1', {'pi-spin': processing}]" ></i>
            <span class="text-light pl-2" v-show="!processing">Procesar</span>
            <span class="text-light pl-2" v-show="processing">Procesando...</span>
        </button>
    </div>

    <div :class="['form-group p-fluid w-full bg-danger align-items-center p-2', {'d-flex': error!=='', 'd-none': error===''}]">
        <i class="pi pi-exclamation-triangle text-light pr-1" ></i>
        <span class="text-light">
            {{ error }}
        </span>
    </div>

    <div class="form-group p-fluid w-full bg-info d-flex align-items-center p-2" >
        <i class="pi pi-info-circle text-light pr-1" ></i>
        <span class="text-light pr-2">Pares:</span>
        <span class="text-light">{{result}}</span>
    </div>

    <div class="form-group p-fluid w-full ">
        <h2>Histórico</h2>
        <div v-for="history in histories" :key="history.key" class="p-3 border border-primary">
            <div class="">
                <span class="mb-0 font-weight-bold">Request Inicio: </span>
                <span>{{ `${history.request_init.getFullYear()}-${history.request_init.getMonth()}-${history.request_init.getDate()} ${history.request_init.getHours()}:${history.request_init.getMinutes()}:${history.request_init.getSeconds()}` }}</span>
            </div>
            <div>
                <span class="mb-0 font-weight-bold">Data: </span>
                <p>
                    {{ history.line1 }}<br/>
                    {{ history.line2 }}
                </p>
            </div>
            <div>
                <span class="mb-0 font-weight-bold">Resultado: </span>
                <span>{{ history.result }}</span>
            </div>
            <div class="d-flex space-between">
                <span class="mb-0 font-weight-bold">Tiempo de Ejecución: </span>
                <span>{{ history.result_time_hours }} horas, {{ history.result_time_minutes }} mins, {{ history.result_time_seconds }} segs, {{ history.result_time_ms }} ms</span>
            </div>
        </div>
    </div>

</template>

<script>
import {reactive, ref, onBeforeMount} from 'vue';

export default {
    name: "Peers",
    data() {
        return {
            data: '',
            result: 0,
            error: '',
            processing: false,
            histories: []
        }
    },
    watch: {
        linea1(newLinea1, oldLinea1) {
            const temp = newLinea1.split(' ');
            switch (true) {
                case temp.length > 2:
                    this.linea1 = oldLinea1;
                    break;
                default:
                    this.n = temp[0] ? parseInt(temp[0]) : 0;
                    this.k = temp[1] ? parseInt(temp[1]) : 0;
                    break;
            }
        }
    },
    methods: {
        requestApiPeers() {
            if (this.data === '') {
                this.error = 'Debe ingresar los datos';
                return;
            }
            const url = '/api/peer/process';
            const data = {
                data: this.data
            };
            const token = `Bearer 99|mvqZgYdev8Cl2BVAfnprcCfV5hkoWTloZil1nZGG`

            const config = {
               headers: {
                    'Content-Type': 'application/json',
                    'Authorization': token
                }
            };
            this.processing=true;
            this.error=''
            const request_init = new Date();
            axios.post(url, data, config)
                .then(response => {
                    this.result = response.data.results;
                    this.error = response.data.error;
                })
                .catch(error => {
                    console.log(error);
                    this.result = error;
                })
                .finally(() => {
                    this.processing = false;
                    const result_time = new Date();
                    const diffMs = result_time - request_init;
                    const secs = (diffMs / 1000)
                    const mins = (secs / 60)
                    this.histories.unshift({
                        key: this.histories.length,
                        data: this.data,
                        line1: this.data.split('\n')[0],
                        line2: this.data.split('\n')[1],
                        request_init: request_init,
                        result: this.result,
                        result_time: result_time,
                        result_time_hours: Math.round((mins / 60) % 24),
                        result_time_minutes: Math.round(mins % 60),
                        result_time_seconds: Math.round(secs % 60),
                        result_time_ms: diffMs
                    })
                })
        }
    },
}
</script>

<style>
    button span.p-button-label {
        flex: none;
    }
</style>
