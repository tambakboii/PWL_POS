<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiPenjualanModel;
use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
{
    public function index()
    {
        return TransaksiPenjualanModel::all();
    }

    public function store(Request $request)
    {
        $penjualan = TransaksiPenjualanModel::create($request->all());
        return response()->json($penjualan, 201);
    }

    public function show(TransaksiPenjualanModel $penjualan)
    {
        return TransaksiPenjualanModel::find($penjualan);
    }

    public function update(Request $request, TransaksiPenjualanModel $penjualan)
    {
        $penjualan->update($request->all());
        return TransaksiPenjualanModel::find($penjualan);
    }

    public function destroy(TransaksiPenjualanModel $penjualan)
    {
        $penjualan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}