<template>
  <h3>
    <i class="fas fa-utensils">
    </i>
      {{name}}: {{description}}
  </h3>
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
