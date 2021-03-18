@extends('layout.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="fa fa-folder-open">
       Kelola Rekomendasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Rekomendasi</a></li>
        <li class="active">Lihat Rekomendasi</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title"><b>Rekomendasi Pemain</b></h2>
              <div class="panel-wrapper">
              <br><a href="{{route('Proses')}}" class=" btn btn-info">Detail Proses <i class="glyphicon glyphicon-eye-open"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-hover ">
                <tr>
                  <th>No</th>
                  <th>Nama Alternatif</th>
                  <th>Jarak Solusi Ideal Positif (D<sup>+</sup>)</th>
                  <th>Jarak Solusi Ideal Negatif (D<sup>-</sup>)</th>
                  <th>Preferensi</th>
                </tr>
                @php
                    $no=1;
                @endphp
                @for ($i = 0; $i < $urut; $i++)
                <tr>
                  <div hidden>{{  $i +1}}</div>
                  <td>{{ $no++ }}</td>
                  <td align="left">{{ $tmp[$i][1] }}</td>
                  <td>{{ $tmp[$i][4] }}</td>
                  <td>{{ $tmp[$i][3] }}</td>
                  <td>{{ $tmp[$i][2] }}</td>
                </tr>    
                @endfor
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div><br>
    </section>
    <!-- /.content -->
@endsection   