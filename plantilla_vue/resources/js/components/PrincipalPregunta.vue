<template>
    <div>
        <secundari-pregunta 
            v-if="jugant"
            :pregunta="pregunta"
            @retornar_resposta="guardar_resposta">
        </secundari-pregunta>

        <!-- modal per s'acabi el joc -->
        <b-modal id="modal-hospital" @ok="redirigir" @cancel="redirigir" @hide="redirigir" @close="redirigir" title="" size="lg" v-model="modalFinal">
            S'ha acabat el joc
        </b-modal>

        <!-- Menu per acxabar el joc-->
        <div v-if="!jugant" class="text-center">
              
            <b-button>P CASA</b-button>
            <b-button variant="success">TRONAR A JUGAR</b-button>
        </div>
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
               jugant: true,
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
                    //this.modalFinal = true;
                    this.jugant = false;
                }
                this.num++;                
            },
            redirigir(){
                //alert("alright")

                window.location.href = 'http://127.0.0.1:8000/quiz?'; 
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
