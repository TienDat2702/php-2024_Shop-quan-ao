<?php


namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(

    ){

    }

    public function changeStatus(Request $request){
        $post = $request->input();
        // dd($post);
        $serviceInterfaceNameSpace = '\App\Services\\' . ucfirst($post['model']) . 'Service'; //ucfirst chuyển đổi chữ đầu tiên trong chữ là chữ hoa
        if (class_exists($serviceInterfaceNameSpace)) {
            $serviceInstance = app($serviceInterfaceNameSpace);
        }

        $flat = $serviceInstance->updateStatus($post);
        return response()->json(['flag' => $flat]);
    }
    public function changeStatusAll(Request $request){
        $post = $request->input();
        $serviceInterfaceNameSpace = '\App\Services\\' . ucfirst($post['model']) . 'Service'; 
        if (class_exists($serviceInterfaceNameSpace)) {
            $serviceInstance = app($serviceInterfaceNameSpace);
        }

        $flat = $serviceInstance->updateStatusAll($post);
        return response()->json(['flag' => $flat]);
    }
}
