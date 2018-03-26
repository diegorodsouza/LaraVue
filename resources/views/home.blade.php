@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <painel titulo="Dashboard">
                  <div class="row">
                    <div class="col-md-4">
                      <caixa titulo="Artigos" qtd="150" icone="ion ion-pie-graph" url="{{route('artigos.index')}}" cor="orange">
                        Teste de conteúdo..
                      </caixa>
                    </div>
                    <div class="col-md-4">
                      <caixa titulo="Autores" qtd="80" icone="ion ion-person" url="#" cor="red">
                        Teste de conteúdo..
                      </caixa>
                    </div>
                    <div class="col-md-4">
                      <caixa titulo="Usuarios" qtd="30" icone="ion ion-person-stalker" url="#" cor="blue">
                        Teste de conteúdo..
                      </caixa>
                    </div>
                  </div>
                </painel>
            </div>
        </div>
    </div>
@endsection
