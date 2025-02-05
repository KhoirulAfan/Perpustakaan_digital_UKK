@php
    use Illuminate\Support\Str;
    $avgrating = Str::limit($data->ulasan->avg('rating') , 3, '')
@endphp
<x-siswalayout>


    <div class="mb-2">
        <h2>{{ $data->judul }}</h2>
        <small>Menampilkan Detail buku {{ $data->judul }}</small>
    </div>    
    @session('success')
        <script>
            alert("{{ session('success') }}")
        </script>
    @endsession
    @session('error')
        <script>
            alert("{{ session('error') }}")
        </script>
    @endsession
    <a href="{{ route('siswa.daftar.buku') }}" class="btn btn-secondary">Kembali</a>
    <div class="row mt-3">
        <div class="col-12 col-md-8 " >
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('storage/sampul/'.$data->sampul) }}" alt="" class="card-img-top">
                    </div>
                </div>
                <div class="col-8">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-text bg-primary p-3 rounded">{{ $data->judul }}</h2>                            
                            <p class="card-text">Judul : {{ $data->judul }}</p>
                            <p class="card-text">Penulis : {{ $data->penulis }}</p>
                            <p class="card-text">Penerbit : {{ $data->penerbit }}</p>
                            <p class="card-text">Tahun terbit : {{ $data->tahun_terbit }}</p>
                            <p class="card-text">Kategori : {{ $data->kategori->nama }}</p>
                            {{-- <p class="card-text">Dipinjam : {{ $data->peminjaman }}</p> --}}                             
                            
                        </div>
                        <div class="card-body d-flex gap-2">
                            <form action="{{ route('siswa.pinjam.buku.proses',$data->id) }}" method="POST">                                        
                                @csrf                                                                               
                               @if (!Auth::guard('web')->user()->haspeminjaman($data->id))
                                <button class="btn btn-outline-info">Pinjam</button>
                                @else                                        
                                <a href="{{ route('siswa.pinjam.buku') }}" class="btn btn-info">Dipinjam</a>
                                @endif
                            </form>
                            <form action="{{ route('siswa.favorit.toggle',$data->id) }}" method="POST">                                        
                                @csrf                                               
                                @if (Auth::guard('web')->user()->hasfavorit($data->id))
                                    <button class="btn btn-success">Hapus Favorit</button>
                                @else
                                <button class="btn btn-outline-success">Tambah Favorit</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (!Auth::guard('web')->user()->hasulasan($data->id))
        <div class="col-12 mt-4 px-3 py-3 rounded border">
            <form action="{{ route('siswa.ulasan',$data->id) }}" method="post">
                @csrf
                <div class="row p-3">
                    <h3>Tambah Ulasan</h3>
                    <div class="col-12">
                        <div class="mb-2 form-floating">
                            <div class="rating">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label for="star5" title="5 stars bintang">&#9733;</label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4" title="4 stars bintang">&#9733;</label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3" title="3 stars bintang">&#9733;</label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2" title="2 stars bintang">&#9733;</label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1" title="1 star bintang">&#9733;</label>
                            </div>
                            @error('rating') 
                                <div class="text-center text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="mb-2 form-floating">
                            <input type="text" name="ulasan" class="form-control @error('ulasan') is-invalid @enderror" placeholder="Masukkan ulasan" id="ulasan" value="{{ old('ulasan') }}"> 
                            <label for="ulasan" class="form-label">Tambah Ulasan</label>
                            @error('ulasan') 
                                <div class="invalid-feedback">
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary">Kirim</button>

                    </div>
                        
                </div>
            </form>
        </div>            
        @endif
        <div class="col-12 mt-3 px-3 py-3 rounded border">
            <h3>Ulasan</h3>
            <h3>
                <span class="text-warning">
                    &#9733; 
                </span>
                {{ $avgrating ?? 0}}/5</h3>
                <hr>
            @foreach ($data->ulasan as $item)            
                <small>
                    <span class="text-warning">
                        &#9733; 
                    </span>{{ $item->rating }} <span class="opacity-75">{{ $item->user->nama }}</span></small>
                <p>{{ $item->ulasan }}</p>
                <hr>
            @endforeach
        </div>
    </div>
</x-siswalayout>