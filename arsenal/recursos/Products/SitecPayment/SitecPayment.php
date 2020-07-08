<?php

namespace Finder\Spider\Integrations\SitecPayment;

use App\Models\Model;
use Log;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class SitecPayment extends Integration
{
    public function getConnection($organizer = false)
    {
        $token = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
        return new Pipedrive($token);
    }
}
