@extends('master')
@section('css')
<link rel="stylesheet" href="{{asset('')}}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('')}}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<style>
.link{
  color:blue;
  cursor:pointer;
}
.link:hover{
  text-decoration: underline;
}
.hidden{
  display: none;
}
.dataTables_length{
  padding-left: 10px;
  padding-top: 15px;
}
.dataTables_filter{
  padding-right: 10px;
  padding-top: 15px;
}
.dataTables_info{
  padding-left: 10px;
  padding-bottom: 15px;
}
.dataTables_paginate{
  padding-right: 10px;
  padding-bottom: 15px;
}
</style>
@stop

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">On Progress Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
{{-- <script src="{{asset('')}}plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('')}}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('')}}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('')}}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> --}}

@stop