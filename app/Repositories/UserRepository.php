<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;


/**
 * Class Userservice
 * @package App\Services
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function pagination(
        array $column = ['*'],
        array $condition = [],
        array $join = [],
        int $perpage = 20,
        array $relation = [],
    ) {

        $query = $this->model->select($column)->orderBy('id', 'desc')
        ->where(function ($query) use ($condition) {
            if (isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%' . $condition['keyword'] . '%')
                      ->orwhere('email', 'LIKE', '%' . $condition['keyword'] . '%')
                      ->orwhere('phone', 'LIKE', '%' . $condition['keyword'] . '%')
                      ->orwhere('address', 'LIKE', '%' . $condition['keyword'] . '%');
                //SELECT * FROM table_name WHERE name LIKE '%keyword%';
            }
            if (isset($condition['publish']) && $condition['publish'] != 0) {
                $query->where('publish', '=', $condition['publish']);
            }
            if (isset($condition['user_catalogue_id']) && $condition['user_catalogue_id'] != 0) {
                $query->where('user_catalogue_id', '=', $condition['user_catalogue_id']);
            }
        })->with('user_catalogues');
        if (!empty($join)) {
            $query->join(...$join);
        }
        return $query->paginate($perpage);
    }
    
}
