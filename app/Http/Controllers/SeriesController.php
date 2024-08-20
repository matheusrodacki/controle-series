<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::with(['seasons', 'seasons.episodes'])->get();
        $successMessage = session('message.success');

        return view('series.index', compact('series', 'successMessage'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $series = Series::create($request->all());
        return to_route('series.index')->with('message.success', "Série '{$series->name}' cadastrada com sucesso!");
    }

    public function edit(Series $series)
    {
        dd($series->seasons);
        return view('series.edit')->with('serie', $series);
    }

    public function update(SeriesFormRequest $request, Series $series)
    {
        $series->update($request->all());
        return to_route('series.index')->with('message.success', "Série '{$series->name}' atualizada com sucesso!");
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return to_route('series.index')->with('message.success', "Série '{$series->name}' removida com sucesso!");
    }
}
