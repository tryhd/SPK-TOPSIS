@extends('layout.master')
@section('content')
    <section class="content-header">
      <h1>
       Kelola Alternatif
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Alternatif</li>
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
              <h3 class="header-title mb-4">Form Tambah Alternatif</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('alternatif.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                  <div class="form-group col-md-12 ">
                    <label>Nama Alternatif</label>
                    <select name="pemain" id="id_pemian" class="form-control">
                        <option selected>Pilih Pemain</option>
                        @foreach($pemains as $pemain)
                          <option name="pemain" value="{{ $pemain->id }}">{{ $pemain->nama}}</option>
                        @endforeach
                        </select>
                  </div>
                  <div class="form-group col ">
                    @foreach ($kriterias as $k)
                    <label class="form-group col-md-2">{{ $k->nama_kriteria }}
                    <input type="number" min="0" name="{{ str_replace('','',$k->id) }}" class="form-control" value="{{ old('$k->id ') }}" required></label>
                    @endforeach
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