@include('template.metafile')
@include('template.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div>
                <h1>Kategori</h1>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Produk</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Kategori</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('categories/store')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <input type="text" name="category_name" placeholder="Nama Kategori" class="form-control" required>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-success">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->category_name}}</td>
                        <td>
                            <button class="btn btn-sm btn-success" title="Edit Data"data-toggle="modal" data-target="#edit{{$item->id}}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" title="Hapus Data"  data-toggle="modal" data-target="#delete{{$item->id}}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal -->
@foreach ($data as $row )
    <div class="modal fade" id="delete{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data <strong>{{$row->category_name}}</strong> dari data kategori?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{url('/categories/delete/'.$row->id)}}" class="btn btn-danger">Hapus</a>
            </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($data as $row)
    <div class="modal fade" id="edit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('categories/update/'.$row->id)}}" method="post">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input type="text" class="form-control" name="category_name" value="{{$row->category_name}}" required>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-success">edit</button>
            </div>
            </form>
            </div>
        </div>
    </div>
@endforeach

@include('template.footer')