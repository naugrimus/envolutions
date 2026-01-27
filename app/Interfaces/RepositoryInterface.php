<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;
interface RepositoryInterface
{

    public function all(): Collection;
}
