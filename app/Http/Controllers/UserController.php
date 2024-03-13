<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserModel;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

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

        // $user = UserModel::where('username','manager9')->firstOrFail();
        // $user = UserModel::where('level_id',2)->count();
        // dd($user);
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username'=>'manager33',
        //         'nama'=>'Manager Tiga Tiga',
        //         'password'=>Hash::make('12345'),
        //         'level_id'=>2,
        //     ],
        // );
        // $user->save();
        $user = UserModel::create([
            'username'=>'manager11',
            'nama'=>'Manager11',
            'password'=>Hash::make('12345'),
            'level_id'=>2,
        ]);
        $user->username = 'manager12';
        $user->save();

        $user->wasChanged();
        $user->wasChanged('username');
        $user->wasChanged(['username','level_id']);
        $user->wasChanged('nama');
        dd($user->wasChanged(['nama','username']));

        // $user->isClean();
        // $user->isClean('username');
        // $user->isClean('nama');
        // $user->isClean(['nama','username']);

        

        // $user->isDirty();
        // $user->isClean();
        // dd($user->isDirty());

        // return view('user', ['data' => $user]);
    }
}
