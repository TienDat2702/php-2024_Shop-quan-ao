<?php


namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;

class DashboardController extends Controller
{
    public $userService;
    public function __construct(
        UserService $userService
    ){
        $this->userService = $userService;
    }

    public function changeStatus(Request $request){
        $post = $request->input();
        // dd($post);
        $serviceInterfaceNameSpace = '\App\Services\\' . ucfirst($post['model']) . 'Service';
        if (class_exists($serviceInterfaceNameSpace)) {
            $serviceInstance = app($serviceInterfaceNameSpace);
        }

        $serviceInstance->updateStatus($post);
    }
}
