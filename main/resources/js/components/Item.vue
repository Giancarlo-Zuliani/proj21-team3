<template>
  <h3 @click="getItem()">
    <i class="fas fa-utensils">
    </i>
      {{name}}: {{description}}
      <i class="fas fa-plus"></i>
  </h3>
</template>

<script>
  export default {
        data: function() {
            return {
                itemsArray: [],
            };
        },
        mounted() {
            console.log('Item component.')          
        },
        props: {
          name: String,
          description: String,
          id: Number,
        },
        methods: {
          getItem() {
            let url = 'http://127.0.0.1:8000/getItem/' + this.id;

            axios.get(url)
                    .then(response => {
                        this.itemsArray.push(response.data);
                        console.log(this.itemsArray[0].name);
            });

        },
        
        }
    }
</script>
