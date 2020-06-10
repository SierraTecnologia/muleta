<?php

if (!function_exists('app_namespace')) {
    function app_namespace()
    {
        return app('Muleta\Services\CrudMaker\AppService')
            ->getAppNamespace();
    }
}
