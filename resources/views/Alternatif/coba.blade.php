@extends('layout.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="fa fa-folder-open">
       Kelola Alternatif
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Data Alternatif</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <small class="box-title">Data Alternatif</small>
           <div class="panel-wrapper">
                    </br><a href="{{route('alternatif.create')}}" class=" btn btn-info">Tambah Data <i class="fa fa-pencil"></i></a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover dt-responsive nowrap">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Pemain</th>
                  <th>Bobot Kriteria</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
               @foreach($sql as $row)
               <tr>
                   <td>{{ $no++ }}</td>
                   <td>{{ $row->nama }}</td>
                   @foreach ($sql as $k)
                   <td>{{ $k->nilai }}</td>    
                   @endforeach
                      
                   <td><a href="{{ route('alternatif.edit',$row->id) }}"> <button type="button" class="btn btn-succes"><i class="fa fa-edit"></i>Edit</button></a>
                   <a><form action="{{route('alternatif.destroy',$row->nama)}}" method="post">
                   @method('DELETE')
                   @csrf
                   <button type="submit" class="btn btn-dager"><i class="fa fa-trash"></i>Hapus</button></form></a></td>
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