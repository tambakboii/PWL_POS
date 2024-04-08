<?php


namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller{
    public function index(){
        $breadcrumb=(object)[
            'title'=>'Daftar User',
            'list'=>['Home','User']
        ];
        $page = (object)[
            'title'=>'daftar user yang terdaftar dalam sistem'
        ];
        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.index',['breadcrumb'=> $breadcrumb,'page' => $page,'activeMenu'=> $activeMenu]);
    }
    public function list(Request $request){
        $user = UserModel('user_id','username','nama','level_id')
        ->with('level');

        // filter data berdasarkan 
        if($request->level_id){
            $users->where('level_id',$request->level_id);
        }

        return DataTables::of($users)
        ->AddIndextColumn()
        ->addColumn() // menambahkan kolom index / no urut(default nama kolom: DT_RowIndex)
        ->addColumn('aksi',function ($user) {
            $btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a>';
            $btn .= '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-warning btn-sm">Edit</a>';
            $btn .='<form class="d-inline-block" method="POST" action="'.url('/user/'.$user->user_id).'">'
            . scrf_field(). method_field('DELETE') .
            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah ada yakin mengkapus data ini?\');">Hapus</button></form';
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }
    public function create(){
        $breadcrumb = (object)[
            'title'=> 'Tambah User',
            'list'=>['Home','user','Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah User Baru'
        ];
        $level = LevelModel::all(); //ambil data level untuk ditampilkan pada form
        $activeMenu = 'user'; //set menu yang sedang aktif

        return view('user.create',['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu'=>$activeMenu]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|string|min:5',
            'level_id' => 'required|integer'
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);

        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        $page = (object)[
            'title' => "Detail User"
        ];

        $activeMenu = 'user';

        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user,
            'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = m_levelModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object)[
            'title' => "Edit User"
        ];

        $activeMenu = 'user';

        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user,
            'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:User,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|string|min:5',
            'level_id' => 'required|integer'
        ]);

        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id,
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditermukan');
        }

        try {
            UserModel::destroy($id);

            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('/user')->with('error', 'Data user gagal dihapus, karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}


// use Illuminate\Http\Request;
// use App\DataTables\KategoriDataTable;
// use App\Models\KategoriModel;

// class KategoriController extends Controller
// {
//     public function index(KategoriDataTable $dataTable)
//     {
//         return $dataTable->render('kategori.index');
//     }
//     public function create(){
//         return view('kategori.create');
//     }

//     public function store(Request $request){
//         KategoriModel::create([
//             'kategori_kode' => $request->kodeKategori,
//             'kategori_nama' => $request->namaKategori
//         ]);
//         return redirect('/kategori');
//     }
//     public function edit($id)
//     {
//         $kategori = KategoriModel::find($id);
//         return view('/kategori/edit',['data' => $kategori]);
//     }
//     public function update($id,Request $request)
//     {
//         $kategori = KategoriModel::find($id);

//         $kategori->kategori_kode = $request->kategori_kode;
//         $kategori->kategori_nama = $request->kategori_nama;

//         $kategori->save();

//         return redirect('/kategori');
//     }
//     public function delete($id)
//     {
//         $kategori = KategoriModel::find($id);
//         $kategori->delete();

//         return redirect('/kategori');
//     }
// }
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
