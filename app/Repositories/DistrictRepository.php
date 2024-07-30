<?php

namespace App\Repositories;

use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Models\District;

/**
 * Class Userservice
 * @package App\Services
 */
class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{

    protected $model;

    public function __construct(District $model)
    {
        $this->model = $model;
    }

}
