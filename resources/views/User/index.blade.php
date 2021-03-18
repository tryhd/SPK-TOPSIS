@extends('layout.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="fa fa-folder-open">
       Kelola User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">User</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          @include('alerts.alert-session')
          <div class="box">
            <div class="box-header">
              <small class="box-title">Data User</small>
           <div class="panel-wrapper">
                    </br><a href="{{route('user.create')}}" class=" btn btn-info">Tambah Data <i class="fa fa-plus"></i></a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover dt-responsive nowrap">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Telpon</th>
                  <th>Role</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach($data_user as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->phone}}</td>
                    <td>{{$row->role}}</td>
                    <td>@if($row->foto != null)
                        <a href="{{ asset('images/'.$row->foto) }}" alt="user-image" class="img-circle" target="_blank">
                        <img src="{{ asset('images/'.$row->foto) }}" alt="user-image" class="img-circle" width="30">
                        </a>
                        @else 
                        <a href="{{asset('images/avatar.png')}}" alt="user-image" class="img-circle" target="_blank">
                        <img src="{{asset('images/avatar.png')}}" alt="user-image" class="img-circle" width="30">
                        @endif
                        </a></td>
                  <td class="actions">
                    @if ($row->role=='Admin')
                    <a href="{{route('user.edit',$row->id)}}"> <button type="button" class="btn btn-succes"><i class="fa fa-edit"></i>Edit</button></a>
                    @else
                    <a href="{{route('user.edit',$row->id)}}"> <button type="button" class="btn btn-succes"><i class="fa fa-edit"></i>Edit</button></a>
                    <a><form action="{{route('user.destroy',$row->id)}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submitwd" class="btn btn-dager"><i class="fa fa-trash"></i>Hapus</button></form></a>
                    @endif
                   
                  </td>
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