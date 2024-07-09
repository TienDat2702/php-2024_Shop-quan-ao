<?php

namespace App\Services;

use App\Services\Interfaces\UserserviceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

/**
 * Class Userservice
 * @package App\Services
 */
class Userservice implements UserserviceInterface
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function paginate(){
        $users = $this->userRepository->getAllPaginate(); 
        return $users;
    }
}
