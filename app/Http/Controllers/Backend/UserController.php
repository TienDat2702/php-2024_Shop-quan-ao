<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    protected $userService;
    protected $provinceReposity;
    protected $userRepository;

    public function __construct(
        UserService $userService,
        ProvinceRepository $provinceReposity,
        UserRepository $userRepository
    ) // biễn $userService đại diện cho lớp UserService
    {
        $this->userService = $userService; // gán biễn $userService vào thuộc tính $this->userService
        $this->provinceReposity = $provinceReposity;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {

        $users = $this->userService->paginate($request);
        return view('Backend.user.index', compact('users'));
    }

    public function create()
    {
        $config = 'create';
        $provinces = $this->provinceReposity->all();
        return view('Backend.user.store', compact('provinces', 'config'));
    }

    public function store(StoreUserRequest $request)
    {
        if ($this->userService->create($request)) {
            return redirect()->route('user.index')->with('success', 'Thêm mới thành viên thành công');
        }
        return redirect()->route('user.index')->with('error', 'Thêm mới thành viên không thành công');
    }

    public function edit($id)
    {
        $config = 'edit';
        $user = $this->userRepository->findById($id);
        $provinces = $this->provinceReposity->all();
        return view('Backend.user.store', compact('provinces', 'user', 'config'));
    }

    public function update($id, UpdateUserRequest $request){
        if ($this->userService->update($id,$request)) {
            return redirect()->route('user.index')->with('success', 'Cập nhật thành viên thành công');
        }
        return redirect()->route('user.index')->with('error', 'Cập nhật thành viên không thành công');
    }

    public function delete($id){
        $user = $this->userRepository->findById($id);
        return view('Backend.user.delete', compact('user'));
    }
    
    public function destroy($id){
        if ($this->userService->destroy($id)) {
            return redirect()->route('user.index')->with('success', 'Xóa thành viên thành công');
        }
        return redirect()->route('user.index')->with('error', 'Xóa thành viên không thành công');
    }
}
