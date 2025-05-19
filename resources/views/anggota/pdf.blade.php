<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>
    <style>
        body {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Daftar Anggota</h2>
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>No Telpon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $a)
                <tr>
                    <td>{{ $a->user_name }}</td>
                    <td>{{ $a->email }}</td>
                    <td>{{ $a->nama_lengkap }}</td>
                    <td>{{ $a->alamat }}</td>
                    <td>{{ $a->no_telpon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
