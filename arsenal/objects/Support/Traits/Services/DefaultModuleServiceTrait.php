<?php

namespace SiObjects\Support\Traits\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Repositories\WidgetRepository;
use Siravel\Services\Midia\FileService;

trait DefaultModuleServiceTrait
{
    public function defaultFeatures()
    {
        return [
            'blog',
            'menus',
            'files',
            'images',
            'pages',
            'widgets',
            'events',
            'faqs',
        ];
    }

    /**
     * Get a widget.
     *
     * @param string $slug
     *
     * @return widget
     */
    public function widget($slug)
    {
        $widget = WidgetRepository::getWidgetBySLUG($slug);

        if ($widget) {
            if (Gate::allows('cms', Auth::user())) {
                $widget->content .= '<a href="'.url('admin/widgets/'.$widget->id.'/edit').'" style="margin-left: 8px;" class="btn btn-xs btn-default"><span class="fa fa-pencil"></span> Edit</a>';
            }

            if (\Illuminate\Support\Facades\Config::get('app.locale') !== \Illuminate\Support\Facades\Config::get('cms.default-language') && $widget->translation(\Illuminate\Support\Facades\Config::get('app.locale'))) {
                return $widget->translationData(\Illuminate\Support\Facades\Config::get('app.locale'))->content;
            } else {
                return $widget->content;
            }
        }

        return '';
    }

    /**
     * Get image.
     *
     * @param string $tag
     *
     * @return collection
     */
    public function image($id, $class = '')
    {
        $img = '';

        if ($image = app('Stalker\Models\Imagen')->find($id)) {
            $img = FileService::filePreview($image->location);
        }

        return '<img class="'.$class.'" src="'.$img.'">';
    }

    /**
     * Get image link.
     *
     * @param string $tag
     *
     * @return collection
     */
    public function imageLink($id)
    {
        $img = '';

        if ($image = app('Stalker\Models\Imagen')->find($id)) {
            $img = FileService::filePreview($image->location);
        }

        return $img;
    }

    /**
     * Get images.
     *
     * @param string $tag
     *
     * @return collection
     */
    public function images($tag = null)
    {
        $images = [];

        if (is_array($tag)) {
            foreach ($tag as $tagName) {
                $images = array_merge($images, $this->imageRepo->getImagesByTag($tag)->get()->toArray());
            }
        } elseif (is_null($tag)) {
            $images = array_merge($images, $this->imageRepo->getImagesByTag()->get()->toArray());
        } else {
            $images = array_merge($images, $this->imageRepo->getImagesByTag($tag)->get()->toArray());
        }

        return $images;
    }
}
