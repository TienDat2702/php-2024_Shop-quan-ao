<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserserviceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{
    public function all();
    public function findById( int $modelId, 
    array $column = [], 
    array $relation = []);

    public function create(array $payload = []);
    public function update(int $id, array $payload = []);
    public function delete(int $id = 0);

    public function pagination(
        array $column = ['*'],
        array $condition = [],
        array $join = [],
        int $perpage = 10
    );
}
