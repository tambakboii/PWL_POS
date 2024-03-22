<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\kategoriDataTable;
use App\Models\kategoriModel;


class kategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable){
        return $dataTable->render('kategori.index');
    }
    public function create(){
        return view('kategori.create');
    }
    public function store(Request $request){
        kategoriModel::create([
            'kategori_kode'=> $request->kodeKategori,
            'kategori_nama'=> $request->namaKategori,
        ]);
        return redirect('/kategori');
    }
    public function edit($id){
        $kategori = kategoriModel::find($id);
        return view('kategori.edit',['data'=>$kategori]);
    }
    public function update(Request $request, $id){
        $kategori = kategoriModel::find($id);
        $kategori -> kategori_kode = $request->kategori_kode;
        $kategori -> kategori_nama = $request->kategori_nama;

        $kategori ->save();
        return redirect('/kategori');
    }
    public function delete($id){
        $kategori = kategoriModel::find($id);
        $kategori -> delete();
        return redirect('/kategori');
    }
}
// $data = [
        //     'kategori_kode'=>'SNK',
        //     'kategori_nama'=>'Snack/ makanan ringan',
        //     'created_at'=>now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'insert baru berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode','SNK')->update(['kategori_nama'=>'Camilan']);
        // return 'Update data berhasil, jumlah data yang diupdate '.$row.' baris';

        // $row = DB::table('m_kategori')->where('kategori_kode')->delete();
        // return 'delete data berhasil, jumlah data yang dihapus '.$row.' baris';

        // $data = DB::table('m_kategori')->get();
        // return view('kategori',['data'=>$data]);