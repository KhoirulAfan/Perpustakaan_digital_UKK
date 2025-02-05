<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome || {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
</head>
<body class="h h-body">
    <section class="min-vh-100 d-flex align-items-center justify-content-center text-center container">
        <div>
            <h1 class="h">Selamat Datang Di Website  <span class="h">Perpustakaan Digital </span></h1>        
            <p>Website penyimpanan buku digital
                <br>
                <small>siapakah anda ?</small>    
            </p>               
            <div>
                <a href="{{ route('login.admin') }}" class="btn btn-custom border">Login Sebagai Petugas</a>
                <a href="{{ route('login') }}" class="btn   btn-custom border" >Login Sebagai Peminjam / Siswa</a>
            </div>
        </div>
    </section>
</body>
</html>