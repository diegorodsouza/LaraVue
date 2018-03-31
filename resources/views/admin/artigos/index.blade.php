@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

              <painel titulo="Artigos">

                <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

                <tabela-lista 
                  v-bind:titulos="['#','Nome','Descrição']" 
                  v-bind:itens="{{$listaArtigos}}"
                  ordem="asc" ordemcol="1"
                  criar="#c" detalhe="#dt" editar="#e" deletar="#d" token="adwd"
                  modal="sim"             
                  >
                </tabela-lista>

              </painel>

            </div>
        </div>
    </div>

    <modal nome="editar">
      <painel titulo="Editar">
        <formulario css="" action="#" method="put" enctype="" token="">

        <form>

            <div class="form-group">
              <label for="titulo">Título</label>
              <input type="text" class="form-control" v-model="$store.state.item.titulo" id="titulo" placeholder="Título...">
            </div>

            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input type="text" class="form-control" v-model="$store.state.item.descricao" id="descricao" placeholder="Descrição...">
            </div>

            <button type="submit" class="btn btn-info">Atualizar</button>
          </form>

        </formulario>
      </painel>
    </modal>
  
    <modal nome="detalhe">
      <painel v-bind:titulo="$store.state.item.titulo">
        <p>@{{$store.state.item.descricao}}</p>
        
      </painel>
    </modal>

    <modal nome="adicionar">
      <painel titulo="Adicionar">
        <formulario css="" action="#" method="post" enctype="" token="">

        <form>

            <div class="form-group">
              <label for="titulo">Título</label>
              <input type="text" class="form-control" id="titulo" placeholder="Título...">
            </div>

            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input type="text" class="form-control" id="descricao" placeholder="Descrição...">
            </div>

            <button type="submit" class="btn btn-info">Adicionar</button>
          </form>

        </formulario>
      </painel>
    </modal>
@endsection
