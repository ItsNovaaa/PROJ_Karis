<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('barang.index');
    }

    public function Datatable()
    {
        $data = barang::orderBy('created_at','asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('barang.action')->with('data',$data);
        })
        ->make(true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = barang::findOrFail($id);
        return response()->json(['result' => $data]);
    }


    public function storeOrUpdate(Request $request)
    {
        $data = $request->post();
        try { 
            if (array_key_exists('id_barang', $data) && $data['id_barang']) {
                $dataPegawai = barang::findOrFail($data['id_barang']);
                $dataPegawai->update($data);
            } else {
                barang::create($data);
            } 
            return response()->json([
                'success' => true,
                'status' => 'success',
                'title' => 'Sukses!',
                'message' => 'Data Berhasil Tersimpan!',
                'code' => 201
            ]);

        } catch (\Throwable $th) {
            print_r($th);
            return response()->json([
                'errors' =>  'ada yang salah',
                'status' =>  'error',
                'title' => 'Gagal!',
                'message' => 'Terjadi Kesalahan di Sistem!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $operation = barang::findOrFail($id);
        $operation->delete();
        return response()->json([
            'success' => true,
            'status' => 'success',
            'title' => 'Sukses!',
            'message' => 'Data Berhasil dihapus',
            'code' => 201
        ]);
    }
}
