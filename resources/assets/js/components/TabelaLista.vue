<template>
    <div>
      
      <div class="form-inline">
        <a v-if="criar" v-bind:href="criar">Criar</a>
        <div class="form-group pull-right">
          <input type="search" placeholder="Buscar" class="form-control" v-model="buscar">
        </div>

      </div>

                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th v-for="titulo in titulos">{{titulo}}</th>
                      <th v-if="detalhe || editar || excluir">Ações</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr v-for="(item,index) in lista">
                      <td v-for="i in item">{{i}}</td>
                      
                      <td v-if="detalhe || editar || excluir">
                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" v-bind:value="token">

                          <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> |
                          <a v-if="editar" v-bind:href="editar">Editar</a> |
                          <a href="#" v-on:click="executaForm(index)">Excluir</a>
                        </form>

                        <span v-if="!deletar || !token">
                          <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> |
                          <a v-if="editar" v-bind:href="editar">Editar</a> |
                        </span>

                      </td>
                    </tr>
                  </tbody>


                </table>


    </div>
</template>

<script>
    export default {
      props:['titulos','itens','criar','detalhe','editar','deletar','token'],
      data:function(){
        return {
          buscar:''
        }
      },
      computed:{
        lista:function(){
          return this.itens.filter(res => {
            for(let k = 0; k < res.length; k++){
              if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase())>=0){
                return true;
              }
            }
            return false;
          });
        }
      },

      methods:{
        executaForm: function(index){
          document.getElementById('index').submit();
        }
      }
    }
</script>
