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
        methods:
        {
            //metode per obtenir preguntes
            obternir_preguntes()
            {
                let me = this;
                // passem la ruta (url) de la api amb el mode i numero de preguntes
                axios.get('api/pregunta/' + this.mode + '/' + this.num_preguntes).then(function (response)
                {
                    //un cop les obtenim les passem a la variable preguntes
                    me.preguntes = response.data;
                })
                .catch(function (error)
                {
                    console.log(error);
                })
            }
        },
        created(){
            this.obternir_preguntes();
        }
    }
</script>
