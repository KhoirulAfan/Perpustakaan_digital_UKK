<x-adminlayout>
    <div class="mb-2">
        <h2>Tambah Kategori Buku</h2>
        <small>Menambahkan data kategori buku</small>
    </div>
    
    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
    <div class="row mt-2">
        <div class="col-12 col-md-6">
            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf
                <div class="mb-2 form-floating">                    
                    <select name="user_id" id="user_id" class="form-select">
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}" {{ old('user_id') === $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <label for="user_id" class="form-label">Peminjam</label>                   
                    @error('user_id') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    
                    <select name="buku_id" id="buku_id" class="form-select">
                        @foreach ($buku as $item)
                        
                            <option value="{{ $item->id }}" {{ old('buku_id') === $item->id ? 'selected' : '' }}>
                                {{-- <img src="{{ asset('storage/sampul/'.$item->sampul) }}" alt="" width="90px  ">                                 --}}
                                {{ $item->judul.' || '.$item->penulis }} 
                            </option>
                        @endforeach
                    </select>
                    <label for="buku_id" class="form-label">Buku</label>                    
                    @error('buku_id') 
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