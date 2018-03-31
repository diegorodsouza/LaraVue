<template>
    <div>
      
      <div class="form-inline">
        <a v-if="criar && !modal" v-bind:href="criar">Criar</a>
        <modal-link v-if="criar && modal" tipo="button" nome="adicionar" titulo="Oie"></modal-link>
        
        <div class="form-group pull-right">
          <input type="search" placeholder="Buscar" class="form-control" v-model="buscar">
        </div>

      </div>

        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo,index) in titulos">{{titulo}}</th>
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
        
                  <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhes</a> 
                  <modal-link v-if="detalhe && modal" v-bind:item="item" tipo="link" nome="detalhe" titulo="Detalhes"></modal-link> |

                  <a v-if="editar && !modal" v-bind:href="editar">Editar</a> 
                  <modal-link v-if="editar && modal" tipo="link" v-bind:item="item" nome="editar" titulo="Editar"></modal-link> |

                  <a href="#" v-on:click="executaForm(index)">Excluir</a>
                </form>

                <span v-if="!deletar || !token">

                  <a v-if="detalhe && !modal" v-bind:href="detalhe">Detalhes</a> 
                  <modal-link v-if="detalhe && modal" v-bind:item="item" tipo="link" nome="detalhe" titulo="Detalhes"></modal-link> |

                  <a v-if="editar && !modal" v-bind:href="editar">Editar</a> 
                  <modal-link v-if="editar && modal" tipo="link" v-bind:item="item" nome="editar" titulo="Editar"></modal-link> |
                </span>

              </td>
            </tr>
          </tbody>

        </table>

    </div>
</template>

<script>
export default {
  props: [
    "titulos",
    "itens",
    "criar",
    "detalhe",
    "editar",
    "deletar",
    "token",
    "ordem",
    "ordemcol",
    "modal"
  ],
  data: function() {
    return {
      buscar: "",
      ordemAux: this.ordem || "asc",
      ordemAuxCol: this.ordemcol || 0
    };
  },
  methods: {
    executaForm: function(index) {
      document.getElementById("index").submit();
    },

    ordenaColuna: function(coluna) {
      this.ordemAuxCol = coluna;
      if (this.ordemAux.toLowerCase() == "asc") this.ordemAux = "desc";
      else this.ordemAux = "asc";
    }
  },

  computed: {
    lista: function() {
      let ordem = this.ordemAux;
      let ordemcol = this.ordemAuxCol;

      ordem = ordem.toLowerCase();
      ordemcol = parseInt(ordemcol);

      if (ordem == "asc") {
        this.itens.sort(function(a, b) {
          if (Object.values(a)[ordemcol] > Object.values(b)[ordemcol]) {
            return 1;
          }
          if (Object.values(a)[ordemcol] < Object.values(b)[ordemcol]) {
            return -1;
          }
          return 0;
        });
      } else {
        this.itens.sort(function(a, b) {
          if (Object.values(a)[ordemcol] < Object.values(b)[ordemcol]) {
            return 1;
          }
          if (Object.values(a)[ordemcol] > Object.values(b)[ordemcol]) {
            return -1;
          }
          return 0;
        });
      }

      if (this.buscar) {
        return this.itens.filter(res => {
          res = Object.values(res);
          for (let k = 0; k < res.length; k++) {
            if (
              (res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >=
              0
            ) {
              return true;
            }
          }
          return false;
        });
      }

      return this.itens;
    }
  }
};
</script>
