@extends('layout.master')
@section('content')
    <section class="content-header">
      <h1>
        Kelola User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
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
              <h3 class="header-title mb-4">Form Tambah User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('input') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error': '' }}">
                  <label for="name">Nama</label>
                  <input type="text" name="name" placeholder="Masukan nama user" class="form-control" id="name" value="{{ old('name') }}">
                  @if ($errors->has('name'))
                  <span class="help-block">{{ $errors->first('name') }}</span> 
                  @endif
                </div>
                <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error': '' }}">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Masukan email" value="{{ old('email') }}">
                  @if ($errors->has('name'))
                  <span class="help-block">{{ $errors->first('email') }}</span> 
                  @endif
                </div>
                <div class="form-group col-md-6 {{ $errors->has('phone') ? 'has-error': '' }}" >
                  <label for="phone">Telepon</label>
                  <input name="phone" class="form-control" id="phone"  placeholder="Masukan nomor telepon" value="{{ old('phone') }}">
                  @if ($errors->has('phone'))
                  <span class="help-block">{{ $errors->first('phone') }}</span> 
                  @endif
                </div>
                <div class="form-group col-md-6 {{ $errors->has('role') ? 'has-error': '' }}" >
                  <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                    <option selected>Pilih Role User</option>
                    <option name="role" value="Admin">Admin</option>
                    <option name="role" value="Penanggung Jawab">Penanggung Jawab</option>
                  </select>
                </div>
                <div class="form-group col-md-6 {{ $errors->has('password') ? 'has-error': '' }}" >
                  <label for="password">Password</label>
                  <input name="password" type="password" class="form-control" id="password"  placeholder="Password" value="{{ old('password') }}">
                  @if ($errors->has('password'))
                  <span class="help-block">{{ $errors->first('password') }}</span> 
                  @endif
                </div>
                <div class="form-group col-md-6 {{ $errors->has('foto_user') ? 'has-error': '' }}" >
                  <label for="exampleInputFile">Foto User</label>
                  <input type="file"  name="foto" class="form-control" value="{{ old('foto_user') }}">
                  @if ($errors->has('foto'))
                  <span class="help-block">{{ $errors->first('foto') }}</span> 
                  @endif
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