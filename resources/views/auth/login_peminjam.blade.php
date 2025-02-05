<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Siswa || {{ config('app.name') ?? '' }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
</head>
<body>
    <section class="bg-login vh-100 d-grid">
        <div class="card-login m-auto rounded shadow">
            <h3>Form Login Siswa</h3>
            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
                <div class="mb-2 form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email" id="email" value="{{ old('email') }}">  
                    <label for="email" class="form-label">email</label>
                    @error('email') 
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
                </div>
                <small>belum punya akun?</small>
                <a href="{{ route('register') }}">Register</a>
                <br>
                <button class="btn  btn-primary mt-2">Login</button>
            </form>
        </div>
    </section>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>