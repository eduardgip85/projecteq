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
                    <!-- posarem tantes repostes com tingui la pregunta -->
                    <b-form-radio v-for="resposta in pregunta.respostes" 
                        :key="resposta.id_resposta"
                        :value="resposta.text_resposta"
                        >{{resposta.text_resposta}}</b-form-radio>
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
               resposta_usuari: null
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
                var resposta = false;                
                // si la resposta es la correcta
                if(this.resposta_usuari == this.pregunta.resposta_correcta)
                {
                    resposta = true;                    
                }   
                // retornem la reposta com a event al component superior
                this.$emit('retornar_resposta', resposta);          
            },
            
        },
        created(){
        }
    }
</script>
