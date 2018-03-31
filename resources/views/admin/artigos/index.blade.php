@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

              <painel titulo="Artigos">

                <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

                <tabela-lista 
                  v-bind:titulos="['#','Nome','Descrição', 'Data']" 
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

    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" css="" action="#" method="put" enctype="multipart/form-data" token="151717">

            <div class="form-group">
              <label for="titulo">Título</label>
              <input type="text" class="form-control" v-model="$store.state.item.titulo" id="titulo" placeholder="Título...">
            </div>

            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input type="text" class="form-control" v-model="$store.state.item.descricao" id="descricao" placeholder="Descrição...">
            </div>

          </formulario>

          <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
          </span>

    </modal>
  
    <modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">
        <p>@{{$store.state.item.descricao}}</p>
    </modal>

    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{csrf_token()}}">

          <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título...">
          </div>

          <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição...">
          </div>

          <div class="form-group">
            <label for="conteudo">Conteúdo</label>
            <textarea class="form-control" id="conteudo" name="conteudo"></textarea>
          </div>

          <div class="form-group">
            <label for="data">Data</label>
            <input type="datetime-local" class="form-control" id="data" name="data">
          </div>

        </formulario>

        <span slot="botoes">
          <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>

    </modal>
@endsection
