<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Http\Requests\StoreUserCatalogueRequest;
use App\Http\Requests\UpdateUserCatalogueRequest;

class UserCatalogueController extends Controller
{
    protected $userCatalogueService;
    protected $userCatalogueRepository;

    public function __construct(
        UserCatalogueService $userCatalogueService,
        UserCatalogueRepository $userCatalogueRepository
    ) // biễn $userCatalogueService đại diện cho lớp UserCatalogueService
    {
        $this->userCatalogueService = $userCatalogueService; // gán biễn $userCatalogueService vào thuộc tính $this->userCatalogueService
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    public function index(Request $request)
    {

        $userCatalogues = $this->userCatalogueService->paginate($request);
        return view('Backend.user.catalogue.index', compact('userCatalogues'));
    }
    public function userDeleted(Request $request)
    {

        $users = $this->userCatalogueService->paginate($request, false);
        return view('Backend.user.catalogue.userDeleted', compact('users'));
    }

    public function create()
    {
        $config = 'create';
        return view('Backend.user.catalogue.store', compact('config'));
    }

    public function store(StoreUserCatalogueRequest $request)
    {
        if ($this->userCatalogueService->create($request)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Thêm mới nhóm thành viên thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Thêm mới nhóm thành viên không thành công');
    }

    public function edit($id)
    {
        $config = 'edit';
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        return view('Backend.user.catalogue.store', compact('userCatalogue', 'config'));
    }

    public function update($id, UpdateUserCatalogueRequest $request){
        if ($this->userCatalogueService->update($id,$request)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Cập nhật nhóm thành viên thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Cập nhật nhóm thành viên không thành công');
    }

    public function delete($id){
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        return view('Backend.user.catalogue.delete', compact('userCatalogue'));
    }
    
    public function destroy($id){
        if ($this->userCatalogueService->destroy($id)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Xóa nhóm thành viên thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Xóa nhóm thành viên không thành công');
    }
}
