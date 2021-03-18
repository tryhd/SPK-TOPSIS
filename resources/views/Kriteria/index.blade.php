@extends('layout.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="fa fa-folder-open">
       Kelola Kriteria
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">kriteria</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <small class="box-title">Kriteria Alternatif</small>
            </div>
            <!-- /.box-header -->
            @include('alerts.alert-session')
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover dt-responsive nowrap" >
                <thead>
                <tr>
                  @if (Auth::user()->role=='Admin')
                  <th>No</th>
                  <th>Nama Kriteria</th>
                  <th>Jenis Kriteria</th>
                  @else
                  <th>No</th>
                  <th>Nama Kriteria</th>
                  <th>Jenis Kriteria</th>
                  <th>Aksi</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach($data as $row)
                <tr>
                    @if (Auth::user()->role=='Admin')
                    <td>{{ $no++ }}</td>
                    <td>{{$row->nama_kriteria}}</td>
                    <td>{{$row->jenis_kriteria}}</td>
                    @else
                    <td>{{ $no++ }}</td>
                    <td>{{$row->nama_kriteria}}</td>
                    <td>{{$row->jenis_kriteria}}</td>
                    <td><a href="{{route('kriteria.edit',$row->id)}}"> <button type="button" class="btn btn-succes"><i class="fa fa-edit"></i>Edit</button></a>
                    </td>
                    @endif
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