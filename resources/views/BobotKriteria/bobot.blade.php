

@extends('layout.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="fa fa-folder-open">
       Kelola Bobot Kriteria
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Bobot Kriteria</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <small class="box-title">Bobot Kriteria</small>
           <div class="panel-wrapper">
                    </br><a href="{{route('detail.create')}}" class=" btn btn-info">Tambah Data <i class="fa fa-plus"></i></a>
                </div>
            </div>
            <!-- /.box-header -->
            @include('alerts.alert-session')
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover dt-responsive nowrap">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kriteria</th>
                  <th>Nilai Bobot</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$row->getKriteria->nama_kriteria}} ({{ $row->getKriteria->jenis_kriteria }})</td>
                    <td>{{$row->getBobot->nama_bobot}} (Nilai {{$row->getBobot->nilai_bobot }})</td>
                    <td><a href="{{route('detail.edit',$row->id)}}"> <button type="button" class="btn btn-succes"><i class="fa fa-edit"></i>Edit</button></a>
                      <a><form action="{{route('detail.destroy',$row->id)}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submitwd" class="btn btn-dager"><i class="fa fa-trash"></i>Hapus</button></form></a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection  