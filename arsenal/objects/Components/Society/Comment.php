<?php

namespace SiObjects\Components\Society;

use Log;
use App\Models\User;
use Integrations\Connectors\Connector\Instagram;

class Comment
{
    
    public function executeRoutines()
    {
        $this->getIntegrations();
    }
    
    
    public function getIntegrations()
    {
        return [
            new Instagram()
        ];
    }
    
    public function getPosts()
    {
        
    }
    
    public function getLikes()
    {
        
    }
    
    public function getRelations()
    {
        
    }

}