<template>
    <div>
        
            

        <h3>La pregunta es: </h3>
        <h1 id="titol-pregunta">
        
        </h1>
        <form ref="form" @submit.stop.prevent="handleSubmit">
        <!-- resposta -->
            <b-form-group
            label-cols="5"
            label-cols-md="4"
            label-cols-xl="3"
            id="input-group-0"

            label-for="input-0"
            >
                <b-form-radio-group
                    id="radio-group"
                    required
                    v-model="resposta_usuari"
                    name="radio-sub-component"
                >
                    <b-form-radio v-for="resposta in respostes" 
                        :key="resposta.id_resposta"
                        :value="resposta.text_resposta"
                        >{{resposta.text_resposta}}</b-form-radio>
                </b-form-radio-group>
            </b-form-group>
            <div class="d-flex justify-content-center">
            <button
                type="submit"
                id="boto-submit"
                v-on:click="retornar_resposta()"
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
               respostes: [],
               resposta_usuari: null
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.mostrar_pregunta();        
        },
        methods:
        {
            retornar_resposta(){
                resposta = "";
                console.log("hola")
                if(this.resposta_usuari == this.pregunta.resposta_correcta){
                    resposta = "true";
                    console.log("true")
                }else{
                    resposta = "false";
                    console.log("false")
                }                
                console.log(resposta)
            },
            mostrar_pregunta(){
                console.log(this.pregunta);
                this.respostes = this.pregunta.respostes;            
                document.getElementById("titol-pregunta").innerHTML = this.pregunta.text_pregunta;  
            },
        },
        created(){
        }
    }
</script>
