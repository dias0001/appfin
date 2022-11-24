@extends('template')

@section('titulo', 'Seus Gastos')

@section('nav-complementar')
<li class="nav-item">
    <a class="nav-link" href="{{ route('seus_gastos') }}">Entenda os seus gastos</a>
</li>
@endsection

@section('conteudo')
<header class="text-center">
    SEUS GASTOS
</header>

<div class="container d-flex">
    <div class="col-md-12 p-3">
        <p>Gráfico das suas Receitas e Despesas</p>
    </div>
</div>
@endsection