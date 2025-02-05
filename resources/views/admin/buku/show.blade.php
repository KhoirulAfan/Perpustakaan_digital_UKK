@php
    use Illuminate\Support\Str;
    $avgrating = Str::limit($data->ulasan->avg('rating') , 3, '')
@endphp
<x-adminlayout>
    <div class="mb-2">
        <h2>{{ $data->judul }}</h2>
        <small>Menampilkan Detail buku {{ $data->judul }}</small>
    </div>    
    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
    <div class="row mt-3">
        <div class="col-12" >
            <div class="row">
                <div class="col-12 my-1 col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/sampul/'.$data->sampul) }}" alt="" class="card-img-top">
                    </div>
                </div>
                <div class="col-12 my-1 col-md-8">
                    <div class="card h-100">
                        <div class="card-body h-100">
                            <h2 class="card-text">{{ $data->judul }}</h2>                            
                            <p class="card-text">Judul : {{ $data->judul }}</p>
                            <p class="card-text">Penulis : {{ $data->penulis }}</p>
                            <p class="card-text">Penerbit : {{ $data->penerbit }}</p>
                            <p class="card-text">Tahun terbit : {{ $data->tahun_terbit }}</p>
                            <p class="card-text">Kategori : {{ $data->kategori->nama }}</p>
                            {{-- <p class="card-text">Dipinjam : {{ $data->peminjaman }}</p> --}}
                            {{-- <p class="card-text">Ulasan : {{ $data->ulasan }}</p> --}}
                        </div>
                        <div class="card-body">

                            <a href="{{ route('buku.edit',$data->id) }}" class="btn btn-secondary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-1 px-2 py-3">
            <div class="border px-4 py-3 rounded">
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
        @if ($data->file)
        <div class="vh-min-75 mt-5 rounded">
            <h3>File</h3>
            <embed src=" {{ asset('storage/file/'.$data->file)}}" type="" width="100%" height="720px">  
        </div>            
        @endif
    </div>
</x-adminlayout>