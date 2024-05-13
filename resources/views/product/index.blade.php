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
                <h1>Produk</h1>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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
          <div class="col-12">
            <div class="mb-3">
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#add">Tambah data produk <i class="fa fa-plus"></i></button>
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#keranjang">List Keranjang <i class="fa fa-shopping-basket"></i></button>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Produk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga Produk</th>
                    <th>Gambar</th>
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
                        <td>{{$item->category->first()->category_name}}</td>
                        <td>{{$item->product_code}}</td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->stok}}</td>
                        <td>{{"Rp " . number_format($item->price_product,0,',','.')}}</td>
                        <td><img src="{{asset('/storage/produk/'.$item->image)}}" width="100px" alt=""></td>
                        <td>
                            <button class="btn btn-sm btn-success" title="Edit Data"data-toggle="modal" data-target="#edit{{$item->id}}"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" title="Hapus Data"  data-toggle="modal" data-target="#delete{{$item->id}}"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-sm btn-primary" title="Masukan Keranjang"  data-toggle="modal" data-target="#select{{$item->id}}"><i class="fa fa-plus"></i></button>
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

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/produk/store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="">Silahkan Pilih Kategori</option>
                        @foreach ($category as $cat)
                        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Stok Produk</label>
                    <input type="number" class="form-control" name="stok" placeholder="stok Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Harga Produk</label>
                    <input type="number" class="form-control" name="harga" placeholder="Harga Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Gambar Produk</label><br>
                    <input type="file" name="image" placeholder="Gambar Produk" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button class="btn btn-sm btn-success">Tambah</button>
                </form>
            </div>
            </div>
        </div>
    </div>

@foreach ($data as $row )
    <div class="modal fade" id="delete{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data <strong>{{$row->product_name}}</strong> dari data produk?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href="{{url('/product/delete/'.$row->id)}}" class="btn btn-danger">Hapus</a>
            </div>
            </div>
        </div>
    </div>
@endforeach

    <div class="modal fade" id="keranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data keranjang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Dipesan</th>
                        <th>Total Harga</th>
                    </tr>
                    @php
                        $jumlah = 0;
                        $total = 0;
                    @endphp
                    @foreach ($cart as $pesanan )
                    @php
                        $jumlah = $pesanan->qty * $pesanan->product->first()->price_product;
                        $total += $jumlah;
                    @endphp
                    <tr>
                        <td>{{$pesanan->product->first()->product_code}}</td>
                        <td>{{$pesanan->product->first()->product_name}}</td>
                        <td>{{$pesanan->qty}}</td>
                        <td>{{"Rp".number_format($jumlah,0,',','.')}}</td>
                    </tr>
                    @endforeach
                    <tfoot>
                        <tr>
                            <td colspan="2" class="text-center">Total Harga</td>
                            <td colspan="2" class="text-center">{{"Rp".number_format($total,0,',','.')}}</td>
                        </tr>
                    </tfoot>
                </table>
                <form action="{{url('product/payment')}}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="">Uang Yang Diterima</label>
                    <input type="number" name="bayar" class="form-control" placeholder="Masukan jumlah uang yang diterima">
                    <input type="hidden" name="total" value="{{$total}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button class="btn btn-success">Bayar</button>
            </div>
            </form>
            </div>
        </div>
    </div>

@foreach ($data as $row )
    <div class="modal fade" id="select{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukan Produk ke Keranjang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Berapa Jumlah <strong>{{$row->product_name}}</strong> Yang Ingin dimasukan ke keranjang?</p>
                <form action="{{url('/product/select')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Jumlah Produk</label>
                    <input type="number" class="form-control"name="qty"placeholder="Masukan Jumlah Product" required>
                    <input type="hidden"name="id_product" value="{{$row->id}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button class="btn btn-primary">Masukan Keranjang</button>
            </div>
            </form>
            </div>
        </div>
    </div>
@endforeach

@foreach ($data as $item)
    <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('product/update/'.$item->id)}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <select name="id_category" class="form-control" required>
                            <option value="{{$item->category->first()->id}}">{{$item->category->first()->category_name}}</option>
                            @foreach ($category as $cat)
                            @if($cat->id == $item->category->first()->id)
                            @else
                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input type="text" class="form-control" name="product_name" value="{{$item->product_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Stok Produk</label>
                        <input type="number" class="form-control" name="stok" value="{{$item->stok}}" placeholder="stok Produk" required>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Produk</label>
                        <input type="number" class="form-control" name="price_product" value="{{(int)$item->price_product}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar Produk</label><br>
                        <input type="file" name="image" placeholder="Gambar Produk">
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button class="btn btn-success">Edit</button>
            </div>
            </form>
            </div>
        </div>
    </div>
@endforeach

@include('template.footer')