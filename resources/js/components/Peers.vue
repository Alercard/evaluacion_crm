<template>
  <h1>PEERS (Vue Version)</h1>
    <div class="form-group p-fluid col-md-3" >
        <label>Parametros <strong style="color: red"> *</strong>:</label>
        <input
            class="form-control"
            v-model.trim.lazy="linea1"
            maxlength="13"
            type="text"
            placeholder="[n] [k]"
            @keydown="linea1Keydown($event)"
        />
    </div>

</template>

<script>
import {reactive, ref, onBeforeMount} from 'vue';

export default {
    name: "Peers",
    data() {
        return {
            linea1: "",
            n: 0,
            k: 0,
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
        linea1Keydown(e) {
            switch (true) {
                case e.key === ' ':
                    if (e.target.value.indexOf(' ') > 0) {
                        e.preventDefault();
                    }
                    break;
                case e.key.length > 1 && 'Backspace,Delete,ArrowRight,ArrowLeft,Shift,Home'.indexOf(e.key) > -1:
                    break;
                default:
                    if ( ! /^\d+$/.test(e.key)) {
                        e.preventDefault();
                    }
                   break;
            }
        },
    },
}
</script>

<style>

</style>
