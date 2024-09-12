<x-layout title="Temporadas de {!! $series->nome !!}">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{-- transformando a Temporada em um link --}}
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                </a>

                <span class="badge bg-secondary">
                     {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }} {{--//estamos fazendo um filtro para retornarmos somente os episodios que foram assistidos e desse episodios estamos fazendo a contagem --}}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
