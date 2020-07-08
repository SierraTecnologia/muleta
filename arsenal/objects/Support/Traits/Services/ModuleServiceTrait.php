<?php

namespace SiObjects\Support\Traits\Services;

use Illuminate\Support\Facades\Config;
use Crypto;

trait ModuleServiceTrait
{
    /**
     * Module Assets.
     *
     * @param string $module      Module name
     * @param string $path        Asset path
     * @param string $contentType Content type
     *
     * @return string
     */
    public function moduleAsset($module, $path, $contentType = 'null')
    {
        $assetPath = base_path(Config::get('cms.module-directory').'/'.ucfirst($module).'/Assets/'.$path);

        if (!is_file($assetPath)) {
            $assetPath = '/assets/'.$module.'/'.$path;
        }

        // @todo
        return $assetPath;

        return url('admin/asset/'.Crypto::url_encode($assetPath).'/'.Crypto::url_encode($contentType).'/?isModule=true');
    }

    /**
     * Module Config.
     *
     * @param string $module      Module name
     * @param string $path        Asset path
     * @param string $contentType Content type
     *
     * @return string
     */
    public function moduleConfig($module, $path)
    {
        $configArray = @include base_path(Config::get('cms.module-directory').'/'.ucfirst($module).'/config.php');

        if (!$configArray) {
            return \Illuminate\Support\Facades\Config::get('cms.features.'.$module.'.'.$path);
        }

        return self::assignArrayByPath($configArray, $path);
    }

    /**
     * Module Links.
     *
     * @param array $ignoredFeatures A list of ignored links
     *
     * @return string
     */
    public function moduleLinks($ignoredFeatures = [], $linkClass = 'nav-link', $listClass = 'nav-item')
    {
        $links = '';

        $modules = \Illuminate\Support\Facades\Config::get('cms.features', []);

        foreach ($ignoredFeatures as $ignoredModule) {
            if (in_array(strtolower($ignoredModule), array_keys($modules))) {
                unset($modules[strtolower($ignoredModule)]);
            }
        }

        foreach ($modules as $module => $config) {
            $link = $module;

            if (isset($config['url'])) {
                $link = $config['url'];
            }

            $displayLink = true;

            if (isset($config['is_ignored_in_menu']) && $config['is_ignored_in_menu']) {
                $displayLink = false;
            }

            if ($displayLink) {
                $links .= '<li class="'.$listClass.'"><a class="'.$linkClass.'" href="'.url($link).'">'.ucfirst($link).'</a></li>';
            }
        }

        return $links;
    }
}
