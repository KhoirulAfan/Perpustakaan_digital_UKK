<x-adminlayout>
    <div class="mb-2">
        <h2>Tambah Buku</h2>
        <small>Menambahkan data buku</small>
    </div>
    
    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
    <div class="row mt-2">
        <div class="col-12 col-md-6">
            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2 form-floating">
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan judul" id="judul" value="{{ old('judul') }}"> 
                    <label for="judul" class="form-label">Judul</label>
                    @error('judul') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" placeholder="Masukkan penulis" id="penulis" value="{{ old('penulis') }}"> 
                    <label for="penulis" class="form-label">Penulis</label>
                    @error('penulis') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    <input type="text" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" placeholder="Masukkan penerbit" id="penerbit" value="{{ old('penerbit') }}"> 
                    <label for="penerbit" class="form-label">Penerbit</label>
                    @error('penerbit') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    <input type="date" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" placeholder="Masukkan tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit') }}"> 
                    <label for="tahun_terbit" class="form-label">Tahun terbit</label>
                    @error('tahun_terbit') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                {{-- kategori --}}
                <div class="mb-2 form-floating">
                    
                    <select name="kategori_id" id="kategori_id" class="form-select">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" {{ old('kategori_id') === $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <label for="kategori_id" class="form-label">Kategori</label>
                    {{-- <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama" id="nama" value="{{ old('nama') }}">  --}}
                    @error('kategori_id') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                {{-- sampul --}}
                <div class="mb-2 form-floating">
                    <input type="file" name="sampul" class="form-control @error('sampul') is-invalid @enderror" placeholder="Masukkan sampul" id="sampul" value="{{ old('sampul') }}"> 
                    <label for="sampul" class="form-label">Sampul</label>
                    @error('sampul') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                {{-- file --}}
                <div class="mb-2 form-floating">
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" placeholder="Masukkan file" id="file" value="{{ old('file') }}"> 
                    <label for="file" class="form-label">File</label>
                    @error('file') 
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