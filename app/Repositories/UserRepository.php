<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

/**
 * Class Userservice
 * @package App\Services
 */
class UserRepository implements UserRepositoryInterface
{

    public function getAllPaginate(){
        return User::paginate(20);
    }
}
