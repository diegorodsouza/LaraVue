@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

              <painel titulo="Artigos">

                <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

                <modal-link tipo="button" nome="olar" titulo="Oie"></modal-link>

                <tabela-lista 
                  v-bind:titulos="['#','Nome','Descrição']" 
                  v-bind:itens="[['1','teste1','titulo1'],['2','teste2','titulo2'],['3','teste3','titulo3']]"
                  
                  ordem="asc" ordemCol="1"
                  criar="#c" detalhe="#dt" editar="#e" deletar="#d" token="adwd"
                  
                  >
                </tabela-lista>

              </painel>

            </div>
        </div>
    </div>

    <modal titulo="Oie" nome="olar">
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
