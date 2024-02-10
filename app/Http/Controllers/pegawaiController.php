<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = User::orderBy('created_at','DESC');
        // if (request()->ajax()) {
        //     return DataTables::of($data)
        //     ->addIndexColumn()
        //     ->addColumn('action', function($data){
        //             return view('jenisKegiatan.action')->with('data',$data);
        //         })
        //     ->make(true);
        // };
        return view('pegawai.index');
    }

    public function Datatable()
    {
        $data = User::orderBy('created_at','asc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
            return view('pegawai.action')->with('data',$data);
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request)
    {
        $data = $request->post();
        try { 
            if (array_key_exists('id', $data) && $data['id']) {
                $dataPegawai = User::findOrFail($data['id']);
                $dataPegawai->update($data);
            } else {
                User::create($data);
            } 
            return response()->json([
                'success' => true,
                'status' => 'Success',
                'title' => 'Sukses!',
                'message' => 'Data Berhasil Tersimpan!',
                'code' => 201
            ]);

        } catch (\Throwable $th) {
            // print_r($th); //aktifkan jika ada error
            return response()->json([
                'errors' =>  'ada yang salah',
                'status' =>  'error',
                'title' => 'Gagal!',
                'message' => 'Terjadi Kesalahan di Sistem!',
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return response()->json(['result' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operation = User::find($id);
        if ($operation != null){
            $operation->delete();
            return response()->json([
                'status' => 201,
                'data' => $operation,
                'message' => 'Deleted'
            ]);
        }
    }
}
