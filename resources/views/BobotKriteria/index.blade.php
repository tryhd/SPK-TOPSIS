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
            </div>
            <!-- /.box-header -->
            @include('alerts.alert-session')
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover dt-responsive nowrap" >
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kriteria</th>
                  <th>Jenis Kriteria</th>
                  <th>Bobot</th>
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
                    <td>{{$row->nama_kriteria}}</td>
                    <td>{{$row->jenis_kriteria}}</td>
                    <td>@if ($row->bobot >=1)
                        @if ($row->bobot==1)
                            {{ $row->bobot }} (Sangat Tidak Penting)
                        @elseif($row->bobot==2)
                            {{ $row->bobot }} (Tidak Penting)
                        @elseif($row->bobot==3)
                            {{ $row->bobot }} (Penting)
                        @elseif($row->bobot==4)
                            {{ $row->bobot }} (Cukup Penting )
                        @else
                            {{ $row->bobot }} (Sangat Penting)    
                        @endif
                    @else
                        Bobot Belum Ditambahkan
                    @endif
                    </td>
                    @if ($row->bobot==0)
                    <td><a href="{{route('bobotkriteria.edit',$row->id)}}"> 
                        <button type="button" class="btn btn-succes"><i class="fa fa-edit"></i>Tambah Bobot</button></a></td>    
                    @else
                    <td><a href="{{route('bobotkriteria.edit',$row->id)}}"> 
                    <button type="button" class="btn btn-succes"><i class="fa fa-edit"></i>Edit</button></a></td>  
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