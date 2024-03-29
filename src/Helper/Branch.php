<?php

namespace Muleta\Helper;

use PHPCensor\Model\Project;

class Branch
{
    public static function getDefaultBranchName($projectType): string
    {
        switch ($projectType) {
        case Project::TYPE_HG:
        case Project::TYPE_BITBUCKET_HG:
            return 'default';
        case Project::TYPE_SVN:
            return 'trunk';
        default:
            return 'master';
        }
    }
}
