@extends ('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif
<a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $serie->nome }}
        <form method="post" action="/series/{{ $serie->id }}" onsubmit="return confirm('Você tem certeza que deseja excluir')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>
            </button>
        </form>
{{--        <a href="#" class="btn btn-danger">Excluir</a>--}}
    </li>
    @endforeach
</ul>
@endsection
