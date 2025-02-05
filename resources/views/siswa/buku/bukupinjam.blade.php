<x-siswalayout>
    <div class="mb-2">
        <h2>Buku dipinjam</h2>
        <small>Menampilkan semua yang dipinjam</small>
    </div>
    @session('success')
        <script>
            alert("{{ session('success') }}")
        </script>
    @endsession        
    <div class="table-responsive">
        <table class="table table-bordered mt-2 text-center"> 
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Sampul</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    {{-- <th width="15%">Status</th> --}}
    
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>                
                   
                    {{-- {{ $data->links('pagination::bootstrap-5') }} --}}
                    @isset($data)
                    @php $no = 1 @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('storage/sampul/'.$item->buku->sampul) }}" alt="" class="img-fluid" width="120px">
                            </td>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->buku->penulis }}</td>
                            <td>{{ $item->buku->tahun_terbit }}</td>
                            {{-- <td>
                                <div class="badge bg-primary">
                                    {{ $item->buku->status }}
                                    
                                </div>
                            </td>   --}}
                            <td>
                                {{-- {{ $item->buku->id }} --}}
                                <div class="d-flex gap-2">                                
                                    <a class="btn btn-secondary" href="{{ route('siswa.baca.buku',$item->buku->id) }}">Baca</a>                                    
                                    <form action="{{ route('siswa.kembali.buku',$item->buku->id) }}" method="POST">                                        
                                        @method('PUT')
                                        @csrf                                    
                                        <button class="btn btn-danger">Kembalikan</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @endisset              
            </tbody>
        </table>
        @if ($data->count() < 1)
            <div class="text-center">
                Anda Belum meminjam buku sama sekali!
                <br>
                Pinjam Sekarang Juga!
                <a class="" href="{{ route('siswa.daftar.buku') }}">Pinjam</a>
            </div>
        @endif
        {{-- {{ $data->links('pagination::bootstrap-5') }} --}}
    </div>
</x-siswalayout>