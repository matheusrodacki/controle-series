<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticator;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class SeriesController extends BaseController
{
    private SeriesRepository $repository;

    public function __construct(SeriesRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware(Authenticator::class)->except(['index']);
    }

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
        $serie = $this->repository->add($request);
        return to_route('series.index')->with('message.success', "Série '{$serie->name}' cadastrada com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
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
