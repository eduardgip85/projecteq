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
            
            <!-- taula -->
            <b-table-simple hover  responsive>
                <b-thead head-variant="dark">
                    <b-tr>
                        <b-th >Pregunta</b-th>
                        <b-th>Tu respuesta</b-th>
                        <b-th>Respuesta correcta</b-th>
                    </b-tr>
                </b-thead>
                <b-tbody>
                    <b-tr v-for="(r_usuari, index) in respostes_usuari" :key="r_usuari.id">
                        <b-td> {{ preguntes[index].text_pregunta }}</b-td>                        
                        <b-td v-if="r_usuari" variant="success">CORRECTO</b-td>
                        <b-td v-else variant="danger">INCORRECTO</b-td>
                        <b-td>CHOCOLATE</b-td>
                    </b-tr>
                </b-tbody>
            </b-table-simple>
            
            <a href="http://127.0.0.1:8000/quiz?">
                <b-button>TORNAR INICI</b-button>
            </a>
            <a href="http://127.0.0.1:8000/game_mode?">
                <b-button variant="success">TORNAR A JUGAR</b-button>
            </a>
            
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
                    me.preguntes = me.barrejar_respostes(me.preguntes);
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
            barrejar_respostes(preguntes){

                for (var i = 0; i < preguntes.length; i++) {
                    // igualem les respotes a l'array barrejat
                    preguntes[i].respostes = this.shuffle(preguntes[i].respostes);
                }
                return preguntes;
            },
            shuffle(array) {
                
                var currentIndex = array.length, temporaryValue, randomIndex;

                // While there remain elements to shuffle...
                while (0 !== currentIndex) {

                    // Pick a remaining element...
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex -= 1;

                    // And swap it with the current element.
                    temporaryValue = array[currentIndex];
                    array[currentIndex] = array[randomIndex];
                    array[randomIndex] = temporaryValue;
                }

                return array;
            },
            redirigir(){
                //alert("alright")

                window.location.href = 'http://127.0.0.1:8000/quiz?'; 
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
