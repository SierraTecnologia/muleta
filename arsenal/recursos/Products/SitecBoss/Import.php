<?php

namespace SiWeapons\Products\SitecBoss;

use Log;
use App\Models\User;

class Import extends SitecBoss
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
