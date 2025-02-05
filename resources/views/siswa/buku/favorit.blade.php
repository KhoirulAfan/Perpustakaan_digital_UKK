<x-siswalayout>
    <div class="mb-2">
        <h2>Favorit</h2>
        <small>Menampilkan Favorit</small>
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
                @if ($data)
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
                                    <a class="btn btn-secondary" href="{{ route('siswa.detail.buku',$item->buku->id) }}">Detail</a> 
                                                                      
                                    <form action="{{ route('siswa.favorit.toggle',$item->buku->id) }}" method="POST">                                                                                
                                        @csrf                                    
                                        <button class="btn btn-danger">Hapus Favorit</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- {{ $data->links('pagination::bootstrap-5') }} --}}
                @else
                Data Kosong
                @endif
            </tbody>
        </table>
        {{-- {{ $data->links('pagination::bootstrap-5') }} --}}
    </div>
</x-siswalayout>