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
          @include('alerts.alert-session')
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
                  <th>Tim Bermain</th>
                  <th>Posisi Bermanin</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach($data as $row)
                <tr>
                    <td hidden>{{ $row->id }}</td>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->nama_tim }}</td>
                    <td>{{ $row->posisi }}</td>
                    <td>
                    @if($row->foto != null)
                        <a href="{{ asset('images/pemain/'.$row->foto) }}" alt="user image" class="" target="_blank">
                        <img src="{{ asset('images/pemain/'.$row->foto) }}" alt="user image" class="" width="30">
                        </a>
                        @else 
                        <a href="{{asset('images/avatar.png')}}" alt="user-image" class="img-circle" target="_blank">
                        <img src="{{asset('images/avatar.png')}}" alt="user-image" class="img-circle" width="30">
                        @endif
                        </a></td>
                    {{-- </ul>     --}}
                    <td>
                    <a><form action="{{route('alternatif.destroy',$row->id_pemain)}}" method="post">
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