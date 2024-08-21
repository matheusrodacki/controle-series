<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $serie =  DB::transaction(function () use ($request, &$serie) {

            $serie = Series::create($request->all());
            $seasons = [];

            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i
                ];
            }

            Season::insert($seasons);

            $episodes = [];

            foreach ($serie->seasons as $season) {
                for ($i = 1; $i <= $request->episodesPerSeason; $i++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $i
                    ];
                }
            }

            Episode::insert($episodes);

            return $serie;
        }, 5);

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
