<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>data level pengguna</title>
</head>
<body>
    <h1>
        data level pengguna
    </h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>kode level</th>
            <th>nama level</th>

        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{$d->level_id}}</td>
            <td>{{$d->level_kode}}</td>
            <td>{{$d->level_nama}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>