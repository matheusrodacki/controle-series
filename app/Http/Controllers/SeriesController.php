<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all()->sortBy('nome');
        $successMessage = session('message.success');

        return view('series.index', compact('series', 'successMessage'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {

        $serie = Serie::create($request->all());

        return to_route('series.index')->with('message.success', "Série '{$serie->nome}' cadastrada com sucesso!");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(SeriesFormRequest $request, Serie $series)
    {
        $series->update($request->all());
        return to_route('series.index')->with('message.success', "Série '{$series->nome}' atualizada com sucesso!");
    }

    public function destroy(Serie $series)
    {
        $series->delete();
        return to_route('series.index')->with('message.success', "Série '{$series->nome}' removida com sucesso!");
    }
}
