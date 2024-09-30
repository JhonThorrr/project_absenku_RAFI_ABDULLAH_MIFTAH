<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Rekap Absensi Bulanan</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Rekap Absensi Bulan {{ \Carbon\Carbon::parse($bulan)->format('F Y') }}</h1>

        <!-- Form untuk memilih bulan -->
        <form action="{{ route('rekap.bulanan') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="month" class="form-label">Pilih Bulan</label>
                    <input type="date" id="month" name="bulan" class="form-control" value="{{ $bulan }}">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
            </div>
        </form>

        <!-- Tabel absensi -->
        <table class="table table-bordered">
            <thead>
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
                @if($absensi->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data absensi untuk bulan ini.</td>
                    </tr>
                @else
                    @foreach($absensi as $data)
                        <tr>
                            <td>{{ $data->no_siswa }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->kelas }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $data->jam_masuk }}</td>
                            <td>{{ $data->jam_keluar }}</td>
                            <td>
                                @if($data->status == 'masuk')
                                    <span class="badge bg-success">Masuk</span>
                                @else
                                    <span class="badge bg-danger">Keluar</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
