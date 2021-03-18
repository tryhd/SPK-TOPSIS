@extends('layout.master')
@section('content')
    <section class="content-header">
      <h1>
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
        <!-- left column -->
        <div class="col-md-12">
          @include('alerts.alert-session')
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="header-title mb-4">Form Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('user.update',$data_user->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method("PUT")
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Nama</label>
                  <input type="text" name="name" parsley-trigger="change" required value="{{$data_user->name}}" class="form-control" id="name">
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" id="email" parsley-trigger="change" required value="{{$data_user->email}}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="phone">Telepon</label>
                  <input name="phone" class="form-control" id="phone" parsley-tigger="change" required value="{{$data_user->phone}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="role">Role</label>
                  <select name="role" id="role" class="form-control" value="{{$data_user->role}}">
                    <option selected value="{{ $data_user->role }}">{{ $data_user->role }}</option>
                    <option name="role" value="Admin">Admin</option>
                    <option name="role" value="Penanggung Jawab">Penanggung Jawab</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" parsley-trigger="change" required value="{{$data_user->password}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputFile">Foto User</label>
                  <input type="file"  name="foto" class="form-control" value="{{$data_user->foto}}">
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