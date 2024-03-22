<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data user</title>
</head>
<body>
    <h1>Data user</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>nama</th>
            <th>ID level pengguna</th>
        </tr>
        @foreach ($data as $d)
            
        <tr>
            <td>{{$d->user_id}}</td>
            <td>{{$d->username}}</td>
            <td>{{$d->nama}}</td>
            <td>{{$d->level_id}}</td>
            <td><a href="/user/ubah/{{ $d->user_id }}">Ubah</a>|<a href="/user/hapus/{{ $d->user_id }}">hapus</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>