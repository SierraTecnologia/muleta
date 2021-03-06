<?php

namespace Muleta\Modules\Eloquents\Displays;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Container\Container as App;
use App\Models\Model;

abstract class RepositoryAbstract implements RepositoryInterface
{

    private $app;

    protected $model;

    /*
        Constructor
    */ 

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract function model();

    /*
    Get all boards associated with the user
    */

    public function all()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        return $this->find($id);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->where('id', '=', $id)->update($data);
    }

    public function delete($board)
    {
        return $this->model->delete($board);
    }

    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if(!$model instanceof Model) {
            // Throw a a repository exception
            return 'error';
        }

        return $this->model = $model;
    }

}
