<?php

namespace Integrations\Connectors\SitecPayment;

use App\Models\Model;
use Log;
use App\Models\User;
use Integrations\Connectors\Integration;

class SitecPayment extends Integration
{
    public function getConnection($organizer = false)
    {
        $token = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
        return new Pipedrive($token);
    }
}
