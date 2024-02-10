@extends('master')
@include('barang.conva')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form</h1>
          </div>
        </div>
      </div>
    </div>
    
    <div class="content">
      <div class="card">
        <div class="card-body">
            <table class="table" id="datatable">
                <thead>
                    <div class="d-flex mb-2 justify-content-between">
                        <span class="mt-1 fs-4"><b>Data Barang</span>
                        <a class="btn btn-primary conva" >
                          Tambah Barang
                        </a>                 
                    </div>
                    <tr style="width: 100px">
                        {{-- <th style="width: 100px">No</th> --}}
                        <th style="width: 100px">Nama</th>
                        <th style="width: 100px">Deskripsi Position</th>
                        {{-- <th style="width: 100px">Kode position</th>
                        {{-- <th style="width: 100px">Status</th> --}}
                        <th style="width: 100px">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
  </div>
@endsection
@include('barang.script')