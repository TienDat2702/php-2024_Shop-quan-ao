<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserserviceInterface
 * @package App\Services\Interfaces
 */
interface UserRepositoryInterface
{
    public function create();
    public function update(int $id);
    public function findById(int $id);
    public function delete(int $id);
    public function pagination(
        array $column = ['*'],
        array $condition = [],
        array $join = [],
        int $perpage = 20
    );
}
