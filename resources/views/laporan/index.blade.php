@include('template.metafile')
@include('template.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$title}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Content Sebelah Kiri -->
          <section class="col-lg-12 connectedSortable"><br>
          <div class="row">
          <div class="col-sm-6 card p-3">
                <h5>Laporan Penjualan Perbulan</h5>
                <hr>
                <form action="{{url('report/month')}}" target="_blank" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Tahun Dan Bulan</label>
                    <input type="month" class="form-control" name="month" id="">
                </div>
                <button class="btn btn-sm btn-primary">Cetak Laporan</button>
                </form>
            </div>
            <div class="col-sm-6 card p-3">
                <h5>Laporan Penjualan Perbulan</h5>
                <hr>
                <form action="{{url('report/date')}}" target="_blank" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Harian</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <button class="btn btn-sm btn-primary">Cetak Laporan</button>
                </form>
            </div>
          </div>
          </section>
          <!-- Content Sebelah Kanan -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('template.footer')