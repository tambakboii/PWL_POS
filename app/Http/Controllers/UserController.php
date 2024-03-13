<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserModel;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        // $data = [
        //     'level_id'=>2,
        //     'username'=>'manager_tiga',
        //     'nama'=>'Manager 3',
        //     'password'=> Hash::make('12345'),
        // ];
        // UserModel::create($data);

        //$user = UserModel::firstWhere('level_id',1);

        //RSM
        // $user = UserModel::findOr(20,['username','nama'],function(){
        //     abort(404);
        // });

        $user = UserModel::where('username','manager9')->firstOrFail();
        return view('user', ['data' => $user]);
    }
}
