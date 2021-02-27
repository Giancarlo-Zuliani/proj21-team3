<template>
  <h1>{{name}}:{{description}}</h1>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: {
          name: String,
          description: String
        }
    }
</script>
