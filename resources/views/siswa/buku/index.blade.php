<x-siswalayout>
    <div class="mb-2">
        <h2>Buku</h2>
        @if ($search)
        <small>Hasil pencarian : <u>{{ $search}}</u> {{ ' '.'('.$data->count().')'  }}</small>
        @else
        <small>Menampilkan semua buku</small>
        @endif
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
    <div class="row text-end justify-content-end">
        <div class="col-12 col-lg-4 col-md-6">
            <form class="d-flex" role="search" action="{{ route('siswa.daftar.buku') }}" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ $search }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered mt-2 text-center"> 
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Sampul</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit </th>
                    
                    {{-- <th width="15%">Status</th> --}}
    
                    <th width="30%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($data)
                    @php $no = 1 @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('storage/sampul/'.$item->sampul) }}" alt="" class="img-fluid" width="120px">
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->tahun_terbit }}</td>
                            {{-- <td>
                                <div class="badge bg-primary">
                                    {{ $item->status }}
                                    
                                </div>
                            </td>   --}}
                            <td>
                                <div class="d-flex flex-wrap gap-2 ">                                
                                    <a class="btn btn-secondary" href="{{ route('siswa.detail.buku',$item->id) }}">Detail</a>                                    
                                    <form action="{{ route('siswa.pinjam.buku.proses',$item->id) }}" method="POST">                                        
                                        @csrf                                                                               
                                       @if (!Auth::guard('web')->user()->haspeminjaman($item->id))
                                        <button class="btn btn-outline-info">Pinjam</button>
                                        @else                                        
                                        <a href="{{ route('siswa.pinjam.buku') }}" class="btn btn-info">Dipinjam</a>
                                        @endif
                                    </form>
                                    <form action="{{ route('siswa.favorit.toggle',$item->id) }}" method="POST">                                        
                                        @csrf                                               
                                        @if (Auth::guard('web')->user()->hasfavorit($item->id))
                                            <button class="btn btn-success">Hapus Favorit</button>
                                        @else
                                        <button class="btn btn-outline-success">Tambah Favorit</button>
                                        @endif
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- {{ $data->links('pagination::bootstrap-5') }} --}}                
                @endif
            </tbody>
        </table>
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
</x-siswalayout>