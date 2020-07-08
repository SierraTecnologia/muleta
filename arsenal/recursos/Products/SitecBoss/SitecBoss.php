<?php

namespace SiWeapons\Products\SitecBoss;

use App\Models\Model;
use Log;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class SitecBoss extends Integration
{
    public function getConnection($organizer = false)
    {
        return true;
    }
}
