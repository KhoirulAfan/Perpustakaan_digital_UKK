<x-adminlayout>
    <div class="mb-2">
        <h2>Edit Buku</h2>
        <small>Mengubah data {{ $data->nama }}</small>
    </div>
    {{-- {{ $data }} --}}
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    <div class="row mt-2">
        <div class="col-12 col-md-6">
            <form action="{{ route('kategori.update',$data->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-2 form-floating">
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama" id="nama" value="{{ old('nama',$data->nama) }}"> 
                    <label for="nama" class="form-label">Nama</label>
                    @error('nama') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                {{-- <x-floatingform name="nama">Nama</x-floatingform> --}}
                <button class="btn  btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</x-adminlayout>