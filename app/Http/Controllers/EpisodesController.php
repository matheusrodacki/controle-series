<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController
{
  public function index(Season $season)
  {
    return view('episodes.index', [
      'episodes' => $season->episodes,
    ]);
  }
  public function store(Request $request, Season $season)
  {
    dd($request->all());

    // Validate the request data
    $validatedData = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'nullable|string',
      'air_date' => 'required|date',
    ]);

    // Create a new episode
    $season->episodes()->create($validatedData);

    // Redirect back to the episodes index
    return redirect()->route('episodes.index', $season)->with('success', 'Episode created successfully.');
  }
}
