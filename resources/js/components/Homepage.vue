<template>
 <div class="panel panel-default">
     <div class="panel-heading">   
        <router-link :to="{ name: 'create', params: { userId } }">
           NEW POST
        </router-link>
      </div>
  </div>   
</template>           
  
<script>
    export default {
      props: {
        userId: {
          type: Number,
          required: true
        },
        userName: {
          type: String,
          required: true
        }
      },
      data() {
        return {};
      }
    };
</script>        