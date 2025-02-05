<x-adminlayout>
    <div class="mb-2">
        <h2>Tambah Ulasan Buku</h2>
        <small>Menambahkan data Ulasan buku</small>
    </div>
    
    <a href="{{ route('ulasan.index') }}" class="btn btn-secondary">Kembali</a>
    <div class="row mt-2">
        <div class="col-12 col-md-6">
            <form action="{{ route('ulasan.store') }}" method="POST">
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
                
                <div class="mb-2 form-floating">
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5" />
                        <label for="star5" title="5 stars">&#9733;</label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4" title="4 stars">&#9733;</label>
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3" title="3 stars">&#9733;</label>
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2" title="2 stars">&#9733;</label>
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1" title="1 star">&#9733;</label>
                    </div>
                    @error('ulasan') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    {{-- <input type="text" name="ulasan" class="form-control @error('ulasan') is-invalid @enderror" placeholder="Masukkan ulasan" id="ulasan" value="{{ old('ulasan') }}">  --}}
                    <textarea name="ulasan" id="" cols="30" rows="10" class="form-control  @error('ulasan') is-invalid @enderror"  placeholder="Masukkan ulasan" id="ulasan" >{{ old('ulasan') }}</textarea>
                    <label for="ulasan" class="form-label">Ulasan</label>
                    @error('ulasan') 
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