<x-layout title="Séries">
    @auth
        <a class="btn btn-dark mb-2" href="{{ route('series.create') }}">Adicionar</a>
    @endauth


    @isset($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-itens-center">
                @auth <a class="link-dark link-underline link-underline-opacity-0"
                    href="{{ route('seasons.index', $serie->id) }}"> @endauth
                    {{ $serie->name }}
                    @auth </a> @endauth
                @auth
                    <span class="d-flex">
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">E</a>
                        <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">X</button>
                        </form>
                    </span>
                @endauth
            </li>
        @endforeach
    </ul>
</x-layout>
