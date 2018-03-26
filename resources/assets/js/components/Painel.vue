<template>
  <div v-bind:class="defineCor">
    <div class="panel-heading">{{titulo}}</div>

    <div class="panel-body">
      <slot></slot>
    </div>
  </div>
</template>

<script>
    export default {
       props:['titulo','cor'],
       computed:{
         defineCor:function(){
           return "panel " + (this.cor || "panel-default");
         }
       }
    }
</script>

<style media="screen">

.panel-success {
    border-color: #d6e9c6;
}

.panel-success > .panel-heading {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}

</style>
