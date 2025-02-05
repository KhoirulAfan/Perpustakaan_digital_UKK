<x-siswalayout>
    <div class="mb-2">
        <h2>{{ $data->judul }}</h2>
        <small>Baca Buku {{ $data->judul }}</small>
    </div>    
    <a href="{{ route('siswa.pinjam.buku') }}" class="btn btn-secondary">Kembali</a>
    <div class="row mt-3">
        <div class="col-12 " >
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <img src="{{ asset('storage/sampul/'.$data->sampul) }}" alt="" class="card-img-top">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            {{-- @php
            $filename = $data->file;
            $pdfFilename = preg_replace('/\.jpg$/', '.pdf', $filename);
        @endphp --}}
            {{-- {{ $pdfFilename }}   --}}
            
        </div>
    </div>
    @if ($data->file)
            <div class="vh-min-100 mt-5 rounded">
                <embed src=" {{ asset('storage/file/'.$data->file)}}" type="" width="100%" height="720px">  
            </div>            
            @endif
</x-siswalayout>