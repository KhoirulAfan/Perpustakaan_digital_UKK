<x-adminlayout>
    <div class="mb-2">
        <h2>Tambah Kategori Buku</h2>
        <small>Menambahkan data kategori buku</small>
    </div>
    
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    <div class="row mt-2">
        <div class="col-12 col-md-6">
            <form action="{{ route('kategori.store') }}" method="POST">
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
                {{-- <x-floatingform name="nama">Nama</x-floatingform> --}}
                <button class="btn  btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</x-adminlayout>