@extends('layout.master')
@section('content')
    <section class="content-header">
      <h1>
        Kelola Pemain
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Data Pemain</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="header-title mb-4">Form Edit Pemain</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('pemain.update',$data_pemain->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method("PUT")
                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required value="{{$data_pemain->nama}}">
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label>Tinggi</label>
                    <input type="text" name="tinggi" class="form-control" required value="{{ $data_pemain->tinggi }}">
                  </div><div class="form-group col-md-6">
                    <label>Kebangsaan</label>
                    <input type="text" name="negara" class="form-control" required value="{{ $data_pemain->negara }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Posisi</label>
                    <select class= "form-control" name="posisi" value=" {{$data_pemain->posisi }}">
                      <option selected value="{{ $data_pemain->posisi }}">{{ $data_pemain->posisi }}</option>
                      <option value="Penjaga Gawang">Penjanga Gawang</option>
                      <option value="Bertahan">Pemain Bertahan</option>
                      <option value="Tengah">Pemain Tengah</option>
                      <option value="Penyerang">Penyerang</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label >Tim Bermain</label>
                    <input type="text" name="nama_tim" class="form-control" value="{{$data_pemain->nama_tim}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Foto</label>
                        <input type="file" name="foto" class="form-control" value="{{$data_pemain->nama_file}}">
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