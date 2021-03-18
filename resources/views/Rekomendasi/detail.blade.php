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
        <li><a href="{{ route('rekomendasi.index') }}">Lihat Rekomendasi</a></li>
        <li class="active">Detail Proses Rekomendasi</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title"><b>Kriteria Alternatif</b></h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-hover ">
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">Nama Alternatif</th>
                  <th colspan="{{ $kriteria->count() }}" class="text-center">Kriteria</th>
                </tr>
                <tr>
                  @foreach ($kriteria as $k)
                   <th>{{ $k->nama_kriteria }}</th>   
                  @endforeach
                </tr>
                @php
                    $no=1;
                @endphp
                <div hidden>{{ $index=0 }}</div>
                @foreach ($data as $nama=>$krit)
                <tr>
                <td align="center">{{ $no++ }}</td>
                <td align="left">{{ $nama }}</td>
                @foreach ($namakriteria as $k)
                    <td align="center">{{ $krit[$k] }}</td>
                @endforeach
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div><br>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title"><b>Matriks Normalisasi</b></h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-hover ">
                <tr>
                  <th rowspan="2" align="tab">No</th>
                  <th rowspan="2">Nama Alternatif</th>
                  <th colspan="{{ $kriteria->count() }}" class="text-center">Kriteria</th>
                </tr>
                <tr>
                  @foreach ($kriteria as $k)
                   <th>{{ $k->nama_kriteria }}</th>   
                  @endforeach
                </tr>
                @php
                    $no=1;
                @endphp
                <div hidden>{{ $index=0 }}</div>
                @foreach ($data as $nama=>$krit)
                <div hidden>{{ ++$index }}</div>
                <tr>
                <td align="center">{{ $no++ }}</td>
                <td align="left">{{ $nama }}</td>
                @foreach ($namakriteria as $k)
                    <td align="center">{{ $normalisasi[$k][$index-1] }}</td>
                @endforeach
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div><br>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title"><b>Matriks Normalisasi Terbobot</b></h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-hover ">
                <tr>
                  <th rowspan="2" align="tab">No</th>
                  <th rowspan="2">Nama Alternatif</th>
                  <th colspan="{{ $kriteria->count() }}" class="text-center">Kriteria</th>
                </tr>
                <tr>
                  @foreach ($kriteria as $k)
                   <th>{{ $k->nama_kriteria }}</th>   
                  @endforeach
                </tr>
                @php
                    $no=1;
                @endphp
                <div hidden>{{ $index=0 }}</div>
                @foreach ($data as $nama=>$krit)
                <div hidden>{{ ++$index }}</div>
                <tr>
                <td align="center">{{ $no++ }}</td>
                <td align="left">{{ $nama }}</td>
                @foreach ($namakriteria as $k)
                    <td align="center">{{ $bobotxkriteria[$k][$index-1] }}</td>
                @endforeach
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div><br>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title"><b>Matriks Solusi Ideal</b></h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-hover ">
                <tr>
                  <th rowspan="2">Solusi Ideal</th>
                  <th colspan="{{ $kriteria->count() }}" class="text-center">Kriteria</th>
                </tr>
                <tr>
                  @foreach ($kriteria as $k)
                   <th>{{ $k->nama_kriteria }}</th>   
                  @endforeach
                </tr>
                <tr>
                  <th>Solusi Ideal Positif (A<sup>+</sup>)</th>
                @foreach ($namakriteria as $k)
                    <th>{{ $ypos[$k] }}</th>
                @endforeach
              </tr>
                <tr>
                  <th>Solusi Ideal Negatif (A<sup>-</sup>)</th>
                @foreach ($namakriteria as $k)
                    <th>{{ $yneg[$k] }}</th>
                @endforeach
              </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div><br>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title"><b>Jarak Antara Nilai Alternatif Dengan Solusi Ideal</b></h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped table-bordered table-hover ">
                <tr>
                  <th>No</th>
                  <th>Nama Alternatif</th>
                  <th>Jarak Solusi Ideal Positif (D<sup>+</sup>)</th>
                  <th>Jarak Solusi Ideal Negatif (D<sup>-</sup>)</th>
                </tr>
                @php
                    $no=1;
                @endphp
                <div hidden>{{ $index=0 }}</div>
                @foreach ($data as $nama=>$krit)
                <div hidden>{{ ++$index }}</div>
                <tr>
                  <td>{{ $no++ }}</td>
                  <td align="left">{{ $nama }}</td>
                  <td>{{ $dposnormal[$index-1] }}</td>
                  <td>{{ $dnegnormal[$index-1] }}</td>
                </tr>    
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div><br>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title"><b>Nilai Preferensi</b></h2>
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
                <div hidden>{{ $index=0 }}</div>
                @foreach ($data as $nama=>$krit)
                <div hidden>{{ ++$index }}</div>
                <tr>
                  <td>{{ $no++ }}</td>
                  <td align="left">{{ $nama }}</td>
                  <td>{{ $dposnormal[$index-1] }}</td>
                  <td>{{ $dnegnormal[$index-1] }}</td>
                  <td>{{ $v_akhir[$index-1] }}</td>
                </tr>    
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div><br>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2 class="box-title"><b>Hasil Rekomendasi</b></h2>
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