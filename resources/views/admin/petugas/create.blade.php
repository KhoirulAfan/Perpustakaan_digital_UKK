<x-adminlayout>
    <div class="mb-2">
        <h2>Tambah Data Petugas</h2>
        <small>Menambahkan data Data Petugas</small>
    </div>
    
    <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Kembali</a>
    <div class="row mt-2">
        <div class="col-12 col-md-6">
            <form action="{{ route('petugas.store') }}" method="POST">
                @csrf
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
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username" id="username" value="{{ old('username') }}"> 
                    <label for="username" class="form-label">Username</label>
                    @error('username') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password" id="password" value="{{ old('password') }}"> 
                    <label for="password" class="form-label">Password</label>
                    @error('password') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    
                    <select name="role" id="role" class="form-select">                       
                        <option value="petugas" {{ old('role') === 'petugas'? 'selected' : '' }}>Petugas</option>                        
                        <option value="admin" {{ old('role') === 'admin'? 'selected' : '' }}>Admin</option>                        
                    </select>
                    <label for="role" class="form-label">Role</label>                 
                    @error('role') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                {{-- <x-floatingform name="nama">Nama</x-floatingform> --}}
                <button class="btn  btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</x-adminlayout>