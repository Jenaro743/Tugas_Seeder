<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Data Mahasiswa</title>
</head>

<body>
    <h1 class="text-center">Data Mahasiswa</h1>
    <div class="container-fluid d-flex flex-column-reverse align-items-center mt-4">

        <table border="1" class="table table-striped">
            <thead class="table-info">
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Mata Kuliah</th>
                </tr>
            </thead>
            <tbody class="table-warning">
                @foreach ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->npm }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>
                            <ul>
                                @foreach ($mhs->krs as $krs)
                                    <li>{{ $krs->mataKuliah->nama_matakuliah ?? 'Mata Kuliah Tidak Ditemukan' }}
                                    </li>
                                @endforeach
                            </ul>
                    </tr>
                @endforeach
            </tbody>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
