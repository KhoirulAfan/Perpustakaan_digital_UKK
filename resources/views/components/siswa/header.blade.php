<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
</head>
<body>    
    <nav class="navbar navbar-expand-lg text-bg-primary">
        <div class="container">
          <a class="navbar-brand" href="#">Perpustakaan Digital</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>    
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('siswa.dahsboard') }}">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('siswa.daftar.buku') }}">Daftar Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('siswa.pinjam.buku') }}">Dipinjam</a>
              </li>                            
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('siswa.history.buku') }}">History Pinjam</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('siswa.favorit.show') }}">Favorit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('siswa.profile') }}">Profile</a>
              </li>             
              <li class="nav-item">                
                <form action="{{ route('logout.siswa') }}" method="POST">
                  @csrf
                  <button class="nav-link" onclick="return confirm('anda yakin ingin logout?')" >Logout</button>
                </form>
              </li>              
            </ul>          
          </div>
        </div>
      </nav>
