<?php

namespace App\Services;

use App\Services\Interfaces\UserCatalogueServiceInterface;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
/**
 * Class UserCatalogueService
 * @package App\Services
 */
class UserCatalogueService implements UserCatalogueServiceInterface
{
    protected $userCatalogueRepository;
    protected $userRepository;

    public function __construct(
        UserCatalogueRepository $userCatalogueRepository,
        UserRepository $userRepository

    )
    {
        $this->userCatalogueRepository = $userCatalogueRepository;
        $this->userRepository = $userRepository;
    }

    public function paginate($request){
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->input('publish');
        $select = [
            'id',
            'name',
            'description',
            'publish',
        ];
        $relations = ['users'];
        $perpage = $request->integer('perpage');
        $userCatalogues = $this->userCatalogueRepository->pagination(
            $select, $condition, [], $perpage, $relations
        );
        // dd($userCatalogues);
        return $userCatalogues;
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            $user = $this->userCatalogueRepository->create($payload);
            DB::commit(); // nếu đúng insert vào database
            return true;
        } catch (\Exception $e) {
            DB::rollBack(); // nếu insert không thành công thì rollback lại csdl
            echo $e->getMessage();
            die();
            return false;
        }
    }
    public function update($id,$request)
    {
        DB::beginTransaction();
        try {
            
            $payload = $request->except(['_token', 'send']);
            $user = $this->userCatalogueRepository->update($id,$payload);
            DB::commit(); // nếu đúng insert vào database
            return true;
        } catch (\Exception $e) {
            DB::rollBack(); // nếu insert không thành công thì rollback lại csdl
            echo $e->getMessage();
            die();
            return false;
        }
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {

            $user = $this->userCatalogueRepository->delete($id);
            DB::commit(); // nếu đúng insert vào database
            return true;
        } catch (\Exception $e) {
            DB::rollBack(); // nếu insert không thành công thì rollback lại csdl
            echo $e->getMessage();
            die();
            return false;
        }
    }
    public function converBirthdayDate($birthday = ''){
        $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);
        $birthday = $carbonDate->format('Y-m-d H:i:s');
        return $birthday;
    }


    public function updateStatus($post = []) {
        

        DB::beginTransaction();
        try { 

            $payload[$post['field']] = (($post['value'] == 1) ? 2 : 1);

            $user = $this->userCatalogueRepository->update($post['modelId'],$payload);

            $this->changeUserStatus($post, $payload[$post['field']]);
            DB::commit(); // nếu đúng insert vào database
            return true;
        } catch (\Exception $e) {
            DB::rollBack(); // nếu insert không thành công thì rollback lại csdl
            echo $e->getMessage();
            die();
            return false;
        }
    }
    public function updateStatusAll($post) {

        DB::beginTransaction();
        try { 

            $payload[$post['field']] = $post['value'];

            $this->userCatalogueRepository->updateByWhereIn($post['modelId'],$payload);
            
            DB::commit(); // nếu đúng insert vào database
            return true;
        } catch (\Exception $e) {
            DB::rollBack(); // nếu insert không thành công thì rollback lại csdl
            echo $e->getMessage();
            die();
            return false;
        }
    }

    public function changeUserStatus($post, $value){
        DB::beginTransaction();
        try {
            $array = [];
            if (isset($post['modelId'])) {
                $array[] = $post['modelId'];
            }
            $payload[$post['field']] = $value;
            $this->userRepository->updateByWhereIn('user_catalogue_id', $array, $payload);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
