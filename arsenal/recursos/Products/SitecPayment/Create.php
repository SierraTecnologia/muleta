<?php

namespace Finder\Spider\Integrations\SitecPayment;

use Log;
use App\Models\User;

class Create extends SitecPayment
{
    public function project(Project $project)
    {
        $arrayFromProject = array(
            'description' => $project->description,
            'issues_enabled' => false
        );
        $project = $client->api('projects')->create($project->name, $arrayFromProject);
    }
}
