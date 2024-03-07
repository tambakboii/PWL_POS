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
        
        <tr>
            <td>{{$data->user_id}}</td>
            <td>{{$data->username}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->level_id}}</td>
        </tr>
        
    </table>
</body>
</html>