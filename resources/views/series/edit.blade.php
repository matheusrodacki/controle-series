<x-layout title="Editar Série  '{!! $series->name !!}'">
    <form action="{{ route('series.update') }}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome da Série:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $serie->name }}"
                    autofocus>
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">Número de Temporadas:</label>
                <input type="text" name="seasonsQty" id="seasonsQty" class="form-control">
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Episodios por Temporada:</label>
                <input type="text" name="episodesPerSeason" id="episodesPerSeason" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-dark mt-2">
            Salvar
        </button>
    </form>
</x-layout>
