<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;

interface SeriesRepository
{
  public function add(SeriesFormRequest $request): Series;
}
