<?php

namespace App\DTO;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractDTO
{

    Abstract protected static function fromRequest(FormRequest $request): Model;
}
