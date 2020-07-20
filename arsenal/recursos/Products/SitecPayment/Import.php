<?php

namespace Integrations\Connectors\Connector\SitecPayment;

use Log;
use App\Models\User;

class Import extends SitecPayment
{
    public function projects()
    {
        $project = $client->api('projects')->create(
            'My Project', array(
            'description' => 'This is a project',
            'issues_enabled' => false
            )
        );
    }
}
