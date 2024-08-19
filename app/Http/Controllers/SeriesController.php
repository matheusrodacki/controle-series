<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        Serie::create($request->all());
        session()->flash('message.success', 'Série cadastrada com sucesso!');

        return to_route('series.index');
    }

    public function destroy(Request $request)
    {

        Serie::destroy($request->series);
        session()->flash('message.success', 'Série removida com sucesso!');

        return to_route('series.index');
    }
}
