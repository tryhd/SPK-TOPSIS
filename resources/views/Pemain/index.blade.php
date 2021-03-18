@extends('layout.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="fa fa-folder-open">
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <small class="box-title">Data Pemain</small>
           <div class="panel-wrapper">
            @if (Auth::user()->role=='Admin')
            <br><a href="{{route('pemain.create')}}" class=" btn btn-info">Tambah Data <i class="fa fa-pencil"></i></a>
            @endif
            </div>
            </div>
            <!-- /.box-header -->
            @include('alerts.alert-session')
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover dt-responsive nowrap">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama</th>
                  <th>Tinggi</th>
                  <th>Kebangsaan</th>
                  <th>Posisi</th>
                  <th>Tim</th>
                  <th>Foto</th>
                  @if (Auth::user()->role=='Admin')
                  <th>Aksi</th>
                  @endif

                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach($data_pemain as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$row->nama}}</td>
                    <td>{{ $row->tinggi }} cm</td>
                    <td>{{ $row->negara }}</td>
                    <td>{{$row->posisi}}</td>
                    <td>{{$row->nama_tim}}</td>
                    <td>@if($row->foto != null)
                        <a href="{{ asset('images/pemain/'.$row->foto) }}" alt="user image" class="" target="_blank">
                        <img src="{{ asset('images/pemain/'.$row->foto) }}" alt="user image" class="" height="50" width="50">
                        </a>
                        @else
                        <a href="{{asset('images/avatar.png')}}" alt="user-image" class="img-circle" target="_blank">
                        <img src="{{asset('images/avatar.png')}}" alt="user-image" class="img-circle" width="30">
                        @endif
                        </a>
                    </td>
                    @if (Auth::user()->role=='Admin')
                    <td><a href="{{route('pemain.edit',$row->id)}}"> <button type="button" class="btn btn-succes"><i class="fa fa-edit"></i>Edit</button></a>
                      <a><form action="{{route('pemain.destroy',$row->id)}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submitwd" class="btn btn-dager"><i class="fa fa-trash"></i>Hapus</button></form></a></td>
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
