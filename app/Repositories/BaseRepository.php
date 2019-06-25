<?php


namespace App\Repositories;

use Illuminate\Container\Container;
use App\Models\BaseModel as Model;

abstract class BaseRepository
{
    /**
     * @var Container
     */
    protected $app;

    /**
     * Default page name
     * @var string
     */
    protected $pageName = 'page';

    /**
     * BaseRepository constructor.
     *
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Specify Model
     *
     * @return mixed
     */
    abstract public function model();

    /**
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = ['*'])
    {
        return $this->makeModel()->get($columns);
    }

    /**
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Model|static|null
     */
    public function first($columns = ['*'])
    {
        return $this->makeModel()->get($columns)->first();
    }

    /**
     * @param int $limit
     * @param array $conditions
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function pagination($limit = 20, $conditions = [])
    {
        if ($columns = array_get($conditions, 'columns')) {
            return $this->makeModel()->paginate($limit, $columns, $this->pageName);
        }

        return $this->makeModel()->paginate($limit, ['*'], $this->pageName);
    }

    /**
     * @param $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public function findById($id, $columns = ['*'])
    {
        return $this->makeModel()->find($id, $columns);
    }

    /**
     * @param $field
     * @param $value
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findByField($field, $value, $columns = ['*'])
    {
        return $this->makeModel()->where($field, $value)->get($columns);
    }

    /**
     * @param $field
     * @param $value
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findByFieldId($field, $value, $columns = ['*'])
    {
        return $this->makeModel()->where($field, $value)->first();
    }

    /**
     * @param $field
     * @param $value
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findByFieldEnable($field, $value, $columns = ['*'])
    {
        return $this->makeModel()->where($field, $value)->where('enable', true)->get($columns);
    }
    /**
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function create($data = [])
    {
        $model = $this->app->make($this->model());
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * @param array $data
     * @param $value
     * @param string $field
     * @return mixed
     */
    public function update(array $data, $value, $field = "sid")
    {
        return $this->makeModel()->where($field, '=', $value)->update($data);
    }

    /**
     * Run the logical delete when using softDelete
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->makeModel()
            ->find($id)
            ->delete();
    }

    /**
     * Run the logical delete when using softDelete
     *
     * @param $id
     *
     * @return mixed
     */
    public function deleteByValue($value, $field = "sid")
    {
        return $this->makeModel()
            ->where($field, $value)
            ->delete();
    }
    /**
     * Run the physical delete when using softDelete
     *
     * @param $id
     *
     * @return mixed
     */
    public function forceDelete($id)
    {
        $deletetodo = $this->makeModel()
            ->find($id);
        if (!is_null($deletetodo)) {
            return  $deletetodo->forceDelete();
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     *
     * @throws \Exception
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $model->newQuery();
    }

    /**
     * Get page name
     *
     * @return string
     */
    public function getPageName()
    {
        return $this->pageName;
    }

    /**
     * @param array $fields
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @throws \Exception
     */
    public function findWhere($fields = [], $columns = ['*'])
    {
        $query = $this->makeModel();
        foreach ($fields as $fieldKey => $fieldValue) {
            $query->where($fieldKey, $fieldValue);
        }

        return $query->get($columns);
    }

    /**
     * Set limit
     *
     * @param int $limit
     * @return $this
     *
     * @throws \Exception
     */
    public function limit($limit = 10)
    {
        return $this->makeModel()->limit($limit);

    }

    /**
     * Set where not null condition
     *
     * @param $field
     * @return \Illuminate\Database\Query\Builder|static
     *
     * @throws \Exception
     */
    public function whereNotNull($field)
    {
        return $this->makeModel()->whereNotNull($field);

    }
}
