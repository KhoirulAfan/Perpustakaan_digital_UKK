<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Siswa || {{ config('app.name') ?? '' }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
</head>
<body>
    <section class="bg-login vh-100 d-grid">
        <div class="card-login m-auto rounded shadow">
            <h3>Form Register </h3>
            <form action="{{ route('register.proses') }}" method="POST">
                @csrf
                <div class="mb-2 form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email" id="email" value="{{ old('email') }}">  
                    <label for="email" class="form-label">Email</label>
                    @error('email') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama" id="nama" value="{{ old('nama') }}">  
                    <label for="nama" class="form-label">Nama</label>
                    @error('nama') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password" id="password"> 
                    <label for="password" class="form-label">Password</label>
                    @error('password') 
                    <div class="invalid-feedback">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                <div class="my-2 form-floating">
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat" id="alamat"> 
                    <label for="alamat" class="form-label">alamat</label>
                    @error('alamat') 
                    <div class="invalid-feedback">
                        <p>{{ $message }}</p>
                    </div>
                @enderror
                </div>
                <small>sudah punya akun?</small>
                <a href="{{ route('login') }}">login</a>
                <br>
                <button class="btn  btn-primary mt-2">Register</button>
            </form>
        </div>
    </section>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>