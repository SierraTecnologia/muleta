<?php

namespace SiUtils\Tools\Plugin;

use SiUtils\Tools\Builder;
use Finder\Models\Digital\Infra\Ci\Build;
use SiUtils\Tools\Plugin;

/**
 * Wipe Plugin - Wipes a folder
 *
 * @author Claus Due <claus@namelesscoder.net>
 */
class Wipe extends Plugin
{
    /**
     * @return string
     */
    public static function pluginName()
    {
        return 'wipe';
    }

    /**
     * {@inheritdoc}
     */
    public function __construct(Builder $builder, Build $build, array $options = [])
    {
        parent::__construct($builder, $build, $options);
    }

    /**
     * Wipes a directory's contents
     */
    public function execute()
    {
        $build = $this->builder->buildPath;

        if ($this->directory === $build) {
            return true;
        }

        if (is_dir($this->directory)) {
            $cmd = 'rm -Rf "%s"';

            return $this->builder->executeCommand($cmd, $this->directory);
        }

        return true;
    }
}
