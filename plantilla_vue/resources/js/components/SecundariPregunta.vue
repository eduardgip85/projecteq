<template>
    <div>
        <h3>La pregunta es: </h3>
        <!--
        <h1 id="titol-pregunta">
        
        </h1>-->
        <h1 v-text="pregunta.text_pregunta">

        </h1>
        <form ref="form" @submit.stop.prevent="vaidar_resposta">
        <!-- resposta -->
            <b-form-group
            id="input-group-0"
            >
                <b-form-radio-group
                    id="radio-group"
                    required
                    v-model="resposta_usuari"
                    name="radio-sub-component"
                    buttons
                    button-variant="outline-secondary"
                >
                    <!-- posarem tantes repostes com tingui la pregunta -->
                    <b-form-radio v-for="resposta in pregunta.respostes" 
                        id="form-radio-btn"
                        :key="resposta.id_resposta"
                        :value="resposta.id"
                        >{{resposta.text_resposta}}
                        </b-form-radio>


                </b-form-radio-group>
            </b-form-group>
            <div class="d-flex justify-content-center">
            <button
                type="submit"
                id="boto-submit"
                style="display: block;"
                class="btn btn-primary"
                >Guardar Resposta</button>
            </div>

        </form>    
    </div>
    
</template>

<script>
    export default {
        props:[
            "pregunta"
        ],
        data(){
            return{
               //respostes: [],
               //pregunta: null,
               resposta_usuari: null,
               resposta_validada: null
            }
        },
        mounted() 
        {
            console.log('Component 2.')
            // executem el metode per mostrar pregunta
            //this.mostrar_pregunta();        

            // agafem el titol de la pregunta i limposme el valor de la pregunta 
            document.getElementById("titol-pregunta").innerHTML = this.pregunta.text_pregunta;  
        },
        methods:
        {
            mostrar_pregunta()
            {
                
                document.getElementById("titol-pregunta").innerHTML = this.pregunta.text_pregunta;  
            },
            vaidar_resposta()
            {
                // igualem resposta afalse
                //this.resposta = false;                
                // si la resposta es la correcta

                //fer api
                let me = this;
                debugger;
                axios.get('api/resposta/' + this.resposta_usuari + '/' + "validar").then(function (response)
                {
                    debugger;
                    //un cop les obtenim les passem a la variable preguntes
                    me.resposta_validada = response.data[0];
                    // nullejem la reposta del usuari
                    me.resposta_usuari = null;
                    // retornem la reposta com a event al component superior
                    me.$emit('retornar_resposta', me.resposta_validada);  
                })
                .catch(function (error)
                {
                    console.log(error);
                })                      
            },
            
        },
        created(){
        }
    }
</script>
