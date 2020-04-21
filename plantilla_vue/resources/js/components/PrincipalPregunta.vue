<template>
    <h1>
        HOLA
    </h1>
</template>

<script>
    export default {
        props:[
            "mode",
            "num_preguntes"
        ],
        data(){
            return{
               preguntes: null 
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods(){

        }
    }
</script>
