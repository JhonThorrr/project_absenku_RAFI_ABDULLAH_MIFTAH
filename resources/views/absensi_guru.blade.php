<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Guru</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table thead th {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #e9ecef;
        }
        .table tbody tr:hover {
            background-color: #d6d6d6;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Absensi Guru</h1>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No Guru</th>
                    <th>Nama Guru</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Mata Pelajaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensi_gurus as $guru)
                <tr>
                    <td>{{ $guru->no_guru }}</td>
                    <td>{{ $guru->nama_guru }}</td>
                    <td>{{ $guru->tanggal }}</td>
                    <td>{{ \Carbon\Carbon::parse($guru->jam_masuk)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($guru->jam_keluar)->format('H:i') }}</td>
                    <td>{{ $guru->mata_pelajaran }}</td>
                    <td>
                        <span class="{{ $guru->status == 1 ? 'text-success' : 'text-danger' }}">
                            {{ $guru->status == 1 ? 'Masuk' : 'Keluar' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
