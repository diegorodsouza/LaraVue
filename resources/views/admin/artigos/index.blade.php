@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <painel titulo="Artigos">
                <tabela-lista 
                  v-bind:titulos="['id','teste2','titulo3']" 
                  v-bind:itens="[['1','teste1','titulo1'],['2','teste2','titulo2'],['3','teste3','titulo3']]"
                  criar="#c" detalhe="#dt" editar="#e" deletar="#d" token="adwd"
                  
                  >
                </tabela-lista>
              </painel>
            </div>
        </div>
    </div>
@endsection
