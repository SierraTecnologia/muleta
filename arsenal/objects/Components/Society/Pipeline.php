<?php

namespace SiObjects\Components\Society;

use Log;
use App\Models\User;
use Integrations\Connectors\Instagram;

use App\Pipelines\Contracts\Registrator;
use App\Pipelines\Contracts\Notificator;

class Pipeline
{

    protected $pipeline;

    public function getPipeline()
    {
        return $this->pipeline;
    }
    public function __toString()
    {
        return 'this is object Pipeline';
    }
}