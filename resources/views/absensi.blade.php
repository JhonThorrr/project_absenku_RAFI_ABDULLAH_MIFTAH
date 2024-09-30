<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi</title>
    <!-- Memasukkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Absensi</h1>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No Siswa</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensi as $data)
                    <tr>
                        <td>{{ $data->no_siswa }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->kelas }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>
                            @if($data->jam_masuk)
                                <span class="badge bg-success">{{ $data->jam_masuk }}</span>
                            @else
                                <span class="badge bg-danger">Belum Masuk</span>
                            @endif
                        </td>
                        <td>
                            @if($data->jam_keluar)
                                <span class="badge bg-warning text-dark">{{ $data->jam_keluar }}</span>
                            @else
                                <span class="badge bg-danger">Belum Keluar</span>
                            @endif
                        </td>
                        <td>
                            @if($data->status == 'masuk')
                                <span class="badge bg-success">Masuk</span>
                            @else
                                <span class="badge bg-danger">Keluar</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Memasukkan Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

</html>
