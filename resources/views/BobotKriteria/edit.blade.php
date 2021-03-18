@extends('layout.master')
@section('content')
    <section class="content-header">
      <h1>
       Kelola Bobot Kriteria
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Bobot Kriteria</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          @include('alerts.alert-session')
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="header-title mb-4">Form Edit Bobot Kriteria</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('bobotkriteria.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("PUT")
                  <div class="form-row">
                  <div class="form-group col-md-12 ">
                    <label>Nama Kriteria</label>
                    <input class="form-control" name="nama_kriteria" value="{{ $data->nama_kriteria }}" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Jenis Kriteria</label>
                    <input class="form-control" name="jenis_kriteria" value="{{ $data->jenis_kriteria }}" readonly>
                  </div>
                  <div class="form-group col-md-6 ">
                    <label>Bobot</label>
                    <select name="bobot" id="bobot" class="form-control">
                      <option selected>Pilih Bobot (Bobot Sebelumnya {{ $data->bobot }})</option>
                        <option value="1">1 (Sangat Tidak Penting)</option>
                        <option value="2">2 (Tidak Penting)</option>
                        <option value="3">3 (Penting)</option>
                        <option value="4">4 (Cukup Penting)</option>
                        <option value="5">5 (Sangat Penting)</option>
                      </select>
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <!--<div class="form-group text-right mb-0">-->
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <!--/.col (right) -->
      <!-- /.row -->
    </section>
  @endsection