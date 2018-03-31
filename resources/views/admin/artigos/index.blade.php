@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <painel titulo="Artigos">
                <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
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
@endsection
