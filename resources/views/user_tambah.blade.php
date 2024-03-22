<body>
    <h1>Form tambah data user</h1>
    <form method="post" action="user/tambah/simpan">

        {{ csrf_field() }}

        <label>Username</label>
        <input type="text" name"username" placeholder="Masukkan username">
        <br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="masukkan nama">
        <br>
        <label>Password</label>
        <input type="password" name="password" placeholder="masukkan password">
        <br>
        <label>level ID</label>
        <input type="number" name="level_id" placeholder="masukkan id level">
        <br>
        <br>
        <input type="submit" class="btn btn-succes" value="Simpan">
    </form>
</body>