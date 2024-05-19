<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload(){
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request){
        // dump($request->berkas);
        // return("pemrosesan file upload disini");
        // if($request->hasFile('berkas')){
        //     echo "path: ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ".$request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ".$request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): ".$request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ".$request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "<br>";
        //     echo "getSize(): ".$request->berkas->getSize();
        // }
        // else{
        //     echo "tidak ada berkas yang diupload";
        // }
        // $request->validate([
        //     'berkas'=>'required|file|image|max:500',
        // ]);
        // $path = $request->berkas->storeAs('uploads','berkas');
        // echo "proses upload berhasil, file berada di: $path";
        // echo $request->berkas->getClientOriginalNmae()."lolos Validasi";
        $request->validate([
            'berkas' => 'required|file|image|max:500',
            'image_name' => 'required|string',
        ]);

        $extfile = $request->berkas->getClientOriginalExtension();

        $namaFile = $request->input('image_name') . '.' . $extfile;

        $path = $request->berkas->move('gambar', $namaFile);

        echo "Gambar berhasil diupload ke <a href='$path' target='_blank'>$namaFile</a>";
        echo "<br> <br>";
        echo "Tampilkan gambar: <br> <img src='$path'>";
    }
}
