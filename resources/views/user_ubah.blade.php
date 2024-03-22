<body>
    <div>
        <h1>Form ubah data</h1>
        <a href="/user">kembali</a>
        <br>
        <br>

        <form action="/user/ubah_simpan/{{ $data->user_id }}">
            {{ csrf_field{} }}
            {{ method_field('PUT') }}

            <label>Username</label>
            <input type="text" name"username" placeholder="Masukkan username" value="{{ $data->username }}">
            <br>
            <label>Nama</label>
            <input type="text" name="nama" placeholder="masukkan nama" value="{{ $data->username }}">
            <br>
            <label>Password</label>
            <input type="password" name="password" placeholder="masukkan password" value="{{ $data->password }}">
            <br>
            <label>level ID</label>
            <input type="number" name="level_id" placeholder="masukkan id level" value="{{ $data->level_id }}">
            <br>
            <br>
            <input type="submit" class="btn btn-succes" value="ubah" >
        </form>
    </div>
</body>