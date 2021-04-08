<?php

namespace Muleta\Modules\Controllers\Api;

use Request;
use Schema;
use Config;

abstract class ApiControllerAbstract
{
    use ApiControllerTrait;

    protected $model;

    public function __construct(Request $request)
    {
        parent::__construct();

        // $url = $request->segment(3) ?? 'page';

        // $this->model = str_singular($url);

        // if (! empty($this->model)) {
        //     $this->model = app('Tramite\Models\\'.$this->getFeature($this->model).'\\'.ucfirst($this->model));
        // }
    }

    /**
     * Find an item in the API
     *
     * @param int $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Collect all items of a resource
     *
     * @return Collection
     */
    public function all()
    {
        $query = $this->model;

        if (Schema::hasColumn(str_plural($this->model), 'is_published')) {
            $query = $query->where('is_published', true);
        }

        if (Schema::hasColumn(str_plural($this->model), 'published_at')) {
            $query = $query->where('published_at', '<=', Carbon::now(config('app.timezone'))->format('Y-m-d H:i:s'));
        }

        if (Schema::hasColumn(str_plural($this->model), 'finished_at')) {
            $query = $query->where('finished_at', '>=', Carbon::now(config('app.timezone'))->format('Y-m-d H:i:s'));
        }

        return $query
            ->orderBy('created_at', 'desc')
            ->paginate(Config::get('cms.pagination', 24));
    }

    /**
     * Search for the API Item
     *
     * @param string $term
     *
     * @return array
     */
    public function search($term)
    {
        $query = $this->model->orderBy('created_at', 'desc');
        $query->where('id', 'LIKE', '%'.$input['term'].'%');

        $columns = Schema::getColumnListing(str_plural($this->model));

        foreach ($columns as $attribute) {
            $query->orWhere($attribute, 'LIKE', '%'.$input['term'].'%');
        }

        return [
            'term' => $input['term'],
            'result' => $query->paginate(Config::get('cms.pagination', 24)),
        ];
    }
}
