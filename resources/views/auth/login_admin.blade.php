<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin || {{ config('app.name') ?? '' }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
</head>
<body>
    <section class="bg-login vh-100 d-grid">
        <div class="card-login m-auto rounded shadow">
            <h3>Form Login Admin</h3>
            <form action="{{ route('login.admin.proses') }}" method="POST">
                @csrf
                <div class="mb-2 form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan Username" id="username" value="{{ old('username') }}"> 
                    <label for="username" class="form-label">Username</label>
                    @error('username') 
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
                <button class="btn  btn-primary">Login</button>
            </form>
        </div>
    </section>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>