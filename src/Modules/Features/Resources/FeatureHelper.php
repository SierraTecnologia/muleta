<?php

namespace Muleta\Modules\Features\Resources;


class FeatureHelper
{
    public static function allFeatures(): array
    {
        $features[] = 'espolio';

        return $features;
    }
    public static function hasActiveFeature($feature): bool
    {
        if (is_array($feature)) {
            foreach ($feature as $oneFeature) {
                if (self::hasActiveFeature($oneFeature)) {
                    return true;
                }
            }
            \Log::debug('Feature Desativada: '.implode(',', $feature));
            return false;
        }

        if (config('cms.active-core-features', false) && in_array($feature, config('cms.active-core-features'))) {
            return true;
        }
        if (in_array($feature, config('siravel.active-core-features', []))) {
            return true;
        }
        
        \Log::debug('Feature Desativada: '.$feature);
        return false;
    }

}
