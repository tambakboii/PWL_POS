<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }
    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request){
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori
        ]);
        return redirect('/kategori');
    }
    public function edit($id)
    {
        $kategori = KategoriModel::find($id);
        return view('/kategori/edit',['data' => $kategori]);
    }
    public function update($id,Request $request)
    {
        $kategori = KategoriModel::find($id);

        $kategori->kategori_kode = $request->kategori_kode;
        $kategori->kategori_nama = $request->kategori_nama;

        $kategori->save();

        return redirect('/kategori');
    }
    public function delete($id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Models\UserModel;

// use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\DB;

// class UserController extends Controller
// {
//     public function index(){

//         $user = UserModel::all();
//         return view('user', ['data' => $user]);
//         // $data = [
//         //     'level_id'=>2,
//         //     'username'=>'manager_tiga',
//         //     'nama'=>'Manager 3',
//         //     'password'=> Hash::make('12345'),
//         // ];
//         // UserModel::create($data);

//         //$user = UserModel::firstWhere('level_id',1);

//         //RSM
//         // $user = UserModel::findOr(20,['username','nama'],function(){
//         //     abort(404);
//         // });

//         // $user = UserModel::where('username','manager9')->firstOrFail();
//         // $user = UserModel::where('level_id',2)->count();
//         // dd($user);
//         // $user = UserModel::firstOrCreate(
//         //     [
//         //         'username'=>'manager33',
//         //         'nama'=>'Manager Tiga Tiga',
//         //         'password'=>Hash::make('12345'),
//         //         'level_id'=>2,
//         //     ],
//         // );
//         // $user->save();
//         // $user = UserModel::create([
//         //     'username'=>'manager11',
//         //     'nama'=>'Manager11',
//         //     'password'=>Hash::make('12345'),
//         //     'level_id'=>2,
//         // ]);
//         // $user->username = 'manager12';
//         // $user->save();

//         // $user->wasChanged();
//         // $user->wasChanged('username');
//         // $user->wasChanged(['username','level_id']);
//         // $user->wasChanged('nama');
//         // dd($user->wasChanged(['nama','username']));

//         // $user->isClean();
//         // $user->isClean('username');
//         // $user->isClean('nama');
//         // $user->isClean(['nama','username']);

        

//         // $user->isDirty();
//         // $user->isClean();
//         // dd($user->isDirty());

        
//     }
//     public function tambah(){
//         return view('user_tambah');
//     }
//     public function tambah_simpan(Request $request){
//         UserModel::create([
//             'username'=>$request->username,
//             'nama'=>$request->nama,
//             'password'=>Hash::make('$request->password'),
//             'level_id'=>$request->level_id,
//         ]);
//         return redirect('/user');
//     }
//     public function ubah($id){
//         $user = userModel::find($id);
//         return view('user_ubah',['data'=>$user]);
//     }
//     public function ubah_simpan($id, Request $request){
//         $user = UserModel::find($id);

//         $user->username = $request->username;
//         $user->nama=$request->nama;
//         $user->password=Hash::make('$request->password');
//         $user->level_id = $request->level_id;

//         $user->save();
//         return redirect('/user');
//     }
// }
