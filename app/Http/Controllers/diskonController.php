<?php

namespace App\Http\Controllers;

use App\Models\diskon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use function PHPUnit\Framework\throwException;

class diskonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('diskon.index');
    }

    public function Datatable()
    {
        $data = diskon::orderBy('created_at','asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('diskon.action')->with('data',$data);
        })
        ->make(true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = diskon::findOrFail($id);
        return response()->json(['result' => $data]);
    }


    public function storeOrUpdate(Request $request)
    {
        $data = $request->post();
        try { 
            if (array_key_exists('id_diskon', $data) && $data['id_diskon']) {
                $dataPegawai = diskon::findOrFail($data['id_diskon']);
                $dataPegawai->update($data);
            } else {
                diskon::create($data);
            } 
            return response()->json([
                'success' => true,
                'status' => 'Success',
                'title' => 'Sukses!',
                'message' => 'Data Berhasil Tersimpan!',
                'code' => 201
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'errors' =>  true,
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
        $operation = diskon::findOrFail($id);
        $operation->delete();
        return response()->json([
            'success' => true,
            'status' => 'Success',
            'title' => 'Sukses!',
            'message' => 'Data Berhasil dihapus',
            'code' => 201
        ]);
    }
}
