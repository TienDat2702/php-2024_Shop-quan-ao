<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
class UserController extends Controller
{
    protected $userService;
    protected $provinceReposity;

    public function __construct(
        UserService $userService, 
        ProvinceRepository $provinceReposity) // biễn $userService đại diện cho lớp UserService
    {
        $this->userService = $userService; // gán biễn $userService vào thuộc tính $this->userService
        $this->provinceReposity = $provinceReposity;
    }

    public function index(){

        $users = $this->userService->paginate();
        return view('Backend.user.index', compact('users'));
    }

    public function create(){
        $provinces = $this->provinceReposity->all();
        return view('Backend.user.create', compact('provinces'));
    }
}
