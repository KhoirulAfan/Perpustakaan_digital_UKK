<x-adminlayout>
    <div class="mb-2">
        <h2>Edit Peminjaman</h2>
        <small>Mengubah data Peminjaman</small>
    </div>
    {{-- {{ $data }} --}}
    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
    <div class="row mt-2">
        <div class="col-12 col-md-6">
            <form action="{{ route('peminjaman.update',$data->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-2 form-floating">                    
                    <select name="user_id" id="user_id" class="form-select">
                        @foreach ($user as $item)
                            <option value="{{ $item->id }}" {{ old('user_id',$data->buku_id) === $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
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
                        
                            <option value="{{ $item->id }}" {{ old('buku_id',$data->buku_id) === $item->id ? 'selected' : '' }}>
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
                <div class="mb-2 form-floating">
                    <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" placeholder="Masukkan tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam',$data->tanggal_pinjam) }}"> 
                    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                    @error('tanggal_pinjam') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    <input type="date" name="tanggal_kembali" class="form-control @error('tanggal_kembali') is-invalid @enderror" placeholder="Masukkan tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali',$data->tanggal_kembali) }}"> 
                    <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                    @error('tanggal_kembali') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">                    
                    <select name="status" id="status" class="form-select">                                                
                            <option value="pinjam" {{ old('status',$data->status) === 'pinjam' ? 'selected' : '' }}></option>
                            <option value="kembali" {{ old('status',$data->status) === 'kembali' ? 'selected' : '' }}></option>
                        @endforeach
                    </select>
                    <label for="status" class="form-label">Status</label>                    
                    @error('status') 
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