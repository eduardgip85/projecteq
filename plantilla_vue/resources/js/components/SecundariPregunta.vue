<template>
    <div>
        <h3>La pregunta es: </h3>
        <h1 id="titol-pregunta">
        
        </h1>
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
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:
        {
            retornar_resposta(){

            },
            mostrar_pregunta(){
                console.log(this.pregunta);
                this.respostes = this.pregunta.respostes;            
                document.getElementById("titol-pregunta").innerHTML = "HAU" //this.pregunta.text_pregunta;  
            }
        },
        created(){
            this.mostrar_pregunta();        
        }
    }
</script>
