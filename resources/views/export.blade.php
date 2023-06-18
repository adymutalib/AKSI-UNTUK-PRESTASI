<!DOCTYPE html>
<html>
<head>
    <title>Export PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }


        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Data Siswa</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Kelas</th>
                <th>Jabatan</th>
                <th>Ekstrakurikuler</th>
                <!-- Tambahkan kolom sesuai dengan struktur tabel Anda -->
            </tr>
        </thead>
        <tbody>
            @php
            $n= 1;
        @endphp
            @foreach ($data as $user)
                <tr>
                    <th scope="row">{{ $n }}</th>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->nis }}</td>
                        <td>{{ $user->kelas }}</td>
                        <td>{{ $user->jabatan }}</td>
                        <td>{{ $user->ekstra['nama_ekstra']}}</td>
                </tr>
                @php
                $n++;
                @endphp
            @endforeach
        </tbody>
    </table>
</body>
</html>
