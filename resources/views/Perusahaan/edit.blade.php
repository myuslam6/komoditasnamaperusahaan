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
            <a class="navbar-brand" href="#">Edit Perusahaan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/perusahaan/index">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    @foreach ($perusahaan as $pr)
        <div class="mx-auto" style="width: 800px">
            <div class="card" style="margin top: 10px">
                <div class="card-header text-white bg-primary">
                    Edit Perusahaan
                </div>
                <div class="card-body">
                    <form action="/perusahaan/update/{{ $pr->id_perusahaan }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group container">
                            <label for="formGroupExampleInput">Nama Perusahaan</label>
                            <input type="text" class="form-control" required="required" name="nama_perusahaan"
                                value="{{ $pr->nama_perusahaan }}" placeholder="Masukkan Nama Perusahaan">
                        </div>
                        <div class="container">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</body>

</html>
