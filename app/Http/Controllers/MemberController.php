<?php

namespace App\Http\Controllers;

use App\Models\member;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.index');
    }

    public function Datatable()
    {
        $data = member::orderBy('created_at','asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('member.action')->with('data',$data);
        })
        ->make(true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = member::findOrFail($id);
        return response()->json(['result' => $data]);
    }


    public function storeOrUpdate(Request $request)
    {
        $data = $request->post();
        try { 
            if (array_key_exists('id_member', $data) && $data['id_member']) {
                $dataPegawai = member::findOrFail($data['id_member']);
                $dataPegawai->update($data);
            } else {
                member::create($data);
            } 
            return response()->json([
                'success' => true,
                'status' => 'success',
                'title' => 'Sukses!',
                'message' => 'Data Berhasil Tersimpan!',
                'code' => 201
            ]);

        } catch (\Throwable $th) {
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
        $operation = member::findOrFail($id);
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
