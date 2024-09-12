<x-layout title="Episodios">
    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episodio {{ $episode->number }}

                    <input type="checkbox"                  
                        name="episodes[]" {{-- quando chegar no backend php vira um array automaticamente --}} 
                        value="{{ $episode->id }}"
                        @if ($episode->watched) checked @endif {{-- se o episodio foi assistido, vamos adicionar o atributo checked, se nao, não precisamos adicionar nada --}} />  
                </li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</x-layout>
