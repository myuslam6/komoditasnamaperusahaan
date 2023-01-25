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
            <a class="navbar-brand" href="#">Komoditas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/komoditas/index">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    @foreach ($komoditas as $k)
        <div class="mx-auto" style="width: 800px">
            <div class="card" style="margin top: 10px">
                <div class="card-header text-white bg-primary">
                    Edit Komoditas
                </div>
                <div class="card-body">
                    <form action="/komoditas/update/{{ $k->id_komoditas }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group container">
                            <label for="formGroupExampleInput">Jenis Komoditas</label>
                            <select class="form-control" required="required" name="id_jenis"
                                placeholder="Pilih Jenis Komoditas">
                                <option value="">Pilih Jenis Komoditas</option>
                                @foreach ($jenis_komoditas as $jk)
                                    <option value="{{ $jk->id_jenis }}"
                                        @if ($jk->id_jenis == $k->id_jenis) selected @endif>{{ $jk->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group container">
                            <label for="formGroupExampleInput">Nama Komoditas</label>
                            <input type="text" class="form-control" required="required" name="nama_komoditas"
                                value="{{ $k->nama_komoditas }}" placeholder="Masukkan Nama Komoditas">
                            <br>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</body>

</html>
