<template>
    <div>
        <!-- dineros -->
        <div v-if="mode == 'millonario' && jugant">
            <h3>Dinero actual: {{ current_money}} €</h3>
            <h3>{{ 12 - num }} preguntas para ser millonario</h3>
        </div>

        <!-- plantarse -->
        <div align="center" v-if="mode == 'millonario' && se_puede_plantar">
            <b-button variant="warning" @click="plantarse()">
                <h3>PLANTARSE</h3>
            </b-button>
        </div>

        <secundari-pregunta 
            v-if="jugant"
            :pregunta="pregunta"
            @retornar_resposta="guardar_resposta">
        </secundari-pregunta>

      
        <!-- Menu per acxabar el joc-->
        <div v-if="!jugant" class="text-center">
            
            <div  v-if="mode == 'millonario'">
                <!-- plantarse -->
                <div align="center" v-if="plantado">

                    <h1>¿Seguro que te quieres plantar?</h1>
                    
                    <b-button @click="plantado = false, se_puede_plantar=false" variant="success">SI</b-button>
                    
                    <b-button @click="jugant= true" variant="danger">NO</b-button>
                    
                </div>
                <div v-else>
                    <div v-if="respostes_usuari[respostes_usuari.length-1][0] == false" class="text-center">
                        <b-card 
                                header="MENSAJE"
                                header-text-variant="white"
                                header-tag="header"
                                header-bg-variant="danger" 
                                class="text-center"
                                >
                            <b-card-text>
                                <h1>Que lastima...</h1>
                                <p> ¡Lo has peridio TODO, pero puedes volver a probar, a ver si tienes as suerte!</p>   
                                <br>
                                <a href="http://127.0.0.1:8000/milionari">
                                    <b-button>VOLVER INICIO</b-button>
                                </a>
                                <b-button @click="refresh()" variant="success">VOLVER A JUGAR</b-button>
                            </b-card-text>
                        </b-card>
                    </div>

                    <div v-else>
                         <b-card header="MENSAJE"
                                header-text-variant="white"
                                header-tag="header"
                                header-bg-variant="success" 
                                class="text-center">
                        <b-card-text>
                            <h1>¡Felicidades!</h1>
                            <p> Has conseguido la cantidad de:</p> 
                            <br>  
                            <h2> {{ current_money}} €</h2>
                            <br>
                            <a href="http://127.0.0.1:8000/milionari">
                                    <b-button>VOLVER INICIO</b-button>
                                </a>
                            <b-button @click="refresh()" variant="success">VOLVER A JUGAR</b-button>                       
                            

                        </b-card-text>
                    </b-card>
                    </div>
                </div>
                
                
            </div>

            <div v-else>    
                <!-- taula per al quiz -->
                <b-table-simple hover  responsive>
                    <b-thead head-variant="dark">
                        <b-tr>
                            <b-th>Pregunta</b-th>
                            <b-th>Tu respuesta</b-th>
                            <b-th>Respuesta correcta</b-th>
                        </b-tr>
                    </b-thead>
                    <b-tbody>
                        <b-tr v-for="(r_usuari, index) in respostes_usuari" :key="r_usuari.id">
                            <b-td> {{ preguntes[index].text_pregunta }}</b-td>                        
                            <b-td v-if="r_usuari[0]" variant="success">CORRECTO</b-td>
                            <b-td v-else variant="danger">INCORRECTO</b-td>
                            <b-td>{{ r_usuari[1]}}</b-td>
                        </b-tr>
                    </b-tbody>
                </b-table-simple>
                <a href="http://127.0.0.1:8000/quiz?">
                    <b-button>VOLVER INICIO</b-button>
                </a>

                <b-button @click="refresh()" variant="success">VOLVER A JUGAR</b-button>
            </div>
            
            

            
            
        </div>

        <footer class="" id="footer">

        <div class="text-center">
            <!-- anuncio -->
            © 2020 Copyright:
        </div>
    
    </footer>
    </div>   
</template>

<script>
    export default {
        props:[
            "mode",
            "num_preguntes",
            "nivell"
        ],
        data(){
            return{
               preguntes: [],
               pregunta: null,
               num: 0,                
               respostes_usuari: [],
               jugant: true,
               dineros: [100, 500, 1000, 2000, 5000, 10000, 50000, 
                        75000, 150000, 250000, 500000, 1000000],
               current_money: 0,
               plantado: false,
               se_puede_plantar: false
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
                //debugger;
                axios.get('api/pregunta/' + this.mode + '/'+ this.nivell +'/' + this.num_preguntes).then(function (response)
                {
                    //un cop les obtenim les passem a la variable preguntes
                    //debugger;
                    me.preguntes = response.data;
                    me.preguntes = me.barrejar_respostes(me.preguntes);
                    me.pregunta = me.preguntes[0];
                })
                .catch(function (error)
                {
                    console.log(error);
                })
            },
             canviar_pregunta(){
                this.num++;
                if(this.num == 5 || this.num == 8){
                        this.se_puede_plantar = true;
                }else{
                        this.se_puede_plantar = false;
                }  

                var me = this;
                if(this.num < this.preguntes.length ){
                    me.pregunta = me.preguntes[this.num]
                }else{
                    //alert("game over");
                    //this.modalFinal = true;
                    this.jugant = false;
                    //this.obernir_respostes_correctes();
                }
                
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
                debugger;
                if(this.mode == "millonario"){
                    if(!resposta[0]){
                        debugger;
                        this.jugant = false;
                    }else{
                        this.current_money = this.dineros[this.num];                         
                        this.canviar_pregunta();
                    }
                    this.respostes_usuari.push(resposta);
                    
                }else{
                    this.respostes_usuari.push(resposta); 
                    this.canviar_pregunta();              
                }
               
                
            },
            plantarse(){
                this.plantado = true;
                this.jugant = false;
                this.se_puede_plantar = false;
            },
            refresh(){
                window.location.reload();
            }
        },
        created(){
            this.obternir_preguntes();
        },
    
    }
</script>
