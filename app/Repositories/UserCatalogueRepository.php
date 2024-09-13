<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserCatalogueRepositoryInterface;
use App\Models\UserCatalogue;


/**
 * Class Userservice
 * @package App\Services
 */
class UserCatalogueRepository extends BaseRepository implements UserCatalogueRepositoryInterface
{

    protected $model;

    public function __construct(UserCatalogue $model)
    {
        $this->model = $model;
    }

    // public function pagination(
    //     array $column = ['*'],
    //     array $condition = [],
    //     array $join = [],
    //     int $perpage = 20,
    //     array $relations = []
    // ) {

    //     $query = $this->model->select($column)->orderBy('id', 'desc')
    //     ->where(function ($query) use ($condition) {
    //         if (isset($condition['keyword']) && !empty($condition['keyword'])) {
    //             $query->where('name', 'LIKE', '%' . $condition['keyword'] . '%');
    //             //SELECT * FROM table_name WHERE name LIKE '%keyword%';
    //         }
    //         if (isset($condition['publish']) && $condition['publish'] != -1) {
    //             $query->where('publish', '=', $condition['publish']);
    //         }
    //     });
    //     if (isset($relations) && !empty($relations)) {
    //         foreach ($relations as $relation) {
    //             $query->withCount($relation);
    //         }
    //     }
    //     if (!empty($join)) {
    //         $query->join(...$join);
    //     }
    //     return $query->paginate($perpage);
    // }
    
}
