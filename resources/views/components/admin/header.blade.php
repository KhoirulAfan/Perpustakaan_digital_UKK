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
    {{-- bg-body-tertiary --}}
    <nav class="navbar navbar-expand-lg text-bg-primary ">
        <div class="container">          
          <a class="navbar-brand" href="#"> <span class="text-capitalize">{{ Auth::guard('admins')->user()->role }} </span> Perpustakaan Digital</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>    
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('buku.index') }}">Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('kategori.index') }}">Kategori</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('petugas.index') }}">Petugas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('xixixi') }}">Peminjam</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('peminjaman.index') }}">Peminjaman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('ulasan.index') }}">Ulasan</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('ulasan.index') }}">Logout</a>
              </li> --}}
              <li class="nav-item">
                {{-- <a class="nav-link active" aria-current="page" href="{{ route('') }}">Logout</a> --}}
                <form action="{{ route('logout.admin') }}" method="POST">
                  @csrf
                  <button class="nav-link active" onclick="return confirm('anda yakin ingin logout?')">Logout</button>
                </form>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li> --}}
            </ul>           
          </div>
        </div>
      </nav>
