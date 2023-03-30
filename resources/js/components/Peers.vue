<template>
    <h1>PARES (Vue Version)</h1>
    <div class="form-group p-fluid w-full" >
        <label>Data <strong style="color: red"> *</strong>:</label>
        <textarea
            class="form-control w-full"
            v-model.trim.lazy="data"
            required
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
            processing: false
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
