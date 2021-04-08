<?php

namespace Muleta\Modules\Eloquents\Displays;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class ResourcesAbstract extends JsonResource implements ResourcesInterface
{
    public $with = [
        'success' => true
    ];
}