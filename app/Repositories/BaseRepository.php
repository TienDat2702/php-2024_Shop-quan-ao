<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Userservice
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function pagination(
        array $column = ['*'],
        array $condition = [],
        array $join = [],
        int $perpage = 20,
        array $relations = []
    ) {
        $query = $this->model->select($column)->orderBy('id', 'desc')->where(function ($query) use ($condition) {
            if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%' . $condition['keyword'] . '%');
                //SELECT * FROM table_name WHERE name LIKE '%keyword%';
            }
        });
        
        if (isset($relations) && !empty($relations)) {
            echo 123; die();
            dd($relations);
            foreach ($relations as $relation) {
                $query->withCount($relation);
            }
        }

        if (!empty($join)) {
            $query->join(...$join);
        }
        return $query->paginate($perpage);
    }

    public function create(array $payload = [])
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    public function update(int $id = 0, array $payload = [])
    {
        $model = $this->findById($id);
        return $model->update($payload);
    }

    public function updateByWhereIn(string $whereInField = '', array $whereIn = [], array $payload = []){
        return $this->model->whereIn($whereInField, $whereIn)->update($payload);
    }

    public function delete(int $id = 0)
    {
        return $this->findById($id)->delete();
    }

    public function forceDelete(int $id = 0)
    {
        return $this->findById($id)->forceDelete();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findById(
        int $modelId,
        array $column = ['*'],
        array $relation = []
    ) {
        return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }
}
