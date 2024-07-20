<?php

namespace App\Http\Controllers;

use App\Models\Deno;
use App\Models\Route;
use App\Models\Shift;
use App\Models\User;
use App\Models\UserRoute;
use App\Models\UserSubRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function editRoutes(Request $request){

       $add =  $request->get('add');
       $user_id =  $request->get('user_id');
       $route_id =  $request->get('route_id');
       $userRoute =   UserRoute::where('user_id',$user_id)->where('route_id',$route_id);
       if (!$add){
           $userRoute->delete();

       }else{
           UserRoute::create(['user_id'=>$user_id,'route_id'=>$route_id]);

       }
       return ['status'=>true];
    }
    public function editSubRoutesRoutes(Request $request){

        $add =  $request->get('add');
        $user_id =  $request->get('user_id');
        $route_id =  $request->get('sub_route_id');
        $userRoute =   UserSubRoute::where('user_id',$user_id)->where('sub_route_id',$route_id);
        if (!$add){
            $userRoute->delete();

        }else{
            UserSubRoute::create(['user_id'=>$user_id,'sub_route_id'=>$route_id]);

        }
        return ['status'=>true];
    }
    public function routes(){
        return Route::all();
    }
    public function updateDenoUser(Request $request)
    {
        $data = $request->all();
        $max_shift_id = Shift::max('id');
        /** @var User $user */
        $user =  auth()->user();
//        $user->denos()->updateExistingPivot($data['deno_id'], ['amount' => $data['val']]);
         $pdo=        DB::connection()->getPdo();
         $pdo->prepare('update denos_users set amount = amount + ? where shift_id = ? and deno_id = ?')->execute([$data['val'],  $max_shift_id,$data['deno_id']]);
         return ['status'=>true,'data'=>$user->user_denos_by_shift];

    }
    public function all()
    {
        return User::with('roles')->get();
    }
    public function editRole( Request $request ,User $user)
    {
        if ($request->get('add') && $request->get('add')) {
            $user->assignRole(Role::findById($request->get('role_id')));
            return ['status' => true, 'msg' => 'role added successfully'];
        }else{
            $user->removeRole(Role::findById($request->get('role_id')));
            return ['status' => true, 'msg' => 'role removed successfully'];

        }
    }
    public function populateDenos(Request $request)
    {
        $max_shift_id = Shift::max('id');
        /** @var User $user */
       $user =  auth()->user();
        $denos =  Deno::all();
        $pdo = DB::connection()->getPdo();
        $rows =  $pdo->query("select * from denos_users where shift_id = $max_shift_id and user_id = $user->id")->rowCount();
        if ($rows == 0) {
            foreach ($denos as $deno) {
                $user->denos()->attach($deno->id,['shift_id' => $max_shift_id]);

            }
        }

    }
    public function denosByLastShift(Request $request)
    {
        /** @var User $user */
        $user =  auth()->user();
        return ['status'=> true, 'data'=> $user->user_denos_by_shift];
    }
}
