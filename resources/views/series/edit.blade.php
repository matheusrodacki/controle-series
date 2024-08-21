<x-layout title="Editar Série  '{!! $series->name !!}'">
    <form action="{{ route('series.update', $series->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome da Série:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $series->name }}"
                    autofocus>
            </div>
        </div>
        <button type="submit" class="btn btn-dark mt-2">
            Salvar
        </button>
    </form>
</x-layout>
