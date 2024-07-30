<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserserviceInterface
 * @package App\Services\Interfaces
 */
interface ProvinceRepositoryInterface
{
    public function all();
    public function findById(int $id);
}
