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
              <h3 class="header-title mb-4">Form Tambah Bobot Kriteria</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('detail.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                  <div class="form-group col-md-6 ">
                    <label>Nama Kriteria</label>
                    <select name="kriteria" id="id_kriteria" class="form-control">
                        <option selected>Pilih Kriteria</option>
                        @foreach($kriterias as $kriteria)
                          <option name="kriteria" value="{{ $kriteria->id }}">{{ $kriteria->nama_kriteria }}</option>
                        @endforeach
                        </select>
                  </div>
                  <div class="form-group col-md-6 ">
                    <label>Bobot</label>
                    <select name="bobot" id="id_bobot" class="form-control">
                      <option selected>Pilih Bobot</option>
                      @foreach($bobots as $bobot)
                        <option name="bobot" value="{{ $bobot->id }}">{{ $bobot->nilai_bobot }} ( {{ $bobot->nama_bobot }})</option>
                      @endforeach
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