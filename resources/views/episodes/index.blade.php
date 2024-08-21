<x-layout title="Episódios">

    @isset($successMessage)
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endisset

    <form method="POST">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-itens-center">
                    Episódio {{ $episode->number }}

                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}"
                        @if ($episode->watched) checked @endif>


                </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-3 mb-3">Salvar</button>
    </form>
</x-layout>
