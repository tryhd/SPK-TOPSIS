@extends('layout.master')
@section('content')
 <section class="content-header">
      <h1>
        Dahsboard
        @if(Auth::user()->role=='Admin')
        <small>Selamat Datang Admin</small>
        @else
        <small>Selamat Datang Penanggung Jawab</small>
        @endif
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dahsboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        <div class="box-body">
          <div class="row">
            @if (Auth::User()->role=='Penanggung Jawab')
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{ $total_pemain }}<sup style="font-size: 20px"></sup></h3>
                  <p>Pemain</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{ $kriteriat }}</h3>
                  <p>Kriteria</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{ count($alternatift) }}</h3>
                  <p>Alternatif</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            @else
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{ $total_pemain }}<sup style="font-size: 20px"></sup></h3>
                  <p>Pemain</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{ $kriteriat }}</h3>
                  <p>Kriteria</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{ $user }}</h3>
                  <p>User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            @endif
          </div>
          @if (Auth::User()->role=='Penanggung Jawab')
          <div class="box">
            <div id="chartrekomendasi"></div>
          </div>
          @endif
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      <!-- /.box -->
    </section>
@endsection
@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
{{ $index=0 }}
@foreach ($data as $nama=>$krit)
{{ ++$index }}
Highcharts.chart('chartrekomendasi', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Rekomendasi Pemain'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: {!!json_encode($nama_alt)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Prefernsi'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.4f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Nilai Preferensi',
        data:{!! json_encode($v_akhir) !!}
    }]
});
@endforeach
</script>
@endsection
