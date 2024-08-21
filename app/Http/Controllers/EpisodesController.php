<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController
{
  public function index(Season $season)
  {
    return view('episodes.index', [
      'episodes' => $season->episodes,
      'successMessage' => session('message.success'),
    ]);
  }
  public function update(Request $request, Season $season)
  {
    DB::beginTransaction();
    $watchedEpisodes = $request->episodes; // Get the watched episodes from the request

    $season->episodes->each(function ($episode) use ($watchedEpisodes) {
      $episode->watched = in_array($episode->id, $watchedEpisodes);
    });

    $season->push(); // Save the changes to the database

    DB::commit();

    // Redirect back to the episodes index
    return redirect()->route('episodes.index', $season->id)->with('message.success', 'Episódios marcou como assistidos com sucesso!');
  }
}
