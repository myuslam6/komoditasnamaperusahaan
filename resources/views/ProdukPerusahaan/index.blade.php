<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Komoditas Produk Perusahaan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/jenis-komoditas/index">Jenis Komoditas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/komoditas/index">Komoditas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produk/index">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/perusahaan/index">Perusahaan</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/produk-perusahaan/index">Produk Perusahaan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="mx-auto" style="width: 800px">
        <div class="card" style="margin top: 10px">
            <div class="card-header text-white bg-primary">
                Daftar Produk Perusahaan
            </div>
            <div class="card-body">
                <form action="/produk-perusahaan/store" method="post">
                    {{ csrf_field() }}
                    @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}
                        </p>
                    @endif
                    <div class="form-group container">
                        <label for="formGroupExampleInput">Nama Perusahaan</label>
                        <select class="form-control" name="id_perusahaan">
                            <option value="">Pilih Nama Perusahaan</option>
                            @foreach ($perusahaan as $pr)
                                <option value="{{ $pr->id_perusahaan }}">{{ $pr->nama_perusahaan }}</option>
                            @endforeach
                        </select>
                        @foreach ($errors->get('id_perusahaan') as $error)
                            <span class="help-block">{{ $error }}</span>
                        @endforeach
                    </div>
                    <div class="form-group container">
                        <label for="formGroupExampleInput">Nama Produk</label>
                        <select class="form-control" name="id_produk">
                            <option value="">Pilih Nama Produk</option>
                            @foreach ($produk as $p)
                                <option value="{{ $p->id_produk }}">{{ $p->nama_produk }}</option>
                            @endforeach
                        </select>
                        @foreach ($errors->get('id_produk') as $error)
                            <span class="help-block">{{ $error }}</span>
                        @endforeach
                    </div>
                    <div class="container">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="mx-auto" style="width: 800px">
            <div class="card" style="margin top: 10px">
                <div class="card-header text-white bg-primary">
                    Data Produk Perusahaan
                </div>
                <div class="card-body">
                    <table class="table table-bordered data-table">
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Nama Produk</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no = 1;
                        ?>
                        @foreach ($produk_perusahaan as $pp)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $pp->nama_perusahaan }}</td>
                                <td>{{ $pp->nama_produk }}</td>
                                <td>
                                    <form method="POST" action="{{ route('produk_perusahaan.destroy', $pp->id) }}">
                                        <a class="btn btn-primary"
                                            href="/produk-perusahaan/edit/{{ $pp->id }}">Edit</a>
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_Confirm"
                                            data-toggle="tooltip" title='Delete'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            $no++;
                            ?>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_Confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("id");
            event.preventDefault();
            swal({
                    title: `Apakah anda ingin menghapus nama produk perusahaan?`,
                    text: "Jika menghapus nama produk perusahaan akan hilang data.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
</section>

</html>
