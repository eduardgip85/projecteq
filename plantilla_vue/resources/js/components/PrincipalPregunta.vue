<template>
    <div>
        <h1>
            HOLA
        </h1>
        <secundari-pregunta 
            :pregunta="pregunta"
            @retornar_resposta="guardar_resposta">
        </secundari-pregunta>

        <!-- modal per s'acabi el joc -->
        <b-modal id="modal-1" title="BootstrapVue">
            <p class="my-4">Hello from modal!</p>
        </b-modal>

        <b-modal id="modal-hospital" @ok="redirigir" @cancel="redirigir" @hide="redirigir" @close="redirigir" title="Seleciona un hospital" size="lg" v-model="modalFinal">
            HAU
        </b-modal>

    </div>   
</template>

<script>
    export default {
        props:[
            "mode",
            "num_preguntes",
        ],
        data(){
            return{
               preguntes: [],
               pregunta: null,
               num: 0,                
               resposta_usuari: null,
               respostes_usuari: [],
               modalFinal: false,
            }
        },
        mounted() {
            console.log('Component 1.')
        },
        methods:
        {
            //metode per obtenir preguntes
            obternir_preguntes()
            {
                // variable auxiliar per a accedir al component (this)
                let me = this;
                // passem la ruta (url) de la api amb el mode i numero de preguntes
                axios.get('api/pregunta/' + this.mode + '/' + this.num_preguntes).then(function (response)
                {
                    //un cop les obtenim les passem a la variable preguntes
                    me.preguntes = response.data;
                    me.pregunta = me.preguntes[0];
                    me.num++;
                })
                .catch(function (error)
                {
                    console.log(error);
                })
            },
             canviar_pregunta(){
                
                var me = this;
                if(this.num < this.preguntes.length ){
                    me.pregunta = me.preguntes[this.num]
                }else{
                    //alert("game over");
                    this.modalFinal = true;
                }
                this.num++;                
            },
            redirigir(){
                alert("alright")
            },
            vaidar_resposta()
            {
                // igualem resposta afalse
                var resposta = false;                
                // si la resposta es la correcta
                if(this.resposta_usuari == this.pregunta.resposta_correcta)
                {
                    resposta = true;                    
                }   
                this.num++;
                this.canviar_pregunta()
                this.respostes_usuari.push(resposta);
            },
            guardar_resposta(resposta){ 
                this.respostes_usuari.push(resposta);  
                this.canviar_pregunta();              
            }
        },
        created(){
            this.obternir_preguntes();
        }
    }
</script>
