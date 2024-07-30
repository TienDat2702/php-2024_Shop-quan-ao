<?php

namespace App\Services;

use App\Services\Interfaces\UserserviceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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

    public function paginate($request){
        $condition['keyword'] = addslashes($request->input('keyword'));
        $select = [
            'id',
            'phone',
            'address',
            'name',
            'publish',
        ];
        $perpage = $request->integer('perpage');
        // dd($perpage);
        $users = $this->userRepository->pagination($select, $condition, [], $perpage); 
        return $users;
    }
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send', 're_password']);
            $payload['birthday'] = $this->converBirthdayDate($payload['birthday']);
            $payload['password'] = Hash::make($payload['password']);
            $user = $this->userRepository->create($payload);
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
            $payload['birthday'] = $this->converBirthdayDate($payload['birthday']);
            $user = $this->userRepository->update($id,$payload);
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

            $user = $this->userRepository->delete($id);
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
        $payload = [
            $post['field'] => (($post['value'] == 1) ? 0 : 1), 
        ];

        dd($payload);
    }
}
