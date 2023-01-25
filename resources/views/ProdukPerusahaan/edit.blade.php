<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jenis Komoditas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Produk Perusahaan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/produk-perusahaan/index">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>

    <div class="mx-auto" style="width: 800px">
        <div class="card" style="margin top: 10px">
            <div class="card-header text-white bg-primary">
                Edit Produk Perusahaan
            </div>
            <div class="card-body">
                <form action="/produk-perusahaan/update/{{ $produk_perusahaan->id }}" method="post">
                    <input type="hidden" name="id" id="id">
                    {{ csrf_field() }}
                    @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                            {{ Session::get('message') }}
                        </p>
                    @endif
                    <div class="form-group container">
                        <label for="formGroupExampleInput">Nama Perusahaan</label>
                        <input type="hidden" name="id_perusahaan_hidden"
                            value="{{ $produk_perusahaan->id_perusahaan }}">
                        <select class="form-control" name="id_perusahaan" disabled>
                            @foreach ($perusahaan as $pr)
                                <option value="{{ $pr->id_perusahaan }}"
                                    @if ($produk_perusahaan->id_perusahaan == $pr->id_perusahaan) selected @endif>{{ $pr->nama_perusahaan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group container">
                        <label for="formGroupExampleInput">Nama Produk</label>
                        <input type="hidden" name="id_produk_hidden" value="{{ $produk_perusahaan->id_produk }}">
                        <select class="form-control" name="id_produk">
                            @foreach ($produk as $p)
                                <option value="{{ $p->id_produk }}" @if ($produk_perusahaan->id_produk == $p->id_produk) selected @endif>
                                    {{ $p->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="container">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
